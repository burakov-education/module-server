@extends('layout')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Categories</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle fs-5">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Count</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Electronic</td>
                    <td>Technic and electronic devices</td>
                    <td>1 234</td>
                    <td class="text-end">
                        <div class="btn-group" role="group">
                            <a href="category_view.html"  type="button" class="btn btn-lg btn-outline-primary no-reverse">
                                <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="eye" class="action-image">
                            </a>
                            <a href="add_category.html"  type="button" class="btn btn-lg btn-outline-success no-reverse">
                                <img src="{{ asset('assets/img/icons/pencil.svg') }}" alt="eye" class="action-image">
                            </a>
                            <a href="" type="button" class="btn btn-lg btn-outline-danger no-reverse">
                                <img src="{{ asset('assets/img/icons/trash.svg') }}" alt="eye" class="action-image">
                            </a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
