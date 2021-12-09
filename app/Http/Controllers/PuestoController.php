<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\PuestoCreateRequest;
use App\Http\Requests\PuestoEditRequest;
use DB;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['puestos'] = Puesto::all();
        return view('puesto.index', $data);
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
        $data['message'] = 'Un nuevo puesto se ha añadido correctamente';
        $data['type'] = 'success';
        $puesto = new Puesto($request->all());
        
        if($puesto->maxsal < $puesto->minsal) {
            $data['message'] = 'El puesto no se ha añadido porque el salario máximo no puede ser inferior al mínimo';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        
        try {
            $result = $puesto->save();   
        } catch(\Exception $e) {
            return back()->withInput();
        }
        if(!$result) {
            $data['message'] = 'El puesto no puede ser añadido';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);  
        }
        return redirect('puesto')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function show(Puesto $puesto)
    {
        $data = [];
        $data['puesto'] = $puesto;
        return view('puesto.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Puesto $puesto)
    {
        $data = [];
        $data['puesto'] = $puesto;
        return view('puesto.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(PuestoEditRequest $request, Puesto $puesto)
    {
        $data = [];
        $data['message'] = 'El puesto ' . $puesto->name . ' se ha actualizado correctamente';
        $data['type'] = 'success';
        
        if($request->maxsal < $request->minsal) {
            $data['message'] = 'El puesto no se ha editado porque el salario máximo no puede ser inferior al mínimo';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        
        try {
            $result = $puesto->update($request->all());  
        } catch(\Exception $e) {
            $result = false;
        }
        if(!$result) {
            $data['message'] = 'El puesto no puede ser actualizado';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);  
        }
        return redirect('puesto')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puesto $puesto)
    {
        $data = [];
        $data['message'] = 'El puesto ' . $puesto->name . ' ha sido eliminado';
        $data['type'] = 'success';
        
        $empleados = Empleado::all();
        $id = $puesto->id;
        
        foreach($empleados as $empleado) {
            if($empleado->idpuesto == $puesto->id) {
                DB::table('empleado')->where("empleado.idpuesto", '=',  $id)
                    ->update(['empleado.idpuesto' => null]);
            }
        }
        
        try {
            $puesto->delete();
        } catch(\Exception $e) {
            $data['message'] = 'El puesto ' . $puesto->name . ' no ha podido ser eliminado';
            $data['type'] = 'danger';
        }
        return redirect('puesto')->with($data);
    }
}
