@extends('base')


@section('content')
@if(Session::has('message'))
    <div class="alert alert-{{ session()->get('type') }}" role="alert">
        {{ session()->get('message') }}
    </div>
@endif

@if ($errors->any())
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
                                <form action="{{ url('departamentos') }}" method="post" class="form-horizontal form-material">
                                    @csrf
                                    @method('post')
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Nombre del departamento:</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="nombre" placeholder="Nombre"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Localizacion</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  name="localizacion" placeholder="Localizacion"
                                                class="form-control p-0 border-0" 
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Seleccione el jefe del departamento:</label>
                                        <div class="col-md-12 border-bottom p-0">
                                           
                                            <select type="number" name="id_empleado_jefe" placeholder="Jefe"
                                                class="form-control p-0 border-0"
                                                id="example-email"> 
                                                    <option value="null" selected>No asignar jefe</option>
                                              @foreach($empleados as $empleadosController)
                                                      <option style="color:gray;" value="{{ $empleadosController->id }}">{{ $empleadosController->nombre }}</option>
                                              @endforeach
                                                </select>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <input value="Agregar" type="submit" class="btn btn-success"></input>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

@endsection