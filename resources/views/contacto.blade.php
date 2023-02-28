@extends('layout')
@section('titulo', 'Contacto')

@section('cuerpo')
<main>
    <form class="formulario" action="{{route('messages.store')}}" method="post">
        @csrf
        @if (isset($confirmacion))
            <p class="confirmacion">{{$confirmacion}}</p>
        @endif
        <h1>Mandar mensaje</h1>

        @if (auth()->check())
            <div class="campos-formulario">
                @error('name') <span class="errores">{{$message}}</span> @enderror
                <input type="hidden" name="name" value="{{auth()->user()->name}}">
            </div>
        @else
            <div class="campos-formulario">
                <label for="name">Nombre:</label>
                @error('name') <span class="errores">{{$message}}</span> @enderror
                <input type="text" name="name" placeholder="Introduce tu nombre...">
            </div>
        @endif

        <div class="campos-formulario">
            <label for="subject">Asunto:</label>
            @error('subject') <span class="errores">{{$message}}</span> @enderror
            <input type="text" name="subject" placeholder="Introduce el asunto del mensaje...">
        </div>

        <div class="campos-formulario">
            <label for="text">Texto:</label>
            @error('text') <span class="errores">{{$message}}</span> @enderror
            <input type="text" name="text" placeholder="Introduce el mensaje...">
        </div>

        <div class="btn-formulario">
            <input type="submit" name="send" value="Enviar">
        </div>
    </form>
</main>
@endsection
