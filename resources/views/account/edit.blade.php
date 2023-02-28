@extends('layout')
@section('titulo', 'Cuenta')

@section('cuerpo')
<main>
    <h1>Configuración de tu cuenta</h1>
    <div class="cuenta">
        <form class="formulario" action="{{route('account.update', ['account' => Auth::user()])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="campos-formulario">
                <label for="name">Nombre completo:</label>
                @error('name') <span class="errores">{{$message}}</span> @enderror
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>

            <div class="campos-formulario">
                <label for="image">Foto de perfil: </label>
                @error('image') <span class="errores">{{$message}}</span> @enderror
                <input type="file" name="image" id="image">
            </div>

            <div class="campos-formulario">
                <label for="birthday">Fecha de nacimiento:</label>
                @error('birthday') <span class="errores">{{$message}}</span> @enderror
                <input type="date" name="birthday" value="{{Auth::user()->birthday}}">
            </div>

            <div class="campos-formulario">
                <label for="twitter">Twitter:</label>
                @error('twitter') <span class="errores">{{$message}}</span> @enderror
                <input type="text" name="twitter" value="{{Auth::user()->twitter}}">
            </div>

            <div class="campos-formulario">
                <label for="instagram">Instagram:</label>
                @error('instagram') <span class="errores">{{$message}}</span> @enderror
                <input type="text" name="instagram" value="{{Auth::user()->instagram}}">
            </div>

            <div class="campos-formulario">
                <label for="twitch">Twitch:</label>
                @error('twitch') <span class="errores">{{$message}}</span> @enderror
                <input type="text" name="twitch" value="{{Auth::user()->twitch}}">
            </div>

            <div class="btn-formulario">
                <input type="submit" name="save" value="Guardar perfil">
            </div>
        </form>
    </div>
</main>
@endsection
