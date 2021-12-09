@extends('base')


@section('content')
@if(Session::has('message'))
    <div class="alert alert-{{ session()->get('type') }}" role="alert">
        {{ session()->get('message') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                 <form action="{{ url('puesto/' . $puesto->id )  }}" method="post" class="form-horizontal form-material">
                                   @csrf
                                   @method('put')
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Nombre del puesto:</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="nombre" value="{{ old('nombre', $puesto->nombre )}}" placeholder="Nombre"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Sueldo minimo</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="number" value="{{ old('minimo', $puesto->minimo )}}"name="minimo" placeholder="Minimo"
                                                class="form-control p-0 border-0" 
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Sueldo maximo</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="number" name="maximo" value="{{ old('maximo', $puesto->maximo )}}" placeholder="Maximo"
                                                class="form-control p-0 border-0"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <input value="Editar" type="submit" class="btn btn-success"></input>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

@endsection