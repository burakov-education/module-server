@extends('layout')

@section('content')
    <section class="container">
        <div class="d-flex flex-column justify-content-center form-container">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4 fs-1">Authentication</h2>
                    @error('status')
                        <div class="alert alert-danger fs-2" id="errorMessage">
                            Wrong email or password
                        </div>
                    @enderror
                    <form action="{{ route('login.send') }}" method="post" id="loginForm">
                        @csrf

                        <div class="mb-5">
                            <label for="email" class="form-label fs-2">Email</label>
                            <input type="email" class="form-control fs-2 @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback fs-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="password" class="form-label fs-2">Password</label>
                            <input type="password" class="form-control fs-2 @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter password">
                            @error('password')
                                <div class="invalid-feedback fs-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100 my-2 fs-2">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
