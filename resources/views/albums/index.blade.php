@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Albumes Registrados</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
                                <!--@csrf
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input id="price" type="number"
                                                               class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                                               name="price"
                                                               tabindex="1" placeholder="Precio de la fotografía" value="{{ old('price') }}"
                                                               autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="file" name="file" id="" accept="image/*">
                                                        <br>
                                                        @error('file')
        <small class="text-danger">{{ $message }}</small>
    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-primary">Subir Foto</button>
                                                </div>-->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="cardbody">
                            <div class="row">


                                @forelse ($evento as $eventos)
                                    <div class="col-4">
                                        <div class="card border-dark mb-3">
                                            <img src="{{asset('img/portadaEvento.jpeg')}}"
                                                alt="" class="img-fluid">
                                            <div class="card-footer">

                                                <div class='card' style='width: 18rem'>

                                                    <div class='card-body'>
                                                        <strong>Nombre del evento: {{$eventos->nombre}}</strong><br>
                                                        <strong>Organizador: {{$eventos->user->name}}</strong>


                                         <form action="{{route('verEventoFoto', ["evento_id"=>$eventos->id,"org_id"=>$eventos->user_id,"fotografo_id"=>auth()->user()->id])}}" class="d-inline"
                                                            method="POST">
                                                            @method('POST')
                                                            @csrf
                                                            <br>
                                                            <button type="submit" class="btn btn-danger">Ver</button>
                                                    </div>
                                                </div>
                                                <a class="btn btn-outline-info" href="{{ route('albums.create') }}">Nuevo
                                                    Album</a>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <h3>No hay eventos</h3>
                                @endforelse



                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
