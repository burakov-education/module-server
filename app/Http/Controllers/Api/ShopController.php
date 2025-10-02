<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ShopController extends Controller
{
    /**
     * Categories list
     *
     * @return AnonymousResourceCollection
     */
    public function categories(): AnonymousResourceCollection
    {
        return CategoryResource::collection(Category::all());
    }

    /**
     * Products list
     *
     * @param Category $category
     * @return AnonymousResourceCollection
     */
    public function products(Category $category): AnonymousResourceCollection
    {
        return ProductResource::collection($category->products);
    }

    /**
     * Show product
     *
     * @param Product $product
     * @return ProductResource
     */
    public function showProduct(Product $product): ProductResource
    {
        return ProductResource::make($product);
    }
}
