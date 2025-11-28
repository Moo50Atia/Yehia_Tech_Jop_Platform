<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JopApplicationRequest;
use App\Models\JopApplication;

class JopApplicationController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $jop_applications = JopApplication::latest()->paginate(10);
        return view('jop_applications.index', compact('jop_applications'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('jop_applications.create');
    }

    public function store(JopApplicationRequest $request): \Illuminate\Http\RedirectResponse
    {
        JopApplication::create($request->validated());
        return redirect()->route('jop_applications.index')->with('success', 'Created successfully');
    }

    public function show(JopApplication $jopApplication): \Illuminate\Contracts\View\View
    {
        return view('jop_applications.show', compact('jopApplication'));
    }

    public function edit(JopApplication $jopApplication): \Illuminate\Contracts\View\View
    {
        return view('jop_applications.edit', compact('jopApplication'));
    }

    public function update(JopApplicationRequest $request, JopApplication $jopApplication): \Illuminate\Http\RedirectResponse
    {
        $jopApplication->update($request->validated());
        return redirect()->route('jop_applications.index')->with('success', 'Updated successfully');
    }

    public function destroy(JopApplication $jopApplication): \Illuminate\Http\RedirectResponse
    {
        $jopApplication->delete();
        return redirect()->route('jop_applications.index')->with('success', 'Deleted successfully');
    }
}
