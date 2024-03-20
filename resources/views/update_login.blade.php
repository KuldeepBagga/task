@extends("common.with_header")
@section("title") Update Account @endsection
@section("content")
<div class="card m-auto mt-3">
    <div class="card-body">
        @include("common.message")
        <form action="{{route('update_login_put')}}" method="POST">
            @method('PUT')
            @csrf
            <div class="card mb-3">
                <h5 class="card-header">Update Your Account Details</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name',$userdata->name)}}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{old('email',$userdata->email)}}">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" name="mobile" value="{{old('mobile',$userdata->mobile)}}">
                        @error('mobile')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Update Details</button>
                    <a href="{{route('dashboard')}}" class="btn btn-dark">Go Back To Dashboard</a>
                </div>
            </div>
        </form>
        <form method="post" action="{{route('update_password_put')}}">
            @method('PUT')
            @csrf
            <div class="card mb-3">
                <h5 class="card-header">Update Password</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="old_password" class="form-label">Old Password</label>
                        <input type="password" class="form-control" name="old_password" value="{{old('old_password')}}">
                        @error('old_password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="new_password" value="{{old('new_password')}}">
                        @error('new_password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" value="{{old('confirm_password')}}">
                        @error('confirm_password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Update Password</button>
                    <a href="{{route('dashboard')}}" class="btn btn-dark">Go Back To Dashboard</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection