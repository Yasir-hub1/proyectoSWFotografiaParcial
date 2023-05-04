@extends('layouts.app', ['activePage' => 'eventos', 'titlePage' => 'Eventos'])

@section('content')
@section('css')
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Eventos Registrados</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{--   <a class="btn btn-outline-info" href="{{route('eventos.index')}}">Nuevo Evento</a><br><br> --}}
                        <div class="table-responsive">

                            <table class="table table-striped mt-15 " id="table">
                                <thead style="background-color: #6777ef;">
                                    <!---->
                                    <!--<th style="display:none;">ID</th>-->
                                    <th class="text-center" style="color: #fff;">Nombre</th>
                                    <th class="text-center" style="color: #fff;">Descripcion</th>
                                    <th class="text-center" style="color: #fff;">Ubicacion</th>
                                    <th class="text-center" style="color: #fff;">Fecha</th>
                                    <th class="text-center" style="color: #fff;">Hora</th>
                                    <th class="text-center" style="color: #fff;">Precio</th>
                                    <th class="text-center" style="color: #fff;">Estado</th>
                                    <th class="text-center" style="color: #fff;">Código QR</th>
                                    <th class="text-center" style="color: #fff;"></th>

                                </thead>
                                <tbody>
                                    @foreach ($eventos as $evento)
                                        <tr>
                                            {{--  <td  class="text-center">
                                        <a href="{{route('productos.show', $producto->id)}}">{{$producto->codigo}} </a>
                                        </td> --}}
                                            <td class="text-center">{{ $evento->nombre }}</td>
                                            <td class="text-center">{{ $evento->descripcion }}</td>
                                            <td class="text-center">{{ $evento->ubicacion }}</td>

                                            <td class="text-center">{{ $evento->fecha }}</td>
                                            <td class="text-center">{{ $evento->hora }}</td>
                                            <td class="text-center">{{ $evento->precio }}</td>

                                            <td class="text-center">
                                                @if ($evento->estado == 'b')
                                                    <div class="badge badge-pill badge-success">De Baja</div>
                                                @else
                                                    <div class="badge badge-pill badge-danger">Activo</div>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="img-container">
                                                    <img style="height: 170px; width: 147px;"
                                                        src="{{ asset('storage/codesqr/'.$evento->code_qr) }}" alt="">
                                                </div>
                                            </td>

                                            <td class="td-actions text-right">
                                                        {{--Editar--}}
                                                        <a href="{{ route('eventos.edit',$evento->id) }}" class="btn btn-warning">
                                                            <i class="material-icons">Editar</i>
                                                        </a>
                                                        {{--Eliminar--}}
                                                        <form action="{{ route('eventos.destroy',$evento->id) }}"
                                                              method="POST" style="display: inline-block;"
                                                              onsubmit="return confirm('¿Está seguro?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit">
                                                                <i class="material-icons">Eliminar</i>
                                                            </button>
                                                        </form>
                                              </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

