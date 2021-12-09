<?php

namespace App\Http\Controllers;

use App\Models\empleadosController;
use App\Models\puestoController;
use App\Models\departamentoController;
use Illuminate\Http\Request;
use \Exception;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EmpleadosCreateRequest;
use App\Http\Requests\EmpleadosUpdateRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class EmpleadosControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        
        $data['cantidad'] = DB::table('empleado')->count();
        $data['empleados'] = empleadosController::all();
        
        return view('empleados.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     public function verJefes(){
        $data = [];
        
        //$empleadosController = DB::table('empleado')->join('departamento', 'empleado.id', '=', 'departamento.id_empleado_jefe')->select('*')->get();
        
        if(empleadosController::select("*")->exists()){ //verifico que la tabla empleados tenga algun empleado
            
            if(DB::table('departamento')->join('empleado','id_empleado_jefe','=', 'empleado.id')->select("*")->exists()){  //verifico que exista algun jefe en la tabla departamentos
             $empleadosController = DB::table('empleado')->rightJoin('departamento', 'empleado.id', '=', 'departamento.id_empleado_jefe')->select('empleado.*')->get(); //si es asi realizo un right join para quedarme con los datos de los empleados que son jefes
            }else{
                $data['message'] = 'Error, no hay asignado ningun jefe en la tabla departamento';
                $data['type'] = 'danger';
                return back()->withInput()->with($data);
                
            }
        }else{
            
            $data['message'] = 'Error, la tabla de empleados esta vacia.';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
         
         
         
         
         
        $data['empleados'] = $empleadosController ;
        return view('empleados.jefes',$data);
         
     }
     
     
     public function verMaximo(){
         
     }
    public function create()
        
    {
        $data = [];
        $data['puesto'] = puestoController::all();
        $data['departamento'] = departamentoController::all();
         return view('empleados.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadosCreateRequest $request)
    {
       
        $data = [];
        $data['message'] = 'El empleado se ha insertado correctamente.';
        $data['type'] = 'success';
        
        $fechaActual = Carbon::now();
        $fechaActual = $fechaActual->format('Y-m-d');   //le damos el formato que necesitamos para la validacion
        
        if($fechaActual < $request->fecha_contrato){    // y comprobamos que la fecha de contratacion sea antes de la fecha actual
            
            $data['message'] = 'Error, la fecha de contrato no puede ser mayor que la fecha actual.';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        $empleadosController = new empleadosController($request->all());
       
        
        try {
            $result = $empleadosController->save();
        } catch(Exception $e) {
            $result = false;
        }
        if(!$result) {
            $data['message'] = 'Error, el empleado no se ha insertado correctamente.';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        return redirect('empleados')->with($data);
    }

    
    public function show($id)
    {    
        $data = [];
        
       
        $empleadosController = empleadosController::find($id);
        $puestoController = puestoController::find($empleadosController->id_puesto);
        $departamentoController = departamentoController::find($empleadosController->id_departamento);
        
        $data['empleados'] = $empleadosController;
        
        $data['departamento'] = $departamentoController;
        
        $data['puesto'] = $puestoController;
         return view('empleados.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empleadosController  $empleadosController
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        
        $data = [];
        $empleadosController = empleadosController::find($id);
        $data['puesto'] = puestoController::all();
        $data['departamento'] = departamentoController::all();
        $data['empleados'] = $empleadosController;
        return view('empleados.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empleadosController  $empleadosController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
         $data = [];
     
        $fechaActual = Carbon::now();  //obtenemos la fecha actual con carbon
        $fechaActual = $fechaActual->format('Y-m-d');  //le damos el formato que necesitamos para la validacion
        
        if($fechaActual < $request->fecha_contrato){ // y comprobamos que la fecha de contratacion sea antes de la fecha actual
            
            $data['message'] = 'Error, la fecha de contrato no puede ser mayor que la fecha actual.';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        
        $empleadosController = empleadosController::find($id);
        
        
        
         $rules = [
            'nombre'     => 'required|min:3|max:15',
            'apellidos' => 'required|min:3|max:30',
            'email' => 'required|max:40|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:empleado,email,' . $id ,
            'telefono'   => 'required|numeric|unique:empleado,telefono,' . $id,
            
        ];
        $messages = [
            'nombre.max'          => 'No puede ingresar mas de 15 caracteres en el nombre',
            'nombre.min'          => 'Tiene que ingresar un minimo de 3 caracteres en el nombre',
            'apellidos.max'          => 'No puede ingresar mas de 30 caracteres en el apellido',
            'apellidos.min'          => 'Tiene que ingresar un minimo de 3 caracteres en el apellido',
            'telefono.max'          => 'No puede ingresar mas de 15 caracteres en el telefono',
            'telefono.min'          => 'Tiene que ingresar un minimo de 3 caracteres en el telefono',
            'email.max'          => 'No puede ingresar mas de 40 caracteres en el email',
            'nombre.required'     => 'El campo nombre es requerido',
            'apellidos.required'     => 'El campo apellido es requerido',
            'email.required'     => 'El campo email es requerido',
            'telefono.required'     => 'El campo telefono es requerido',
            'email.unique'       => 'No puede ingresar un mail ya registrado',
            'email.regex'       => 'Tiene que ingresar un email valido',
            'telefono.unique'       => 'No puede ingresar un telefono ya registrado',
           
        ];
        
        
         $validator = Validator::make($request->all(),$rules,$messages);
       
        if ($validator->fails()) {
           
            return back()
                    ->withInput()
                    //->withErrors($validator->messages());
                    ->withErrors($validator);
        }
       
        $data['message'] = 'El empleado ' . $empleadosController->nombre . ' se ha actualizado correctamente.';
        $data['type'] = 'success';
        
        try {
          
            $result = $empleadosController->update($request->all());
            
            //$place->fill($request->all());
            //$result = $place->save();
        } catch(Exception $e) {
            $result = false;
        }
        
        if(!$result) {
            $data['message'] = 'ERROR, el empleado no se ha podido actualizar.';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        return redirect('empleados')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empleadosController  $empleadosController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        
        $empleadosController = empleadosController::find($id);
        $isExist = departamentoController::select("*")->where("id_empleado_jefe", $id)->exists(); //compruebo que el empleado a eliminar sea jefe de algun departamento
        if($isExist){
            DB::update('update departamento set id_empleado_jefe = null where id_empleado_jefe = :id', ['id' => $id]);
                    
                    //si es jefe de algun departamento realizo un update en la tabla departamento y actualizo el id_empleado_jefe a null
            
        }
        $data = [];
        $data['message'] = 'El empleado ' . $empleadosController->nombre . ' ha sido borrado correctamente.';
        $data['type'] = 'success';
        try {
            $empleadosController->delete();
        } catch(Exception $e) {
            $data['message'] = 'ERROR, el empleado ' . $empleadosController->nombre . ' no se ha borrado correctamente.';
            $data['type'] = 'danger';
        }
        return redirect('empleados')->with($data);
    }
}
