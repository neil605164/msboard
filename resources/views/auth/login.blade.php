@extends('layouts.account')

@section('content')

<form class="w3-container" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

        <div class="w3-row-padding">
            <input id="email" type="email" placeholder="E-mail" class="w3-input" style="margin-top: 50px;" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif           
        </div>
    </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <div class="w3-row-padding">
                <input id="password" type="password" placeholder="Password" class="w3-input" style="margin-top: 20px;" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <br>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
            <br>
            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                Forgot Your Password?
            </a>           
        </div>

        <div class="form-group">

            <button type="submit" class="w3-btn w3-round-large" style="width:20%;margin-left: 450px;margin-top: 30px;">
                    Login
            </button>

        </div>
</form>
@endsection
