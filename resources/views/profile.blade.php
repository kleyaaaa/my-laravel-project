@extends('layouts.user_role')

@section('content')
<div class="container mt-4">
    <h2 class="text-dark mb-4 fw-bold">My Profile</h2>

    {{-- Success/Error Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- UPDATE PROFILE FORM --}}
    <form method="POST" action="/updateProfile" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-3 card p-3 me-3 text-center">
                <div class="mb-3">
                    <label>Profile Picture</label><br><br>
                    @if(session('user')->profile_pic)
                        <img src="/uploads/{{ session('user')->profile_pic }}" class="rounded-circle img-fluid mb-3 mx-auto" width="200"><br>
                    @else
                        <img src="/images/default.jpg" class="rounded-circle img-fluid mb-3 mx-auto" width="200"><br>
                    @endif
                    <input type="file" name="profile" class="form-control mb-2">
                </div>
            </div>

            <div class="col card pt-5 px-5">
                <div class="row mb-3">
                    <h3 class="mb-1 text-dark fw-bold">User Profile</h3>
                    <hr>
                    <div class="row mb-3">
                        <label class="form-label text-dark fw-medium">Name</label>
                        <input type="text" name="name" value="{{ session('user')->name }}" class="form-control">
                    </div>
                    <div class="row mb-3">
                        <label class="form-label text-dark fw-medium">Email</label>
                        <input type="email" name="email" value="{{ session('user')->email }}" class="form-control">
                    </div>
                    <div class="row mb-3">
                        <button type="submit" class="btn btn-primary px-4">Update Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- CHANGE PASSWORD FORM --}}
    <div class="row mt-4">
        <div class="col card p-4">
            <h3 class="mb-1 text-dark fw-bold">Change Password</h3>
            <hr>
            <form method="POST" action="/updatePassword">
                @csrf
                <div class="row mb-3">
                    <label class="form-label text-dark fw-medium">Current Password</label>
                    <input type="password" name="current_password" class="form-control" placeholder="Enter current password" required>
                </div>
                <div class="row mb-3">
                    <label class="form-label text-dark fw-medium">New Password</label>
                    <input type="password" name="new_password" class="form-control" placeholder="Enter new password" required>
                </div>
                <div class="row mb-3">
                    <label class="form-label text-dark fw-medium">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control" placeholder="Confirm new password" required>
                </div>
                <div class="row mb-3">
                    <button type="submit" class="btn btn-warning px-4 text-white">Change Password</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection