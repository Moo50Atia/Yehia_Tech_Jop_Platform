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
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }

    public function show(JopCategory $category): \Illuminate\Contracts\View\View
    {
        $category->load('jobVacansies');
        return view('jop_categories.show', compact('category'));
    }

    public function edit(JopCategory $category): \Illuminate\Contracts\View\View
    {
        return view('jop_categories.edit', compact('category'));
    }

    public function update(JopCategoryRequest $request, JopCategory $category): \Illuminate\Http\RedirectResponse
    {
        $category->update($request->validated());
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(JopCategory $category): \Illuminate\Http\RedirectResponse
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    }
}
