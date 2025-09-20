<form method="POST" action="{{ route('admin.password.email') }}">
    @csrf
    <input type="email" name="email" placeholder="Your email" required autofocus>
    <button type="submit">Send Password Reset Link</button>
</form>

@if (session('status'))
    <div>{{ session('status') }}</div>
@endif
