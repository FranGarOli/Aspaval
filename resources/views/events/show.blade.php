@extends('layout')
@section('titulo', 'Evento')

@section('cuerpo')
<main>
    <div class="contenedorEvento">
        <div>
            <h1>Miembros apuntados: {{$event->users->count()}}</h1><hr>
            @forelse ($event->users as $miembro)
                <div class="apuntado">
                    @if (file_exists('img/perfiles/'.$miembro->username.'.png'))
                        <img src="../img/perfiles/{{$miembro->username}}.png" width="40px" alt="Foto de perfil">
                    @else
                        <img src="../img/perfiles/default.jpg" width="40px" alt="Foto de perfil">
                    @endif
                    <p>{{$miembro->username}}</p>
                </div>
                <hr>
            @empty
                <p>No hay miembros apuntados todavía...</p>
            @endforelse
        </div>

        <div class="mostrarEvento">
            <img src="/img/evento.jpg" width="800px" height="auto" alt="Foto evento">
            <h1>{{$event->name}}</h1>
            <p></p>
            <p id="date"><span style="font-weight: bold">{{date('d-m-Y',strtotime($event->date))}}</span> a las <span style="font-weight: bold">{{$event->hour}}</span></p>
            <p>Descripción: {{$event->description}}</p>
            <p>Tags: {{$event->tags}}</p>

            {{-- hacer un store en el controlador de la tabla intermedia users-events --}}
            <div class="fila-apuntarse">
            <form action="{{route('join', ['event' => $event] )}}" method="post">
                @csrf
                @method('put')
                @if ($event->users->contains(Auth::id()))

                    <input id="btnApuntarse" type="submit" value="Desapuntarse">
                    {{-- <button id="btnApuntarse">
                        <a href="{{route('join', ['event' => $event] )}}">Desapuntarse</a>
                    </button> --}}
                @else
                    <input id="btnApuntarse" type="submit" value="Apuntarse">
                @endif
            </form>
            </div>
        </div>

    </div>
</main>
@endsection
