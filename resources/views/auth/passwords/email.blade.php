@extends('tenants.layouts.landing')

@section('styles')
    <style>
        .form-gap {
            padding-top: 70px;
        }
    </style>
@stop

@section('content')

    <br /><br />

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <h3 class="card-header">
                        Forgot your password?
                    </h3>

                    <div class="form-gap"></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="text-center">
                            <h3>
                                <i class="fa fa-lock fa-4x"></i>
                            </h3>
                            <p>
                                Kindly input the Email address you used to register / log into to your account
                                We'll send you an email with instructions to choose a new password.
                            </p>
                            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                                @csrf
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text" id="btnGroupAddon">@</div>
                                    </div>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" value="{{ old('email') }}" required placeholder="Email Address">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <p style="margin-top: 30px;">
                                    <button type="submit" class="btn btn-primary right">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </p>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
