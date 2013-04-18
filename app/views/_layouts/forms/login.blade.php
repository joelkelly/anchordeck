 <form action="{{ URL::to('account/login') }}" method="POST">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
    <ul>
        <li class="{{ $errors->has('email') ? 'error' : '' }}"><label for="email">email </label><input type="text" name="email" value="{{ Input::old('email') }}">{{ $errors->first('email', '<span class="help-inline">:message</span>') }}</li>
        <li class="{{ $errors->has('password') ? 'error' : '' }}"><label for="password">password </label><input type="password" name="password" value="">{{ $errors->first('password', '<span class="help-inline">:message</span>') }}</li>
        <li class="row-inline"><input type="checkbox" name="remember-me"><label for="remember-me">remember me?</label></li>
    </ul>

    <button>sign in</button><a href="{{ URL::to('account/forgot-password') }}" class="btn">Forgot your password?</a>
</form>