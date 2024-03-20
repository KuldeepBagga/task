@extends("common.common")
@section("title") Create Account @endsection
@section("content")
<div class="card m-auto mt-3" style="width: 25rem;">
    <h5 class="card-header">Fill your details</h5>
    <div class="card-body">
        @include("common.message")
        <form action="{{route('save_user_details')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="Address" class="form-label">Address</label>
                <textarea class="form-control" name="address">{{old('address')}}</textarea>
                @error("address")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="City" class="form-label">City</label>
                <input type="text" class="form-control" name="city" value="{{old('city')}}">
                @error("city")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="State" class="form-label">State</label>
                <input type="text" class="form-control" name="state" value="{{old('state')}}">
                @error("state")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Date of Birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="date_of_birth" value="{{old('date_of_birth')}}">
                @error("date_of_birth")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <hr>
        <span>Already have an account ? <a href="{{route('login')}}" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Login</a></span>
    </div>
</div>
@endsection