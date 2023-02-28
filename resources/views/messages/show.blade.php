@extends('layout')
@section('titulo', 'Mensaje')

@section('cuerpo')
<main>
    <div class="contenedor-mensaje">
        <div class="encabezado-mensaje">
            <h1>{{$message->name}}</h1>
            <div class="borrar">
                <h3>{{$message->created_at}}</h3>
                <form action="{{route('messages.destroy', ['message' => $message])}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Borrar">
                </form>
            </div>
        </div>

        <div>
            <h3>{{$message->subject}}</h3>
            <p>{{$message->text}}</p>
        </div>
    </div>
</main>
@endsection
