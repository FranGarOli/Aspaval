@extends('layout')
@section('titulo', 'Inicio')

@section('cuerpo')
<main>
    <div class="contenedor-inicio">
            <div class="imagen-principal">
                <img src="{{asset('img/principal.png')}}" alt="Logo app" width="1000px" height="600px">
            </div>
        <div class="texto-principal">
            <p>Aspaval es una asociación sin ánimo de lucro donde los principales protagonistas sois vosotros. Aquí podrás inscribirte, tanto en torneos que se vayan celebrando cómo en partidos individuales a modo de pachanga.</p>
            <p>Nuestra asociación acaba de comenzar, pero a medida que la gente se vaya inscribiendo y vaya aumentando la cantidad de miembros se irá mejorando la plataforma. Cualquier recomendación es bienvenida.</p>
            <h3>¡Gracias por vuestra atención!</h3>
        </div>

    </div>
</main>
@endsection
