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
        <p>Desea borrar <span class="nombre" >XXX</span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form id="form" action="" method="post">
            @method('delete')
            @csrf
            <input type="submit" class="btn btn-primary" value="Borrar departamento"/>
        </form>
      </div>
    </div>
  </div>
</div>
<h1>DATOS DEL DEPARTAMENTO</h1>
<div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">INFORMACION DEL DEPARTAMENTO</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Nombre: {{ $departamento->nombre }}</h6>
                    <span class="mb-2 text-xs">Localizacion: <span class="text-dark font-weight-bold ms-sm-2">{{$departamento->localizacion}}</span></span>
                    @if($departamento->id_empleado_jefe == null)
                    
                    <span class="mb-2 text-xs">Nombre del jefe de departamento: <span class="text-dark ms-sm-2 font-weight-bold">NO ASIGNADO</span></span>
                   @else
                   
                    <span class="mb-2 text-xs">Nombre del jefe de departamento: <span class="text-dark ms-sm-2 font-weight-bold">{{$empleado->nombre}}</span></span>
                 @endif
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="#modalDelete" onclick="deleteElement({{$departamento->id}}, '{{$departamento->nombre}}','departamentos')"><i class="material-icons text-sm me-2">delete</i>Borrar</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="{{ url('departamentos/' . $departamento->id . '/edit') }}"><i class="material-icons text-sm me-2">edit</i>Editar</a>
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