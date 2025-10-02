<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**
     * Get user orders
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return OrderResource::collection(auth()->user()->orders);
    }

    /**
     * Create order
     *
     * @param Product $product
     * @return array
     */
    public function store(Product $product): array
    {
        $order = auth()->user()->orders()->create([
            'product_id' => $product->id,
        ]);

        try {
            $result = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('http://kudthmi-m1.wsr.lan/public/api/payments', [
                'price' => $product->price,
                'webhook_url' => route('webhook'),
            ])->json();

            $order->pay_url = $result['pay_url'];
            $order->order_id = $result['order_id'];
            $order->save();
        } catch (\Throwable $th) {}

        return [
            'pay_url' => $order->pay_url,
        ];
    }
}
