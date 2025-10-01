@extends('layout')

@section('content')
    <section class="container">
        <div class="d-flex flex-column justify-content-center form-container good">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4 fs-1">Edit good</h2>

                    <form action="{{ route('products.update', $product) }}" method="post" id="addGood">
                        @csrf

                        @include('products._form', [
                            'product' => $product,
                        ])

                        <button type="submit" class="btn btn-primary w-100 my-2 fs-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
