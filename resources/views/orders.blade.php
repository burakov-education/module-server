@extends('layout')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Orders</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle fs-5">
                <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Price</th>
                    <th class="text-end">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>{{ $order->product->price }} ₽</td>
                        @if ($order->status === 'pending')
                            <td class="text-end text-secondary">not paid</td>
                        @elseif($order->status === 'success')
                            <td class="text-end text-success">paid</td>
                        @else
                            <td class="text-end text-danger">failed</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
