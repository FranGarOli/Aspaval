@extends('layout')
@section('titulo', 'Miembros')

@section('cuerpo')
<main>
    <div class="contenedor-miembros">
        @forelse ($miembros as $miembro)
            <div class="contenedor-miembro">
                @if (auth()->check())
                    <a href="{{route('members.show', ['member' => $miembro])}}">

                        @if (file_exists('img/perfiles/'.$miembro->username.'.png'))
                            <img src="img/perfiles/{{$miembro->username}}.png" width="200px" alt="Foto de perfil">
                        @else
                            <img src="img/perfiles/default.jpg" width="200px" alt="Foto de perfil">
                        @endif

                    </a>
                @else
                    @if (file_exists('img/perfiles/'.$miembro->username.'.png'))
                    <img src="img/perfiles/{{$miembro->username}}.png" width="200px" alt="Foto de perfil">
                    @else
                        <img src="img/perfiles/default.jpg" width="200px" alt="Foto de perfil">
                    @endif
                @endif
                <h3>{{$miembro->username}}</h3>
            </div>
        @empty
            <p>No hay miembros registrados :(</p>
        @endforelse
    </div>
</main>
@endsection
