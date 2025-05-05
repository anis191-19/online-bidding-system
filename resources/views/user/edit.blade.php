@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>

        <form action="{{ route('user.update') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <button type="submit" class="btn btn-primary my-2">Update Profile</button>
        </form>
    </div>
@endsection
