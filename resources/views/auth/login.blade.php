@extends('layout')
@section('titulo', 'Login')

@section('cuerpo')
<main>
    <div class="contenedor-login">
        <h1>Inicio de sesión.</h1>
            <form class="formulario" action="{{route('login')}}" method="POST">
                @csrf

                <div class="campos-formulario">
                    <label for="username">Nombre de usuario: </label>
                    <input type="text" name="username" id="username">
                </div>

                <div class="campos-formulario">
                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="btn-formulario">
                    <input type="submit" name="login" value="Acceder">
                </div>
            </form>
    </div>

</main>

@endsection
