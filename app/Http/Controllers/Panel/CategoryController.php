<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Categories list
     *
     * @return Factory|View
     */
    public function index(): Factory|View
    {
        return view('categories.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Category create form
     *
     * @return Factory|View
     */
    public function create(): Factory|View
    {
        return view('categories.create');
    }

    /**
     * Create category
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::query()->create($request->validated());

        return redirect()->route('admin-panel');
    }

    /**
     * Edit category form
     *
     * @param Category $category
     * @return Factory|View
     */
    public function edit(Category $category): Factory|View
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update category
     *
     * @param Category $category
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function update(Category $category, CategoryRequest $request): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()->route('admin-panel');
    }

    /**
     * Delete category
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('admin-panel');
    }
}
