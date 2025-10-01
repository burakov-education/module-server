@extends('layout')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Goods of category: <span>{{ $category->title }}</span></h1>
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('products.create', $category) }}" class="btn btn-primary fs-3">Add good</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle fs-5">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} ₽</td>
                        <td class="text-end">
                            <div class="btn-group" role="group">
                                <a href="{{ route('products.show', $product) }}" type="button" class="btn btn-lg btn-outline-primary no-reverse">
                                    <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="eye" class="action-image">
                                </a>
                                <a href="{{ route('products.edit', $product) }}" type="button" class="btn btn-lg btn-outline-success no-reverse">
                                    <img src="{{ asset('assets/img/icons/pencil.svg') }}" alt="eye" class="action-image">
                                </a>
                                <a href="{{ route('products.destroy', $product) }}" type="button" class="btn btn-lg btn-outline-danger no-reverse">
                                    <img src="{{ asset('assets/img/icons/trash.svg') }}" alt="eye" class="action-image">
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
