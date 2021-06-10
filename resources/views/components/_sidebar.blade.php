<aside class="overflow-scroll d-flex vh-100 flex-column px-3 pt-5 pb-3 text-light bg-dark position-fixed sidebar-custom">
    <button class="d-md-none btn text-light fs-4 position-absolute top-0 end-0 m-3" type="button" id="asideCloseBtn">
        <i class="bi bi-x-lg"></i>
    </button>
    <a href="/" class="fs-4 d-flex align-items-center mb-3 me-md-auto text-light text-decoration-none">
        <img class="img-fluid rounded-3 me-3" width="40" height="40" src="/img/europe.svg" alt="">
        <span class="fs-4">FantaEuropeo</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column fs-5 mb-auto mt-3">
        <li class="nav-item my-2">
            <a href="/" class="nav-link text-light @if(Route::currentRouteName() === '/') active @endif" aria-current="page">
                <i class="me-2 bi bi-house-door"></i>
                Home
            </a>
        </li>
        <li class="nav-item my-2">
            <a href="{{route('bet.nextGame')}}" class="text-light nav-link @if(Route::currentRouteName() === 'bet.create') active @endif">
                <i class="me-2 bi bi-check-square"></i>
                Pronostico
            </a>
        </li>
    </ul>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="/img/europe.svg" alt="" width="32" height="32" class="rounded-circle me-2">
        
        <strong>{{Auth::user()->name ?? 'Guest'}}</strong>
      </a>
      @guest
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
        
      </ul>
      @else
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        @if(Auth::user()->games_mod || Auth::user()->users_mod)
            <li><a class="dropdown-item" href="{{route('mod.index')}}">Pannello Mod</a></li>
        @endif
        <li><a class="dropdown-item" href="{{route('password.reset')}}">Cambia Password</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <button type="button" class="dropdown-item text-light" data-bs-toggle="modal" data-bs-target="#logOutModal">
                Logout
            </button>
        </li>
      </ul>
      @endguest
    </div>
</aside>

<div class="modal fade" id="logOutModal" tabindex="-1" aria-labelledby="logOutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="logOutModalLabel">Logout</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Sei sicuro di voler fare logout?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger text-light" data-bs-dismiss="modal">Chiudi</button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn text-light btn-primary">
                    Logout
                </button>
            </form>
        </div>
        </div>
    </div>
</div>

