<?php

namespace App\Http\Controllers;

use App\Models\departamentoController;
use App\Models\empleadosController;
use Illuminate\Http\Request;
use \Exception;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\DepartamentoCreateRequest;
use Illuminate\Support\Facades\DB;
class DepartamentoControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        
        $data['cantidad'] = DB::table('departamento')->count();
        $data['departamentos'] = departamentoController::all();
        return view('departamentos.index',$data);
    }

 
    public function create()
    {   $data = [];
        $data['empleados'] = empleadosController::all();
        return view('departamentos.create', $data);
    }

    
    public function store(DepartamentoCreateRequest $request)
    {
         $data = [];
        
        
         if($request->id_empleado_jefe == "null"){
            $request->merge([
                'id_empleado_jefe' => null,   //casteamos el null del select a null
                ]);
        }
     
       
    
     if(departamentoController::select("*")->exists()){ //controlo que el empleado exista 
        
      if($request->id_empleado_jefe <> null){ // controlo si se a asignado un jefe al departamento 
          $empleadosController = empleadosController::find($request->id_empleado_jefe);   //busco el objeto de ese empleado
          $isExist = departamentoController::select("*")->where("id_empleado_jefe",$request->id_empleado_jefe)->exists(); //controlo que el empleado no sea jefe de algun departamento
          if($empleadosController->id_departamento <> $request->id){  //controlo que el empleado no pueda ser jefe de otro departamento
              $data['message'] = 'ERROR, el empleado ' . $empleadosController->nombre . ' no puede ser jefe de distinto departamento';
              $data['type'] = 'danger';
              return back()->withInput()->with($data);
          }
           if($isExist){ //controlo si el empleado ya es jefe de algun  departamento
              $data['message'] = 'ERROR, el empleado ' . $empleadosController->nombre . ' ya es jefe de un departamento';
              $data['type'] = 'danger';
              return back()->withInput()->with($data);
          }
          
         }
      }         

                        
     
       
       
        $data['message'] = 'El puesto se ha insertado correctamente.';
        $data['type'] = 'success';
        $departamentoController = new departamentoController($request->all());
       
        try {
            
            $result = $departamentoController->save();
            
        } catch(Exception $e) {
            $result = false;
        }
        if(!$result) {
            $data['message'] = 'Error, el puesto no se ha insertado correctamente.';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        return redirect('departamentos')->with($data);
    }

    
    public function show($id)
    {   
        $data = [];
        
        
        $departamentoController = departamentoController::find($id);
        
        $empleadosController = empleadosController::find($departamentoController->id_empleado_jefe);
        $data['departamento'] = $departamentoController;
        
        $data['empleado'] = $empleadosController;
    
         return view('departamentos.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\departamentoController  $departamentoController
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        
        $departamentoController = departamentoController::find($id);
        
        $data['departamentos'] = $departamentoController;
         $data['empleados'] = empleadosController::all();
        return view('departamentos.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\departamentoController  $departamentoController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    { 
        
        
        
        $rules = [
            'nombre'     => 'required|min:3|max:20|unique:departamento,nombre,'. $id,
            'localizacion' => 'required|min:3|max:20',
            'id_empleado_jefe'   => 'unique:departamento,id_empleado_jefe,'. $id,
            
            
        ];
        $messages = [
            'nombre.max'          => 'No puede ingresar mas de 20 caracteres',
            'nombre.unique'       => 'El departamento es unico en la tabla',
            'nombre.min'          => 'Tiene que ingresar un minimo de 3 caracteres',
            'localizacion.max'          => 'No puede ingresar mas de 20 caracteres',
            'localizacion.min'          => 'Tiene que ingresar un minimo de 3 caracteres',
            'nombre.required'     => 'El campo nombre es requerido',
            'localizacion.required'     => 'El campo localizacion es requerido',
            'id_empleado_jefe.unique'       => 'El campo id_empleado_jefe es unico',
           
        ];
        
        
         $validator = Validator::make($request->all() ,$rules, $messages);
       
        if ($validator->fails()) {
           
            return back()
                    ->withInput()
                    //->withErrors($validator->messages());
                    ->withErrors($validator);
        }
        
        if($request->id_empleado_jefe == "null"){
            $request->merge([
                'id_empleado_jefe' => null,
                ]);
        }
      $data = [];
      $departamentoController = departamentoController::find($id);
      
     
      if(empleadosController::select("*")->exists()){  //controlo que el empleado exista
      
          if($request->id_empleado_jefe <> null){  //controlamos que el id del empleado jefe sea distinto de null
                $empleadosController = empleadosController::find($request->id_empleado_jefe); 
                $isExist = departamentoController::select("*")->where("id_empleado_jefe", $request->id_empleado_jefe)->exists();//controlo que el empleado no sea jefe de algun departamento
                
                if($empleadosController->id_departamento <> $id){    //controlo que el empleado no pueda ser jefe de otro departamento
                  $data['message'] = 'ERROR, el empleado ' . $empleadosController->nombre . ' no puede ser jefe de distinto departamento';
                  $data['type'] = 'danger';
                  return back()->withInput()->with($data);
                }
                
                 if($isExist){
                      $data['message'] = 'ERROR, el empleado ' . $empleadosController->nombre . ' ya es jefe de un departamento';
                      $data['type'] = 'danger';
                      return back()->withInput()->with($data);
                  }
             }
      }
        

                        

                        
     
    
        
       
        $data['message'] = 'El departamento ' . $departamentoController->nombre . 'se ha actualizado correctamente.';
        $data['type'] = 'success';
        
        try {
            
            $result = $departamentoController->update($request->all());
           
           
            //$result = $place->save();
        } catch(Exception $e) {
            $result = false;
        }
        if(!$result) {
            $data['message'] = 'ERROR, el departamento' . $departamentoController->nombre . ' no se ha podido actualizar.';
            
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        return redirect('departamentos')->with($data);
        
   
        
        
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\departamentoController  $departamentoController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamentoController = departamentoController::find($id);
        $data = [];
        $data['message'] = 'El departamento ' . $departamentoController->name . ' ha sido borrado correctamente.';
        $data['type'] = 'success';
        try {
            $departamentoController->delete();
        } catch(Exception $e) {
            $data['message'] = 'ERROR, el departamento ' . $departamentoController->name . 'no se ha borrado correctamente.';
            $data['type'] = 'danger';
        }
        return redirect('departamentos')->with($data);
    }
}
