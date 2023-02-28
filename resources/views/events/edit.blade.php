@extends('layout')
@section('titulo', 'Editar un evento')

@section('cuerpo')
<main>
    <form class="formulario" action="{{route('events.update', ['event' => $event])}}" method="POST">
        @csrf
        @method('put')

        <h1>Editar el evento "{{$event->name}}"</h1>

        <div class="campos-formulario">
            <label for="name">Título:</label>
            @error('name') <span class="errores">{{$message}}</span> @enderror
            <input type="text" name="name" value="{{$event->name}}">
        </div>

        <div class="campos-formulario">
            <label for="description">Descripción:</label>
            @error('description') <span class="errores">{{$message}}</span> @enderror
            <textarea name="description" id="description" cols="30" rows="10">{{$event->description}}</textarea>
        </div>

        <div class="campos-formulario">
            <label for="location">Localización:</label>
            @error('location') <span class="errores">{{$message}}</span> @enderror
            <input type="text" name="location" value="{{$event->location}}">
        </div>


        <div class="campos-formulario">
            <label for="date">Fecha:</label>
            @error('date') <span class="errores">{{$message}}</span> @enderror
            <input type="date" name="date" value="{{$event->date}}">
        </div>

        <div class="campos-formulario">
            <label for="hour">Hora:</label>
            @error('hour') <span class="errores">{{$message}}</span> @enderror
            <input type="time" name="hour" value="{{$event->hour}}">
        </div>

        <div class="campos-formulario">
            <label for="tags">Tags:</label>
            @error('tags') <span class="errores">{{$message}}</span> @enderror
            <input type="text" name="tags" value="{{$event->tags}}">
        </div>


        <div class="campos-formulario-row">
            <label for="visible">Visible</label>
            @error('visible') <span class="errores">{{$message}}</span> @enderror
            <input type="checkbox" name="visible" @checked($event->visible == 1)>
        </div>

        <div class="btn-formulario">
            <input type="submit" name="edit" value="Guardar">
        </div>
    </form>
</main>
@endsection
