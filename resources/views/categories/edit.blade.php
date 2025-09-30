@extends('layout')

@section('content')
    <section class="container">
        <div class="d-flex flex-column justify-content-center form-container category">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4 fs-1">Edit category</h2>

                    <form action="{{ route('categories.update', $category) }}" method="post" id="addCategory">
                        @csrf

                        @include('categories._form', [
                            'category' => $category,
                        ])

                        <button type="submit" class="btn btn-primary w-100 my-2 fs-2">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
