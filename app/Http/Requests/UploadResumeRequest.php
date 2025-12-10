<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UploadResumeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Only authenticated job seekers can upload resumes.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->role === 'jop_seeker';
    }

    /**
     * Get the validation rules that apply to the request.
     * 
     * Security measures implemented:
     * 1. File type validation (only PDF allowed)
     * 2. MIME type verification (prevents extension spoofing)
     * 3. File size limit (prevents DoS attacks)
     * 4. File name sanitization (prevents path traversal)
     * 
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'resume' => [
                'required',
                // Use Laravel's File validation object for comprehensive checks
                File::types(['pdf'])
                    ->max(5 * 1024), // 5MB max to prevent DoS
            ],
            'title' => [
                'nullable',
                'string',
                'max:255',
                // Prevent XSS in title
                'regex:/^[\pL\pN\s\-\_\.]+$/u',
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'resume.required' => 'Please upload a resume file.',
            'resume.mimes' => 'Only PDF files are allowed for security reasons.',
            'resume.max' => 'The resume file must not exceed 5MB.',
            'title.regex' => 'The title can only contain letters, numbers, spaces, hyphens, underscores, and dots.',
        ];
    }

    /**
     * Prepare the data for validation.
     * Sanitizes input to prevent injection attacks.
     */
    protected function prepareForValidation(): void
    {
        // Sanitize title if provided
        if ($this->has('title')) {
            $this->merge([
                'title' => strip_tags($this->title),
            ]);
        }
    }

    /**
     * Handle a passed validation attempt.
     * Additional security checks after Laravel validation.
     */
    public function passedValidation(): void
    {
        $file = $this->file('resume');

        if ($file) {
            // Double-check MIME type using PHP's finfo (more reliable than extension)
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $realMimeType = $finfo->file($file->getRealPath());

            // Only allow actual PDF MIME type
            if ($realMimeType !== 'application/pdf') {
                abort(422, 'Invalid file type detected. Only genuine PDF files are allowed.');
            }

            // Verify PDF header signature
            $content = file_get_contents($file->getRealPath(), false, null, 0, 1024);
            if (!str_starts_with($content, '%PDF-')) {
                abort(422, 'Invalid PDF file structure detected.');
            }

            // Note: We've removed the aggressive pattern matching that was causing
            // false positives on legitimate PDFs. The MIME type check and PDF header
            // verification provide adequate security for resume uploads.
            // If stricter security is needed, consider using a dedicated PDF
            // sanitization library or scanning service.
        }
    }

    /**
     * Get the sanitized filename for storage.
     * Prevents path traversal and other filename attacks.
     */
    public function getSanitizedFilename(): string
    {
        $file = $this->file('resume');
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        // Remove any path components (path traversal prevention)
        $originalName = basename($originalName);

        // Remove dangerous characters
        $sanitized = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $originalName);

        // Limit length
        $sanitized = substr($sanitized, 0, 100);

        // Add unique identifier to prevent overwrites
        $uniqueId = uniqid();

        // Always enforce .pdf extension
        return $sanitized . '_' . $uniqueId . '.pdf';
    }
}
