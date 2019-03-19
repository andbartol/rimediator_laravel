<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">Rimediator</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('vestiti.lista') }}">
                    Vestiti<span class="sr-only">(current)</span>
                </a>
            </li>
        @endif
    </ul>

    <form class="form-inline my-2 my-lg-0">
        @if (Auth::check())
            <a class="btn btn-primary" href="{{ route('logout') }}" 
                onclick="event.preventDefault(); document.getElementById('form-logout').submit()">
                {{ __('Logout') }}
            </a>
        @else
            <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
            <a class="btn btn-primary ml-2" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
    </form>
  </div>
</nav>
<form id="form-logout" action="{{ route('logout') }}" method="POST">
    @csrf
</form>
