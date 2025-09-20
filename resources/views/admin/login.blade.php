@extends('layouts.master') {{-- Or whatever layout you use --}}

@section('title', 'Welcome')

@section('content')
<section class="login-section spacing">
    <div class="container">
        <div class="form-container">
            <div class="form-card">
                <div class="form-header">
                    <h1 class="form-title">Admin Portal</h1>
                    <p class="form-subtitle">Sign in to access the dashboard</p>
                </div>

                <form class="post-form" method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf

                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-input" placeholder=" " required
                            autofocus>
                        <label class="form-label" for="email">Email Address</label>
                        <div class="error-message">Please enter a valid email address</div>
                    </div>

                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-input" placeholder=" "
                            required>
                        <label class="form-label" for="password">Password</label>
                        <div class="error-message">Password is required</div>
                    </div>

                    <button type="submit" class="form-button">Login</button>
                </form>

                <div class="login-footer">
                    &copy; {{ date('Y') }} Admin Panel. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</section>
@endsection