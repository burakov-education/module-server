@extends('layout')

@section('content')
    <section class="container">
        @foreach($products as $product)
            <article class="card my-3">
                <div class="card-title bg-secondary bg-gradient p-3 text-light d-flex justify-content-between">
                    <h3>{{ $product->name }}</h3>
                    <a href="" title="Delete good" class="btn-danger py-1 px-2 justify-content-center text-decoration-none fs-4">☠</a>
                </div>
                <div class="card-body d-flex justify-content-between">
                    @if ($product->default_image)
                        <div class="card-img">
                            <img src="{{ $product->default_image }}" alt="Название товара">
                        </div>
                    @endif
                    <div class="card-info">
                        <p class="card-text text-black-50"><span class="text-dark">About: </span>{{ $product->description }}</p>
                        <p class="card-text text-danger d-flex justify-content-end">{{ $product->price }} ₽</p>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('products.show', $product) }}" class="btn btn-primary fs-3">More about</a>
                </div>
            </article>
        @endforeach
    </section>

    {{ $products->links() }}
@endsection
