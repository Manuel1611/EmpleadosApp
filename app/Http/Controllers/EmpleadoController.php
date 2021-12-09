<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use App\Models\Puesto;
use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoCreateRequest;
use App\Http\Requests\EmpleadoEditRequest;
use DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['empleados'] = Empleado::all();
        return view('empleado.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['departamentos'] = Departamento::all();
        $data['puestos'] = Puesto::all();
        return view('empleado.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoCreateRequest $request)
    {
        $data = [];
        $data['message'] = 'Un nuevo empleado ha sido añadido correctamente';
        $data['type'] = 'success';
        $empleado = new Empleado($request->all());
        
        try {
            $result = $empleado->save();
        } catch(\Exception $e) {
            dd($e);
            $data['message'] = 'El empleado no ha podido ser añadido porque ya existe uno con ese correo o teléfono';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        if(!$result) {
            $data['message'] = 'El empleado no puede ser añadido';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);  
        }
        
        if($request->has('idempleadojefe')) {
            $departamentos = Departamento::all();
            $id = $empleado->iddepartamento;
            $idjefe = $empleado->id;
        
            foreach($departamentos as $departamento) {
                if($departamento->id == $empleado->iddepartamento) {
                    DB::table('departamento')->where("departamento.id", '=',  $id)
                        ->update(['departamento.idempleadojefe' => $idjefe]);
                }
            }
        }
        
        return redirect('empleado')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        $data = [];
        $data['departamentos'] = Departamento::all();
        $data['puestos'] = Puesto::all();
        $data['empleado'] = $empleado;
        return view('empleado.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $data = [];
        $data['departamentos'] = Departamento::all();
        $data['puestos'] = Puesto::all();
        $data['empleado'] = $empleado;
        return view('empleado.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoEditRequest $request, Empleado $empleado)
    {
        $data = [];
        $data['message'] = 'El empleado ' . $empleado->name . ' se ha actualizado correctamente';
        $data['type'] = 'success';
        try {
            $result = $empleado->update($request->all());  
        } catch(\Exception $e) {
            $result = false;
        }
        if(!$result) {
            $data['message'] = 'El empleado no puede ser actualizado';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);  
        }
        
        $departamentos = Departamento::all();
        
        foreach($departamentos as $departamento) {
            $id = $empleado->id;
            if($departamento->id != $empleado->iddepartamento) {
                if($departamento->idempleadojefe == $empleado->id) {
                    DB::table('departamento')->where("departamento.idempleadojefe", '=',  $id)
                        ->update(['departamento.idempleadojefe' => null]);
                }   
            }
        }
        
        $id = $empleado->iddepartamento;
        $idjefe = $empleado->id;
        if($request->has('idempleadojefe')) {
        
            foreach($departamentos as $departamento) {
                if($departamento->id == $empleado->iddepartamento) {
                    DB::table('departamento')->where("departamento.id", '=',  $id)
                        ->update(['departamento.idempleadojefe' => $idjefe]);
                }
            }
        } else {
            DB::table('departamento')->where("departamento.id", '=',  $id)
                ->update(['departamento.idempleadojefe' => null]);
        }
        
        return redirect('empleado')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $data = [];
        $data['message'] = 'El empleado ' . $empleado->name . ' ha sido eliminado';
        $data['type'] = 'success';
        
        $departamentos = Departamento::all();
        $id = $empleado->id;
        
        foreach($departamentos as $departamento) {
            if($departamento->idempleadojefe == $empleado->id) {
                DB::table('departamento')->where("departamento.idempleadojefe", '=',  $id)
                    ->update(['departamento.idempleadojefe' => null]);
            }
        }
        
        try {
            $empleado->delete();
        } catch(\Exception $e) {
            $data['message'] = 'El empleado ' . $empleado->name . ' no ha podido ser eliminado';
            $data['type'] = 'danger';
        }
        return redirect('empleado')->with($data);
    }
}
