@extends('layouts.app', ['activePage' => 'productos', 'titlePage' => 'Productos'])
@section('css')   <!--- ESTO AUMENTE PARA UTILIZAR PLUGIN DROPZONE -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Subir Imágenes</h3>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
               <div class="card card-primary">
                    <div class="card-body">
                        <br>
                        <form action="{{ route('fotos.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('POST')
                            <label for="evento_id" class="col-sm-2 col-form-label">Evento</label>
                                    <div class="col-sm-3">
                                            <select name="evento_id" id="inputEvento_id" class="form-control">
                                            <option value="">-- Seleccione el evento --</option>
                                            @foreach($eventos as $evento)
                                                <option value="{{ $evento->id }}">
                                                    {{ $evento->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('evento_id'))
                                            <span class="error text-danger" for="input-evento_id">
                                                {{ $errors->first('evento_id') }}
                                            </span>
                                        @endif
                                    </div>
                           <div class="row">
                               {{-- <form action="{{ route('fotos.store') }}" method="POST" class="dropzone" id="my-awesome-dropzone"> --}}
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Imagen<span class="required">*</span></label>
                                        <input type="file" class="form-control  @error('file') is-invalid @enderror" name="imagen" accept="image/*" placeholder="Imágenes del Evento...">
                                        <br>
                                        @error('imagen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                       </br>
                                    </div>
                                </div>
                                {{-- </form> --}}

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="estado">Estado<span class="required">*</span></label>
                                        <div class="selectric-hide-select">
                                            <select name="estado" class="form-control selectric">
                                                <option value="a">Activo</option>
                                                <option value="b">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Subir Imágenes</button>
                                <a class="btn btn-danger" href="{{route('albums.index')}}">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!--<form action="{{ route('fotos.store') }}"
                method="POST"
                class="dropzone"
                id="my-awesome-dropzone"> </form>-->
            </div>
        </div>
    </div>

</section>
@endsection
@section('js')   <!---ESTO AUMENTE PARA UTILIZAR PLUGIN DROPZONE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    Dropzone.options.myAwesomeDropZone = {
        header:{
            'X-CSRF-TOKEN' : "{{csrf_token()}}"
        },
        dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo",
        acceptedFiles: "image/*",
        maxFilesize: 2,  /* Tamaño de la imagen, por lo general es de 2 mb*/
        maxFiles: 350
    };
    </script>

@endsection
