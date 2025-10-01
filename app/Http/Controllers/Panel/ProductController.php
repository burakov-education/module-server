<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
            'products' => $category->products,
//            'products' => $category->products()->get(),
//            'products' => Product::query()->where('category_id', $category->id)->get(),
        ]);
    }

    /**
     * List of products
     *
     * @return Factory|View
     */
    public function list(): Factory|View
    {
        return view('products.list', [
            'products' => Product::query()->orderBy('id', 'DESC')->paginate(5),
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

    /**
     * Store product
     *
     * @param Category $category
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(Category $category, ProductRequest $request): RedirectResponse
    {
        $product = $category->products()->create($request->validated());
        $product->updateImages($request->file('images'));

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

    /**
     * Update product
     *
     * @param Product $product
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function update(Product $product, ProductRequest $request): RedirectResponse
    {
        $product->update($request->validated());
        $product->updateImages($request->file('images'));

        return redirect()->route('products.index', $product->category);
    }

    /**
     * Destroy product
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        if (is_array($product->images)) {
            foreach ($product->images as $image) {
                @unlink(public_path($image));
            }
        }

        $product->delete();

        return redirect()->route('products.index', $product->category);
    }
}
