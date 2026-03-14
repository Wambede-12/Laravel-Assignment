@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 400px; margin: 50px auto;">
        <h2 style="text-align: center; margin-bottom: 30px;">Create Account</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Full Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password *</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <div class="form-group" style="text-align: center;">
                <button type="submit" class="btn btn-success" style="width: 100%;">Register</button>
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
            </div>
        </form>
    </div>
@endsection
