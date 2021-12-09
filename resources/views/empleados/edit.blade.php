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
                                <form action="{{ url('empleados/' . $empleados->id )  }}" method="post" class="form-horizontal form-material">
                                    @csrf
                                   @method('put')
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Nombre del empleado:</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="nombre" value="{{ old('nombre', $empleados->nombre) }}" placeholder="Nombre"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="apellidos" class="col-md-12 p-0">Apellidos:</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{ old('apellidos', $empleados->apellidos) }}"name="apellidos" placeholder="Apellidos"
                                                class="form-control p-0 border-0" 
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email:</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" name="email" value="{{ old('email', $empleados->email) }}" placeholder="Email"
                                                class="form-control p-0 border-0"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="telefono" class="col-md-12 p-0">Teléfono:</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{ old('telefono', $empleados->telefono) }}"name="telefono" placeholder="Telefono"
                                                class="form-control p-0 border-0" 
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="fecha_contrato" class="col-md-12 p-0">Fecha de contrato:</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="date" value="{{ old('fecha_contrato', $empleados->fecha_contrato) }}"name="fecha_contrato" 
                                                class="form-control p-0 border-0" 
                                                id="example-email">
                                        </div>
                                    </div>
                                     <div class="form-group mb-4">
                                        <label for="fecha_contrato" class="col-md-12 p-0">Puesto:</label>
                                        <select name="id_puesto" class="col-md-12 border-bottom p-0">
                                            <option style="background-color:gray;" selected disabled value="">&nbsp;</option>
                                                @foreach ($puesto as $puestoController)
                                                    <option style="background-color:gray;" value="{{ $puestoController->id }}">{{ $puestoController->nombre }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="fecha_contrato" class="col-md-12 p-0">Departamento:</label>
                                        <select name="id_departamento" class="col-md-12 border-bottom p-0">
                                            <option style="background-color:gray;" selected disabled value="">&nbsp;</option>
                                                @foreach ($departamento as $departamentoController)
                                                    <option style="background-color:gray;" value="{{ $departamentoController->id }}">{{ $departamentoController->nombre }}</option>
                                                @endforeach
                                        </select>
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