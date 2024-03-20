@extends("common.with_header")
@section("title") Update Account @endsection
@section("content")
<div class="card m-auto mt-3 p-3">
    <div class="card">
        <h5 class="card-header">Update Account</h5>
        <div class="card-body">
            <div class="card-body">
                @include("common.message")
                <form action="{{route('update_post')}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="Address" class="form-label">Address</label>
                        <textarea class="form-control" name="address">{{old('address',$userDetails->address)}}</textarea>
                        @error("address")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="City" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" value="{{old('city',$userDetails->city)}}">
                        @error("city")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="State" class="form-label">State</label>
                        <input type="text" class="form-control" name="state" value="{{old('state',$userDetails->state)}}">
                        @error("state")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Date of Birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="date_of_birth" value="{{old('date_of_birth',$userDetails->date_of_birth)}}">
                        @error("date_of_birth")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{route('dashboard')}}" class="btn btn-dark">Go Back To Dashboard</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection