<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * List products of category
     *
     * @param Category $category
     * @return Factory|View
     */
    public function index(Category $category): Factory|View
    {
        return view('products.index', [
            'category' => $category,
            'products' => $category->products()->paginate(5),
//            'products' => $category->products()->get(),
//            'products' => Product::query()->where('category_id', $category->id)->get(),
        ]);
    }

    /**
     * Show product
     *
     * @param Product $product
     * @return Factory|View
     */
    public function show(Product $product): Factory|View
    {
        return view('products.show', compact('product'));
    }

    /**
     * Create product form
     *
     * @param Category $category
     * @return Factory|View
     */
    public function create(Category $category): Factory|View
    {
        return view('products.create', compact('category'));
    }

    public function store(Category $category, ProductRequest $request)
    {
        $category->products()->create($request->validated());

        return redirect()->route('products.index', ['category' => $category]);
    }

    /**
     * Edit product form
     *
     * @param Product $product
     * @return Factory|View
     */
    public function edit(Product $product): Factory|View
    {
        return view('products.edit', compact('product'));
    }

    public function update(Product $product, ProductRequest $request)
    {
        $product->update($request->validated());

        return redirect()->route('products.index', $product->category);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index', $product->category);
    }
}
