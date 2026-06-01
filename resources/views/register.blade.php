@extends('layouts.main')

@section('content')

<div class="container">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 col-sm-4 shadow">
            <h3 class="fw-bold text-center mb-5">Register</h3> 

            <form action="/register" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="name@example.com">
                    <label for="fullname">Full name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                 <div class="form-floating mb-3">
                    <input type="Phone_number" name="phone_number" class="form-control" id="phone_number" placeholder="09*********">
                    <label for="email">Phone Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="Address" name="Address" class="form-control" id="Address" placeholder="">
                    <label for="email">Address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="confirmpassword" class="form-control" id="confirmpassword" placeholder="Password">
                    <label for="confirmpassword">Confirm Password</label>
                </div>
                <div>
                    <button class="btn btn-dark col-sm-12" type="submit">Register</button>
                </div>
                <p class="text-center small text-secondary mt-4 mb-0">Already have an account? <a class="text-dark fw-bold text-decoration-none" href="{{ route('signin') }}">Login here.</a></p>
            </form>
        </div>
    </div>

@endsection