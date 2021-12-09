<?php

namespace App\Http\Controllers;

use App\Models\puestoController;
use App\Models\empleadosController;
use App\Models\departamentoController;
use App\Http\Requests\PuestoCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PuestoControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['cantidad'] = DB::table('puesto')->count();
        $data['puesto'] = puestoController::all();
        return view('puesto.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('puesto.create');
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PuestoCreateRequest $request)
    {  
        $data = [];
        $data['message'] = 'El puesto se ha insertado correctamente.';
        $data['type'] = 'success';
        $puestoController = new puestoController($request->all());
        
        if($puestoController->minimo > $puestoController->maximo){
            $data['message'] = 'Error, no puede ingresar un minimo de sueldo mayor al maximo.';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        try {
            $result = $puestoController->save();
        } catch(Exception $e) {
            $result = false;
        }
        if(!$result) {
            $data['message'] = 'Error, el puesto no se ha insertado correctamente.';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        return redirect('puesto')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\puestoController  $puestoController
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $puestoController = puestoController::find($id);
        return view('puesto.show', ['puesto' => $puestoController]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\puestoController  $puestoController
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $puestoController = puestoController::find($id);
        $data['puesto'] = $puestoController;
        return view('puesto.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\puestoController  $puestoController
     * @return \Illuminate\Http\Response
     */
    public function update(PuestoCreateRequest $request, $id)
    {
        $data = [];
        
        
        $puestoController = puestoController::find($id);
        
         if($puestoController->minimo > $puestoController->maximo){
            $data['message'] = 'Error, no puede ingresar un minimo de sueldo mayor al maximo.';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        
        $data['message'] = 'El puesto ' . $puestoController->nombre . 'se ha actualizado correctamente.';
        $data['type'] = 'success';
        try {
            $result = $puestoController->update($request->all());
            
            //$place->fill($request->all());
            //$result = $place->save();
        } catch(Exception $e) {
            $result = false;
        }
        if(!$result) {
            $data['message'] = 'ERROR, el puesto no se ha podido actualizar.';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        return redirect('puesto')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\puestoController  $puestoController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    
    {  
        
        $puestoController = puestoController::find($id);
         
        $empleadosController = DB::table('empleado')->where("id_puesto", $id)->get();
       
        $isExist = departamentoController::select("*")->where("id_empleado_jefe", $empleadosController->id)->exists();
        
        if($isExist){
            DB::update('update departamento set id_empleado_jefe = null where id_empleado_jefe = :id', ['id' => $id]);
                    
                    //si es jefe de algun departamento realizo un update en la tabla departamento y actualizo el id_empleado_jefe a null
            
        }
        
        
        $data = [];
        $data['message'] = 'El puesto ' . $puestoController->nombre . ' ha sido borrado correctamente.';
        $data['type'] = 'success';
        try {
            $puestoController->delete();
        } catch(Exception $e) {
            $data['message'] = 'Error, el puesto ' . $puestoController->nombre . '  no ha sido borrado.';
            $data['type'] = 'danger';
        }
        return redirect('puesto')->with($data);
    }
}
