@extends('dashboard.master')

@section('title', '| Edit User')

@section('content')

<div class="container">
    <div class="go-to-back">
        <a href="{{ route('admin_users.index') }}" class="line-btn">&larr; Go To User List</a>
    </div>
    <div class="main-title">
        Edit User Info
    </div>


    <div class="form-group w-50 mx-auto my-5">
        @if (Session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif

        {{-- {{ dd($user->name) }} --}}
        <form action="{{ route('admin_users.update', $admin_user->id) }}" method="POST" autocomplete="off">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="name" value="{{ $admin_user->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $admin_user->email }}">
            </div>
            <label for="" class="form-label">Password</label>
            <div class="input-group mb-3" id="show-hide-password">
                <input type="password" class="form-control" id="password" name="password"></input>
                <button class="btn btn-outline-secondary" type="button" id="showandhide"><i class="fa fa-eye-slash" id="icon"></i></button>
            </div>
            <div class="mb-5">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $admin_user->phone }}">
            </div>
            <div class="mb-3">
                <button class="main-btn" type="submit">Update User <i class="fa fa-edit"></i></button>
            </div>
        </form>
    </div>
</div>

@endsection


@section('custom_js')

<script>
$(document).ready(function() {
    $("#showandhide").on('click', function() {

        var passwordField = $("#password");
		var passwordFieldType = passwordField.attr("type");

		if(passwordFieldType == "password"){
			passwordField.attr("type","text");
            $('#icon').removeClass('fa-eye-slash');
            $("#icon").addClass('fa-eye');
		}
		else{
			passwordField.attr("type", "password");
            $('#icon').addClass('fa-eye-slash');
            $("#icon").removeClass('fa-eye');
		}
    });
});
</script>

@endsection
