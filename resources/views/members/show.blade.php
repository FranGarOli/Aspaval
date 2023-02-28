@extends('layout')
@section('titulo', $member->username)

@section('cuerpo')
<main>
    <div>
        <h1>{{$member->name}}</h1>
        @if (file_exists('img/perfiles/'.$member->username.'.png'))
            <img src="/img/perfiles/{{$member->username}}.png" width="200px" alt="Foto de perfil">
        @else
            <img src="/img/perfiles/default.jpg" width="200px" alt="Foto de perfil">
        @endif
        <h3>@ {{@$member->username}}</h3>
        <p><span class="negrita">Email:</span> {{$member->email}}</p>
        <p><span class="negrita">Twitter:</span> @if ($member->twitter == '')
            <span>Sin especificar...</span>
        @else
            <span>{{$member->twitter}}</span>
        @endif</p>

        <p><span class="negrita">Instagram:</span> @if ($member->instagram == '')
            <span>Sin especificar...</span>
        @else
            <span>{{$member->instagram}}</span>
        @endif</p>

        <p><span class="negrita">Twitch:</span> @if ($member->twitch == '')
            <span>Sin especificar...</span>
        @else
            <span>{{$member->twitch}}</span>
        @endif</p>

        <p><span class="negrita">Fecha de cumpleaños:</span> {{date('d-m-Y',strtotime($member->birthday))}}</p>
        <p><span class="negrita">Cuenta creada en:</span> {{$member->created_at}}</p>
    </div>
</main>
@endsection
