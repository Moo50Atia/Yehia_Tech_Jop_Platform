<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JopCategoryRequest;
use App\Models\JopCategory;

class JopCategoryController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $jop_categories = JopCategory::latest()->paginate(10);
        return view('jop_categories.index', compact('jop_categories'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('jop_categories.create');
    }

    public function store(JopCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        JopCategory::create($request->validated());
        return redirect()->route('jop_categories.index')->with('success', 'Created successfully');
    }

    public function show(JopCategory $jopCategory): \Illuminate\Contracts\View\View
    {
        return view('jop_categories.show', compact('jopCategory'));
    }

    public function edit(JopCategory $jopCategory): \Illuminate\Contracts\View\View
    {
        return view('jop_categories.edit', compact('jopCategory'));
    }

    public function update(JopCategoryRequest $request, JopCategory $jopCategory): \Illuminate\Http\RedirectResponse
    {
        $jopCategory->update($request->validated());
        return redirect()->route('jop_categories.index')->with('success', 'Updated successfully');
    }

    public function destroy(JopCategory $jopCategory): \Illuminate\Http\RedirectResponse
    {
        $jopCategory->delete();
        return redirect()->route('jop_categories.index')->with('success', 'Deleted successfully');
    }
}
