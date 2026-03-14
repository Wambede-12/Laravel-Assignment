@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 400px; margin: 50px auto;">
        <h2 style="text-align: center; margin-bottom: 30px;">Login</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group" style="text-align: center;">
                <button type="submit" class="btn btn-success" style="width: 100%;">Login</button>
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            </div>
        </form>
    </div>
@endsection
