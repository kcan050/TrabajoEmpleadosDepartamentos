@extends('base')





@section('content')
<div class="modal" id="modalDelete" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Confirm delete <span class="nombre" >XXX</span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form id="form" action="" method="post">
            @method('delete')
            @csrf
            <input type="submit" class="btn btn-primary" value="Borrar empleado"/>
        </form>
      </div>
    </div>
  </div>
</div>
<h1>SECCION EMPLEADOS JEFES</h1>

@if(Session::has('message'))
    <div class="alert alert-{{ session()->get('type') }}" role="alert">
        {{ session()->get('message') }}
    </div>
@endif

 <div class="form-group mb-4">
         <div class="col-sm-18" style="text-align:center;">
                <a type="button" class="btn btn-success" href="{{ url('empleados/create') }}">Agrega un empleado</a>
           </div>
  </div>
  
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">TABLA EMPLEADOS JEFES</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th  class="border-top-0">ID</th>
                                            <th  class="border-top-0">NOMBRE</th>
                                            <th class="border-top-0">APELLIDOS</th>
                                            <th  class="border-top-0">EMAIL</th>
                                             <th  class="border-top-0">TELÉFONO</th>
                                              <th  class="border-top-0">FECHA_CONTRATO</th>
                                               <th  class="border-top-0">ID_PUESTO</th>
                                                <th  class="border-top-0">ID_DEPARTAMENTO</th>
                                                <th  class="border-top-0"></th>
                                                <th  class="border-top-0"></th>
                                                <th  class="border-top-0"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($empleados as $empleado)
                                        <tr>
                                           <td >{{ $empleado->id }}</td>
                                          
                                      
                                        
                                            <td >{{ $empleado->nombre }}</td>
                                            
                                        
                                       
                                            <td >{{  $empleado->apellidos}}</td>
                                           
                                      
                                            <td >{{  $empleado->email }}</td>
                                            
                                            
                                            <td >{{  $empleado->telefono}}</td>
                                            
                                            
                                            <td >{{  $empleado->fecha_contrato }}</td>
                                            
                                            
                                            <td >{{  $empleado->id_puesto }}</td>
                                            
                                            
                                            <td >{{  $empleado->id_departamento }}</td>
                                                
                                            <td>
                                                <form action="{{url('empleados/ ' . $empleado->id)}} " method="get">
                                                    @csrf
                                                    @method('get')
                                                    <input type="hidden" name="id" value="{{$empleado->id}}"/>
                                                    <input type="submit" class="btn btn-info" value="Mostrar"/>
                                                </form>
                                               
                                            </td>
                                             <td>
                                                <a type="button" class="btn btn-success" href="{{ url('empleados/' . $empleado->id . '/edit') }}">Editar</a>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete" onclick="deleteElement({{$empleado->id}}, '{{$empleado->nombre}}','empleados')">Borrar</a>
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
 
  
@endsection

@section('js')


<script src="{{ url('assets2/js/borrado.js') }}"></script>
@endsection