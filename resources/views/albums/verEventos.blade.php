@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Fotos</h3>
        </div>
        <div class="row">
        @forelse ($obtenerFotoDelEvento as $obtenerFotoDelEventos)

                <div class="card" style="margin:20px">
                    <div class="card" style="width: 18rem">
                        <img src="{{ asset($obtenerFotoDelEventos->imagen) }}" class="img-fluid" alt="...">
                        <div class="card-body">
                            <p class="card-text">Evento: {{ $obtenerFotoDelEventos->nombre }}</p>
                            <p class="card-text">Organizador: {{ $obtenerFotoDelEventos->name }}</p>
                        </div>
                    </div>
                </div>





        @empty
            <h3>No hay Fotos disponible</h3>
        @endforelse
    </div>




    </section>
@endsection
