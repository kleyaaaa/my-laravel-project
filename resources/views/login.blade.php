@extends('layouts.main')

@section('content')

<div class="container">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 col-sm-4 shadow">
            <h3 class="fw-bold text-center mb-5">Log In</h3> 

        <form action="/login" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberCheck">
                    <label class="form-check-label small text-secondary" for="rememberCheck">
                        Remember me
                    </label>
                </div>
            <div>
                <button class="btn btn-dark col-sm-12" type="submit">Log In</button>
            </div>

            <p class="text-center small text-secondary mt-4 mb-0">Don't have an account yet? <a class="text-dark fw-bold text-decoration-none" href="{{ route('register') }}">Register here.</a></p>
        </form>
    </div>
</div>

@endsection