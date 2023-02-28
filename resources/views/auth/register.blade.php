@extends('layout')
@section('titulo', 'Registro')

@section('cuerpo')
<main>
    <div class="contenedor-registro">
    <h1>Regístrate en nuestra asociación!</h1>

        <form class="formulario" action="{{route('registro')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="campos-formulario">
            <label for="username">Nombre de usuario:</label>
            @error('username') <span class="errores">{{$message}}</span> @enderror
            <input type="text" name="username" value="{{old('username')}}">
        </div>

        <div class="campos-formulario">
            <label for="name">Nombre completo:</label>
            @error('name') <span class="errores">{{$message}}</span> @enderror
            <input type="text" name="name" value="{{old('name')}}">
        </div>

        <div class="campos-formulario">
            <label for="email">Email:</label>
            @error('email') <span class="errores">{{$message}}</span> @enderror
            <input type="email" name="email" value="{{old('email')}}">
        </div>

        <div class="campos-formulario">
            <label for="password">Contraseña:</label>
            @error('password') <span class="errores">{{$message}}</span> @enderror
            <input type="password" name="password" value="{{old('password')}}">
        </div>

        <div class="campos-formulario">
            <label for="password_confirmation">Repite la contraseña:</label>
             @error('password') <span class="errores">{{$message}}</span> @enderror
             <input type="password" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}">
        </div>

        <div class="campos-formulario">
            <label for="birthday">Fecha de nacimiento:</label>
            @error('birthday') <span class="errores">{{$message}}</span> @enderror
            <input type="date" name="birthday" value="{{old('birthday')}}">
        </div>

        <div class="campos-formulario">
            <label for="image">Foto de perfil: </label>
            @error('image') <span class="errores">{{$message}}</span> @enderror
            <input type="file" name="image" id="image">
        </div>

        <div class="campos-formulario">
            <label for="twitter">Twitter:</label>
            @error('twitter') <span class="errores">{{$message}}</span> @enderror
            <input type="text" name="twitter" value="{{old('twitter')}}">
        </div>

        <div class="campos-formulario">
            <label for="instagram">Instagram:</label>
            @error('instagram') <span class="errores">{{$message}}</span> @enderror
            <input type="text" name="instagram" value="{{old('instagram')}}">
        </div>

        <div class="campos-formulario">
            <label for="twitch">Twitch:</label>
            @error('twitch') <span class="errores">{{$message}}</span> @enderror
            <input type="text" name="twitch" value="{{old('twitch')}}">
        </div>

        <div class="btn-formulario">
            <input type="submit" value="Registrar">
        </div>
    </form>

    <a href="{{route('loginForm')}}">Ya tengo cuenta.</a>

    </div>
</main>
@endsection
