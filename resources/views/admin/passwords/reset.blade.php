<form method="POST" action="{{ route('admin.password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
    <input type="password" name="password" placeholder="New password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm password" required>
    <button type="submit">Reset Password</button>
</form>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
