<form method="POST" action="{{ route('admin.store') }}">
    @csrf

    <div class="form-group">
        <label for="name">{{ __('Name') }}</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
    </div>

    <div class="form-group">
        <label for="email">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control" name="password" required>
    </div>

    <div class="form-group">
        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>

    <button type="submit" class="btn btn-primary">{{ __('Create Admin') }}</button>
</form>
