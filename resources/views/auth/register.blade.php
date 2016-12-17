@extends('layouts.account')

@section('content')

<?php
    use PragmaRX\Google2FA\Google2FA;
    $google2fa  = new Google2FA;
?>

<form class="w3-container" role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

        <div class="w3-row-padding">
            <input id="name" type="text" class="w3-input" placeholder="Name" style="margin-top: 20px;" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <br>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <input id="email" type="email" class="w3-input" placeholder="E-Mail" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <br>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <input id="password" type="password" class="w3-input" placeholder="Password" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <br>
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="w3-input" placeholder="Confirm Password" name="password_confirmation" required>

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <br>
     <input id="secret" type="hidden" class="form-control" name="secret" value="{{ $google2fa->generateSecretKey() }}">
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="w3-btn w3-round-large" style="margin-left: 470px;">
                Register
            </button>
        </div>
    </div>
</form>

@endsection
