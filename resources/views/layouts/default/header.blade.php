<ul id="locale" class="dropdown-content">
    <li><a href="/locale/pt-br">Português</a></li>
    <li><a href="/locale/en">English</a></li>
</ul>
@if(\Auth::user())
<ul id="user" class="dropdown-content">
    <li><a href="/profile">{{ __('Profile') }}</a></li>
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            {{__('Logout')}}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
@endif
<div class="parallax-container">
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <a href="/" class="brand-logo">
                    <i class=" tiny material-icons">chat</i>
                    {{__('My Ship - Forum')}}
                </a>

                <ul class="right">
                    <li>
                        <a href="#!" data-activates="locale" class="dropdown-button">{{ __('Language') }}</a>
                    </li>
                    @if(\Auth::user())
                        {{--Executa quando o usuario estiver logado--}}
                        <li>
                            <a href="#!" data-activates="user" class="dropdown-button">{{\Auth::user()->name}}</a>
                        </li>
                        @else
                        {{--Executa quando o usuario não estiver logado--}}
                        <li>
                            <a href="/login"  >{{ __('Login') }}</a>
                        </li>
                        <li>
                            <a href="/register"  >{{ __('Sign Up') }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="parallax">
        <img src="/img/employers.png" alt="">
    </div>
</div>










{{--<ul id="locale" class="dropdown-content" >--}}
    {{--<li><a href="/locale/pt-br">Portugues</a></li>--}}
    {{--<li><a href="/locale/en">English</a></li>--}}
{{--</ul>--}}

{{--<div class="parallax-container">--}}
    {{--<div class="navbar-fixed" >--}}
    {{--<nav>--}}
        {{--<div class="nav-wrapper #448aff blue accent-2">--}}
            {{--<div class="container">--}}
                {{--<a href="/" class="brand-logo">--}}
                    {{--<i class=" large material-icons">people</i>--}}
                    {{--<i class=" tiny material-icons">chat</i>--}}
                    {{-- {{__('My Ship - Forum')}}--}}

                    {{--<ul class="right">--}}

                        {{--@guest--}}
                            {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                        {{--@else--}}
                        {{--<li class="right">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">--}}
                                {{--Usuário logado: {{ Auth::user()->name }} <span class="caret"></span>--}}
                            {{--</a>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                            {{--<a href="{{ route('logout') }}"--}}
                               {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                {{--Logout--}}
                            {{--</a>--}}

                            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                {{--{{ csrf_field() }}--}}
                            {{--</form>--}}
                        {{--</li>--}}

                    {{--</ul>--}}
                    {{--@endguest--}}
                {{--<ul class="right">--}}
                    {{--<li>--}}
                        {{--<a href="#!" data-activates="locale" class="dropdown-button" >--}}
                            {{--{{__('Language')}}--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}


                {{--</a>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</nav>--}}
    {{--</div>--}}
    {{--<div class="parallax">--}}
        {{--<img src="/img/employers.png" alt="">--}}
    {{--</div>--}}
{{--</div>--}}
