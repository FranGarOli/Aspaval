@extends('layout')

@section('cuerpo')
<main>
    <h1>Próximos eventos...</h1>
    <div class="contenedor-eventos">

        @forelse ($eventos as $event)
            @if ($event->visible == 0)
                <div class="evento-invisible">
            @else
                <div class="evento">
            @endif

                <div class="fila-titulo">
                    <p>{{date('d-m-Y',strtotime($event->date))}} a las  {{$event->hour}}</p>
                </div>

                <div class="fila-descripcion">
                    {{-- si el usuario está logueado tiene link de ir al evento --}}
                    @if (auth()->check())
                        <a href="{{route('events.show', ['event' => $event])}}">
                            <h3>{{$event->name}}</h3>
                        </a>
                    @else
                        <h3>{{$event->name}}</h3>
                    @endif
                    <p>{{$event->description}}</p>
                </div>

                <div class="enlacesEvento">
                    @if (auth()->check())
                        @if (Auth::user()->rol == 'admin')
                            <div class="enlacesAdmin">
                                <button id="enlaceEditar">
                                    <a id="enlaceEditar" href="{{route('events.edit', ['event' => $event] ) }}">Editar</a>
                                </button>
                                <form action="{{route('events.destroy', ['event' => $event] ) }}" method="post">
                                    @csrf
                                    @method('delete')
                                        <input id="btnEliminar" type="submit" name="delete" value="Borrar evento">
                                </form>
                            </div>
                        @endif

                        <div class="enlaceApuntarse">
                            <form action="{{route('join', ['event' => $event] )}}" method="post">
                                @csrf
                                @method('put')

                                @if ($event->users->contains(Auth::id()))
                                    <input id="btnApuntarse" type="submit" value="Desapuntarse">
                                @else
                                    <input id="btnApuntarse" type="submit" value="Apuntarse">
                                @endif
                            </form>
                        </div>
                    @endif
                </div>

            </div>
        </div>

        @empty
            <p>Por el momento no hay eventos disponibles :( </p>
        @endforelse

    <div class="links">
        {{$eventos->links()}}
    </div>

</main>
@endsection
