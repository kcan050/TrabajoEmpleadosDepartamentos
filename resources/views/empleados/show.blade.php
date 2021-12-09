@extends('base')

@section('content')
<div class="modal" id="modalDelete" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmar borrado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Desea borrar al empleado <span class="nombre" >XXX</span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form id="form" action="" method="post">
            @method('delete')
            @csrf
            <input type="submit" class="btn btn-primary" value="Borrar empleado"/>
        </form>
      </div>
    </div>
  </div>
</div>
<h1>DATOS DEL EMPLEADO</h1>
<div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">INFORMACION DEL EMPLEADO</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Nombre: {{ $empleados->nombre }}</h6>
                    <span class="mb-2 text-xs">Apellidos: <span class="text-dark font-weight-bold ms-sm-2">{{$empleados->apellidos}}</span></span>
                    <span class="mb-2 text-xs">Email: <span class="text-dark ms-sm-2 font-weight-bold">{{$empleados->email}}</span></span>
                    <span class="text-xs">Telefono: <span class="text-dark ms-sm-2 font-weight-bold">{{$empleados->telefono}}</span></span>
                    <span class="text-xs">Fecha de contratacion: <span class="text-dark ms-sm-2 font-weight-bold">{{$empleados->fecha_contrato}}</span></span>
                    <span class="text-xs">Nombre del puesto: <span class="text-dark ms-sm-2 font-weight-bold">{{$puesto->nombre}}</span></span>
                    <span class="text-xs">Nombre del departamento: <span class="text-dark ms-sm-2 font-weight-bold">{{$departamento->nombre}}</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="#modalDelete" onclick="deleteElement({{$empleados->id}}, '{{$empleados->nombre}}','empleados')"><i class="material-icons text-sm me-2">delete</i>Borrar</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="{{ url('empleados/' . $empleados->id . '/edit') }}"><i class="material-icons text-sm me-2">edit</i>Editar</a>
                  </div>
                </li>

                
              </ul>
            </div>
          </div>
        </div>

@endsection

@section('js')


<script src="{{ url('assets2/js/borrado.js') }}"></script>
@endsection