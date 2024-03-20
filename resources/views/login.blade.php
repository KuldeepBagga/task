@extends("common.common")
@section("title") Login @endsection
@section("content")
<div class="card m-auto mt-3" style="width: 25rem;">
    <h5 class="card-header">Login</h5>
    <div class="card-body">
        @include("common.message")
        <form method="post" action="{{route('login_submit')}}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="text" name="email" class="form-control">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <hr>
        <span>New Here ? <a href="{{route('register')}}" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Create an account</a></span>
    </div>
</div>
@endsection