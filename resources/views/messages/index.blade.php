@extends('layout')

@section('titulo', 'Mensajes')

@section('cuerpo')
    <main>
        @if (isset($confirmacion))
            <p class="confirmacion">{{$confirmacion}}</p>
        @endif
        <h1>Mensajes</h1>
        <div class="contenedor-mensajes">
            @forelse ($messages as $message)
                @if ($message->readed == 0)
                <a class="noSubrayado" href="{{route('messages.show', ['message' => $message])}}">
                    <div class="mensaje">
                        <h3>{{$message->name}}</h3>
                        <h3>{{$message->subject}}</h3>
                    </div>
                </a>
                @else
                <a class="noSubrayado" href="{{route('messages.show', ['message' => $message])}}">
                    <div class="mensaje">
                        <h3 class="mensaje-leido">{{$message->name}}</h3>
                        <p>{{$message->subject}}</p>
                    </div>
                </a>
                @endif
            @empty
                <p>No hay mensajes...</p>
            @endforelse
        </div>
    </main>
@endsection
