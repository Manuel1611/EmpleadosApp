<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Http\Requests\DepartamentoCreateRequest;
use App\Http\Requests\DepartamentoEditRequest;
use DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['departamentos'] = Departamento::all();
        return view('departamento.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['empleados'] = Empleado::all();
        return view('departamento.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoCreateRequest $request)
    {
        $data = [];
        $data['message'] = 'Un nuevo departamento ha sido añadido correctamente';
        $data['type'] = 'success';
        $departamento = new Departamento($request->all());
        
        try {
            $result = $departamento->save();
        } catch(\Exception $e) {
            $data['message'] = 'El departamento no ha podido ser añadido porque ya existe uno con ese nombre';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        if(!$result) {
            $data['message'] = 'El departamento no puede ser añadido';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);  
        }
        
        $idempleadojefe = $departamento->idempleadojefe;
        $iddepartamento = $departamento->id;
        $empleados = Empleado::all();
        
        foreach($empleados as $empleado) {
            if($empleado->id == $idempleadojefe) {
                DB::table('empleado')->where("empleado.id", '=',  $idempleadojefe)
                    ->update(['empleado.iddepartamento' => $iddepartamento]);
            }
        }
        
        return redirect('departamento')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        $data = [];
        $data['departamento'] = $departamento;
        $data['empleados'] = Empleado::all();
        return view('departamento.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        $data = [];
        $data['departamento'] = $departamento;
        $data['empleados'] = Empleado::all();
        return view('departamento.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentoEditRequest $request, Departamento $departamento)
    {
        $data = [];
        $data['message'] = 'El departamento ' . $departamento->name . ' se ha actualizado correctamente';
        $data['type'] = 'success';
        
        try {
            $result = $departamento->update($request->all());  
        } catch(\Exception $e) {
            $result = false;
        }
        if(!$result) {
            $data['message'] = 'El departamento no puede ser actualizado';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);  
        }
        
        $idempleadojefe = $departamento->idempleadojefe;
        $iddepartamento = $departamento->id;
        
        $empleados = Empleado::all();
        
        foreach($empleados as $empleado) {
            if($empleado->id == $idempleadojefe) {
                DB::table('empleado')->where("empleado.id", '=',  $idempleadojefe)
                    ->update(['empleado.iddepartamento' => $iddepartamento]);
            }
        }
        
        return redirect('departamento')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        $data = [];
        $data['message'] = 'El departamento ' . $departamento->name . ' ha sido eliminado';
        $data['type'] = 'success';
        
        $empleados = Empleado::all();
        $id = $departamento->id;
        
        foreach($empleados as $empleado) {
            if($empleado->iddepartamento == $departamento->id) {
                DB::table('empleado')->where("empleado.iddepartamento", '=',  $id)
                    ->update(['empleado.iddepartamento' => null]);
            }
        }
        
        try {
            $departamento->delete();
        } catch(\Exception $e) {
            $data['message'] = 'El departamento ' . $departamento->name . ' no ha podido ser eliminado';
            $data['type'] = 'danger';
        }
        return redirect('departamento')->with($data);
    }
}