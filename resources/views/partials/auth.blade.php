
    @guest
    <li class="nav-item">
        <a class="btn btn-sm btn-outline-info" href="{{ route('login') }}">
            Se connecter
        </a>
    </li>
    @else
        <li class="nav-item">
            <a class="btn btn-sm btn-outline-info" href="{{ route('cart.index') }}">
                Panier <span class="badge badge-pill badge-primary text-with">
                    {{ Cart::count() }}</span> 
                </a>
        </li>
        <li class="nav-item dropdown">
            <button id="navbarDropdown" class="btn btn-sm btn-outline-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </button>

            <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile') }}">Profile </a>
                <a class="dropdown-item" href="{{ route('home') }}">Mes commandes </a>
                <a class="dropdown-item" href="{{ url('vends') }}">Vends des articles </a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                 {{ __('Deconnecter') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        
    @endguest
