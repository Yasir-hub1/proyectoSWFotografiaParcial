@extends('layouts.main',['activePage'=>'eventos','titlePage'=>'Editar Evento'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('eventos.update',['id' => $eventos->id]) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-rose">
                                <h4 class="card-title">Formulario de Edición</h4>
                            </div>
                            {{--Body--}}
                            <div class="card-body">
                                {{--Nombre--}}
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> Nombre </label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                               class="form-control"
                                               name="nombre"
                                               value="{{ old('nombre',$eventos->nombre) }}" autofocus>
                                        @if ($errors->has('nombre'))
                                            <span class="error text-danger" for="input-nombre">
                                                {{ $errors->first('nombre') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{--Descripcion--}}
                                <div class="row">
                                    <label for="descripcion" class="col-sm-2 col-form-label"> Descripcion </label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                               class="form-control"
                                               name="descripcion"
                                               value="{{ old('descripcion',$eventos->descripcion) }}" autofocus>
                                        @if ($errors->has('descripcion'))
                                            <span class="error text-danger" for="input-descripcion">
                                                {{ $errors->first('descripcion') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{--Ubicacion--}}
                                <div class="row">
                                    <label for="ubicacion" class="col-sm-2 col-form-label"> Ubicación </label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                               class="form-control"
                                               name="ubicacion"
                                               value="{{ old('ubicacion',$eventos->ubicacion) }}">
                                        @if ($errors->has('ubicacion'))
                                            <span class="error text-danger" for="input-ubicacion">
                                                {{ $errors->first('ubicacion') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{--Fecha--}}
                                <div class="row">
                                    <label for="fecha" class="col-sm-2 col-form-label"> Fecha </label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                               class="form-control"
                                               name="fecha"
                                               value="{{ old('fecha',$eventos->fecha) }}">
                                        @if ($errors->has('fecha'))
                                            <span class="error text-danger" for="input-fecha">
                                                {{ $errors->first('fecha') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{--Hora--}}
                                <div class="row">
                                    <label for="hora" class="col-sm-2 col-form-label"> Hora </label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                               class="form-control"
                                               name="Hora"
                                               value="{{ old('hora',$eventos->hora) }}">
                                        @if ($errors->has('hora'))
                                            <span class="error text-danger" for="input-hora">
                                                {{ $errors->first('hora') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{--Precio--}}
                                <div class="row">
                                    <label for="precio" class="col-sm-2 col-form-label"> Precio </label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                               class="form-control"
                                               name="precio"
                                               value="{{ old('precio',$eventos->precio) }}">
                                        @if ($errors->has('precio'))
                                            <span class="error text-danger" for="input-precio">
                                                {{ $errors->first('precio') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                            {{--Botones--}}
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-rose"> Actualizar Datos </button>
                                <a class="btn btn-rose" href="{{ route('eventos.index') }}"> Cancelar </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
