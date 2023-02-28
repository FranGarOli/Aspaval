@if (auth()->check())
    <nav>
        <a href="{{route('inicio')}}">
            <img src="{{asset('img/logoAspaval.png')}}" alt="Logo app" width="240px">
        </a>
        <a href="{{route('members.index')}}">Miembros</a>
        <a href="{{route('events.index')}}">Eventos</a>
        <a href="{{route('contacto')}}">Contacto</a>
        <a href="{{route('localizacion')}}">Dónde estamos</a>

        {{-- Si el usuario es admin permite mostrar mensajes y crear eventos --}}
        @if (Auth::user()->rol == 'admin')
            <a href="{{route('events.create')}}">Crear evento</a>
            <a href="{{route('messages.index')}}">Mensajes</a>
        @endif

        <div class="enlacesUsuario">
                <a href="{{route('account.index')}}" title="Cuenta">
                    <iconify-icon icon="material-symbols:account-circle" style="color: #0086d6;"  width="40" height="40"></iconify-icon>
                </a>
                <a href="{{route('logout')}}" title="Logout">
                    <iconify-icon icon="material-symbols:logout" style="color: #0086d6;" width="40" height="40"></iconify-icon>
                </a>
        </div>
    </nav>
@else
    <nav>
        <a href="{{route('inicio')}}">
            <img src="{{asset('img/logoAspaval.png')}}" alt="Logo app" width="240px">
        </a>
        <a href="{{route('members.index')}}">Miembros</a>
        <a href="{{route('events.index')}}">Eventos</a>
        <a href="{{route('contacto')}}">Contacto</a>
        <a href="{{route('localizacion')}}">Dónde estamos</a>

        <div class="enlacesUsuario">
            <div class="btn-formulario">
                <a id="btn-formulario2" href="{{route('registerForm')}}">Registro</a>
                <a id="btn-formulario" href="{{route('loginForm')}}">Login</a>
            </div>
        </div>
    </nav>
@endif

