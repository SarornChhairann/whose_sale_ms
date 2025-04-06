@extends('layouts.auth')

@section('login')

<style>
    .sidebar-menu > li.active > a {
        background-color: #fff !important;
        color: #fff !important;
    }
    .sidebar-menu > li.active > a i {
        color: #fff !important;
    }

    .language-switcher .btn {
        border-radius: 50px;
        background: linear-gradient(135deg, #00a65a, #008d4c);
        color: white;
        padding: 6px 14px;
        font-weight: 500;
    }
    .language-switcher .btn img {
        border-radius: 50%;
        margin-right: 8px;
    }
    .language-switcher .dropdown-menu {
        min-width: 160px;
        border-radius: 10px;
        box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
        border: none;
    }
    .language-switcher .dropdown-item {
        padding: 8px 16px;
        display: flex;
        align-items: center;
    }
    .language-switcher .dropdown-item img {
        border-radius: 50%;
        margin-right: 10px;
    }
</style>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="login-box-body">
        <!-- Language switcher aligned to the right -->
        <div class="btn-group language-switcher">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (app()->getLocale() === 'en')
                    <img src="{{ asset('img/en_flag.png') }}" alt="English" width="20" height="20"> {{ __('messages.english') }}
                @else
                    <img src="{{ asset('img/kh_flag.png') }}" alt="Khmer" width="20" height="20"> {{ __('messages.khmer') }}
                @endif
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ route('language.switch', 'en') }}" class="dropdown-item">
                        <img src="{{ asset('img/en_flag.png') }}" alt="English" width="20" height="20"> {{ __('English') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('language.switch', 'kh') }}" class="dropdown-item">
                        <img src="{{ asset('img/kh_flag.png') }}" alt="Khmer" width="20" height="20"> {{ __('ភាសាខ្មែរ') }}
                    </a>
                </li>
            </ul>
        </div>

        <div style="clear: both;"></div>

        <div class="login-logo" style="margin-top: 20px;">
            <a href="{{ url('/') }}">
                <img src="{{ url($setting->path_logo) }}" alt="logo.png" width="100">
            </a>
        </div>

        <form action="{{ route('login') }}" method="post" class="form-login">
            @csrf
            <div class="form-group has-feedback @error('email') has-error @enderror">
                <input type="email" name="email" class="form-control" placeholder="{{ __('messages.email_placeholder') }}" required value="{{ old('email') }}" autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('email')
                    <span class="help-block">{{ $message }}</span>
                @else
                    <span class="help-block with-errors"></span>
                @enderror
            </div>
            <div class="form-group has-feedback @error('password') has-error @enderror">
                <input type="password" name="password" class="form-control" placeholder="{{ __('messages.password_placeholder') }}" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                    <span class="help-block">{{ $message }}</span>
                @else
                    <span class="help-block with-errors"></span>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> {{ __('messages.remember_me') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-success btn-block btn-flat">{{ __('messages.login_button') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div><!-- visit "codeastro" for more projects! -->
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection