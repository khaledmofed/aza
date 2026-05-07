<x-guest-layout>

    @if (session('status'))
        <div class="alert-error">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email Address</label>
            <div class="input-wrap">
                <i class="bi bi-envelope"></i>
                <input id="email" type="email" name="email"
                       value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>
            @error('email')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-wrap">
                <i class="bi bi-lock"></i>
                <input id="password" type="password" name="password"
                       required autocomplete="current-password">
            </div>
            @error('password')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="remember-row">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">Remember me</label>
        </div>

        <button type="submit" class="btn-login">
            <i class="bi bi-box-arrow-in-right me-1"></i> Sign In
        </button>
    </form>

</x-guest-layout>
