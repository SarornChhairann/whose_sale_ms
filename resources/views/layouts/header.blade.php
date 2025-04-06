<style>
    .sidebar-menu > li.active > a {
        background-color: #00a65a !important;
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
<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        @php
            $words = explode(' ', $setting->nama_perusahaan);
            $word  = '';
            foreach ($words as $w) {
                $word .= $w[0];
            }
        @endphp
        <span class="logo-mini">{{ $word }}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>{{ $setting->nama_perusahaan }}</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li>
                <div class="btn-group language-switcher" style="margin-top: 5px;">
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
                </li>


                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ url(auth()->user()->foto ?? '') }}" class="user-image img-profil"
                            alt="User Image">
                        <span class="hidden-xs">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ url(auth()->user()->foto ?? '') }}" class="img-circle img-profil"
                                alt="User Image">

                            <p>
                                {{ auth()->user()->name }} - {{ auth()->user()->email }}
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('user.profil') }}" class="btn btn-primary btn-flat">My Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-danger btn-flat"
                                    onclick="$('#logout-form').submit()"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
    @csrf
</form>