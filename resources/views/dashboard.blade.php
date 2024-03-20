@extends('common.with_header')
@section("title") Dashboard @endsection
@section('content')
<div class="card mt-3">
    <h5 class="card-header">Dashboard</h5>
    <div class="card-body">
        @include('common.message')
        <div class="card">
            <div class="card-body p-3">

                <table class="table">
                    @foreach ($user as $user)
                    <tr>
                        <td colspan="2">
                            <div class="header">
                                <h5>Login Details</h5>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><i class="bi bi-person-fill"></i> {{$user->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><i class="bi bi-envelope-at-fill"></i> {{$user->email}}</td>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <td><i class="bi bi-telephone-fill"></i> {{$user->mobile}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="{{route('update_login')}}" class="btn btn-success btn-sm">Edit Login Details</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h5 class="header">Personal Details</h5>
                        </td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><i class="bi bi-geo-alt"></i> {{$user->details->address}}</td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td><i class="bi bi-map"></i> {{$user->details->city}}</td>
                    </tr>
                    <tr>
                        <th>State</th>
                        <td><i class="bi bi-geo"></i> {{$user->details->state}}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td><i class="bi bi-calendar-date"></i> {{$user->details->date_of_birth}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="{{route('update_user')}}" class="btn btn-success btn-sm">Edit Personal Details</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection