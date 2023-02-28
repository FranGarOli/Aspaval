@extends('layout')
@section('titulo', 'Cuenta')

@section('cuerpo')
<main>
    <div class="cuenta">

        <h1>Tu cuenta</h1><br>

        @if (file_exists('img/perfiles/'.Auth::user()->username.'.png'))
            <img src="img/perfiles/{{Auth::user()->username}}.png" width="200px" alt="Foto de perfil">
        @else
            <img src="img/perfiles/default.jpg" width="200px" alt="Foto de perfil">
        @endif

        <div class="camposform-texto">
            <div class="campos-formulario">
                <label for="name"><span class="negrita">Nombre completo:</span> {{Auth::user()->name}}</label>
            </div>

            <div class="campos-formulario">
                <label for="username"><span class="negrita">Nombre de usuario:</span> {{Auth::user()->username}}</label>
            </div>

            <div class="campos-formulario">
                <label for="email"><span class="negrita">Correo electrónico: </span> {{Auth::user()->email}}</label>
            </div>

            <div class="campos-formulario">
                <label for="birthday"><span class="negrita">Fecha de nacimiento: </span><span>{{Auth::user()->birthday}}</span></label>
            </div>

            <div class="campos-formulario">
                <label for="twitter"><span class="negrita">Twitter:</span>@if (Auth::user()->twitter == '')
                        <span>Sin especificar...</span>
                    @else
                        <span>{{Auth::user()->twitter}}</span>
                    @endif
                </label>
            </div>

            <div class="campos-formulario">
                <label for="instagram"><span class="negrita">Instagram: </span> @if (Auth::user()->instagram == '')
                    <span>Sin especificar...</span>
                @else
                    <span>{{Auth::user()->instagram}}</span>
                @endif</label>
            </div>

            <div class="campos-formulario">
                <label for="twitch"><span class="negrita">Twitch: </span>@if (Auth::user()->twitch == '')
                    <span>Sin especificar...</span>
                @else
                    <span>{{Auth::user()->twitch}}</span>
                @endif</label>
            </div>
        </div>

        <a href="{{route('account.edit', ['account' => Auth::user()])}}">Editar cuenta</a>
    </div>
</main>
@endsection
