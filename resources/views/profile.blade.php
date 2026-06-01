@extends('layouts.user_role')

@section('content')
<div class="container mt-4">
    <h2 class="text-dark mb-4 fw-bold">My Profile</h2>

        <form method="POST" action="/updateProfile" enctype="multipart/form-data">
        @csrf
        
          <div class="row">
            <div class="col-sm-3 card p-3 me-3 text-center">
                <div class="mb-3">
                    <label>Profile Picture</label><br><br>

                        @if(session('user')->profile_pic)
                            <img src="/uploads/{{session('user')->profile_pic }}" class="rounded-circle img-fluid mb-3 mx-auto" width="200"><br>                        
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
                        <input type="text" name="name" value="{{ session('user')->name}}" class="form-control">
                    </div>
                    <div class="row mb-3">
                        <label class="form-label text-dark fw-medium">Email</label>
                        <input type="email" name="email" value="{{ session('user')->email}}" class="form-control">
                    </div>

                    <div class="row mb-3">
                        <button type="submit" class="btn btn-primary px-4" name="update_user">Update Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection