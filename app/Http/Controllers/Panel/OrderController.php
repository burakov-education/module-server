<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Show orders
     *
     * @return Factory|View
     */
    public function __invoke(): Factory|View
    {
        return view('orders', [
            'orders' => Order::all(),
        ]);
    }
}
