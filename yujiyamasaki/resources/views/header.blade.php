<header class="header">
    <div class="header__inner">
        <a href="{{ route('index') }}" class="header__link jsc__headerLink">{{ config('app.name') }}</a>
        <button class="nav__btn jsc__navBtn"></button>

    </div>
    <nav class="nav jsc__nav">
        <ul class="nav__list">
            <li class="nav__item">
                <a href="{{ route('index') }}" class="nav__link">top</a>
            </li>
            <li class="nav__item">
                <a href="{{ route('about') }}" class="nav__link">about</a>
            </li>
            <li class="nav__item">
                <a href="{{ route('blog.index') }}" class="nav__link">blog</a>
            </li>
            <li class="nav__item">
                <a href="{{ route('contact.show') }}" class="nav__link">contact</a>
            </li>

            @guest
            <li class="nav__item">
                <a href="{{ route('login') }}" class="nav__link">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav__item">
                <a href="{{ route('register') }}" class="nav__link">{{ __('Register') }}</a>
            </li>
            @endif
            @endguest

            @auth
            <li class="nav__item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav__link">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </li>
            @endauth
        </ul>
    </nav>
</header>