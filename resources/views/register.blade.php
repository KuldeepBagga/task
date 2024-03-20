@extends("common.common")
@section("title") Create Account @endsection
@section("content")
<div class="card m-auto mt-3" style="width: 25rem;">
    <h5 class="card-header">Create an account</h5>
    <div class="card-body">
        @include("common.message")
        <form action="{{route('store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                @error("name")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email_address" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}">
                @error("email")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control" name="mobile" value="{{old('mobile')}}">
                @error("mobile")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                @error("password")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <hr>
        <span>Already have an account ? <a href="{{route('login')}}" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Login</a></span>
    </div>
</div>
@endsection