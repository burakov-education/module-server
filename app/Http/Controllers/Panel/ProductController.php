<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
            'products' => $category->products,
        ]);
    }
}
