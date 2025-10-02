<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WebhookController extends Controller
{
    /**
     * Payment webhook
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $orderId = $request->input('order_id');
        $status = $request->input('status', 'pending');

        $order = Order::query()
            ->where([
                'order_id' => $orderId,
                'status' => 'pending',
            ])->first();

        if ($order) {
            $order->status = $status;
            $order->save();
        }

        return response()->noContent();
    }
}
