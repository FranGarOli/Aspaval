@extends('layout')
@section('titulo', 'Crear evento')

@section('cuerpo')
<main>
    <form action="{{route('events.store')}}" method="POST" class="formulario">
        @csrf
        
        <h1>Crear evento</h1>
        <div class="campos-formulario">
            <label for="name">Título:</label>
            @error('name') <span class="errores">{{$message}}</span> @enderror
            <input type="text" name="name" value="{{old('name')}}" placeholder="Introduce un título del evento...">
        </div>

        <div class="campos-formulario">
            <label for="description">Descripción:</label>
            @error('description') <span class="errores">{{$message}}</span> @enderror
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Introduce la explicación del evento...">{{old('description')}}</textarea>
        </div>

        <div class="campos-formulario">
            <label for="location">Localización:</label>
            @error('location') <span class="errores">{{$message}}</span> @enderror

            <input type="text" name="location" value="{{old('location')}}" placeholder="Introduce la localización del evento...">
        </div>

        <div class="campos-formulario">
            <label for="date">Fecha:</label>
            @error('date') <span class="errores">{{$message}}</span> @enderror
            <input type="date" name="date" value="{{old('date')}}" placeholder="Introduce la fecha del evento...">
        </div>

        <div class="campos-formulario">
            <label for="hour">Hora:</label>
            @error('hour') <span class="errores">{{$message}}</span> @enderror
            <input type="time" name="hour" value="{{old('hour')}}" placeholder="Introduce la hora del evento...">
        </div>

        <div class="campos-formulario">
            <label for="tags">Etiquetas:</label>
            @error('tags') <span class="errores">{{$message}}</span> @enderror
            <input type="text" name="tags" value="{{old('tags')}}" placeholder="Introduce etiquetas para identificar el evento...">
        </div>

        <div class="campos-formulario-row">
            <input type="checkbox" name="visible" id="visible">
            <label for="visible">Hacerlo visible</label>
        </div>

        <div class="btn-formulario">
            <input type="submit" name="create" value="Crear evento">
        </div>
    </form>
</main>
@endsection
