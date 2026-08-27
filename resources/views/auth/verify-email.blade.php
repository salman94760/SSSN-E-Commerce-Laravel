<h2>Verify Your Email</h2>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<p>
    We have sent a verification link to your email address.
    Please check your inbox.
</p>

<form method="POST" action="{{ route('verification.send') }}">
    @csrf

    <button type="submit">
        Resend Verification Email
    </button>
</form>