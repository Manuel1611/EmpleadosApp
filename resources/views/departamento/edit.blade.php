@extends('admin.base')

@section('cuerpo')

<div style="margin-left: 10%; width: 80%; height: 80%; display: flex; flex-direction: column;">
    
    <h1 style="color:black; margin-top: 20px; margin-bottom: 30px; text-transform: uppercase">Edita el departamento {{$departamento->name}}</h1>
    
    <form action="{{ url('departamento/' . $departamento->id) }}" method="post">
        @csrf
        @method('put')
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Nombre del departamento</span><br><br>
        <input class="form-control" style="margin-bottom: 25px" value="{{ old('name', $departamento->name) }}" type="text" name="name" autocomplete="off" placeholder="Nombre del departamento" min-length="2" max-length="100" required />
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Localización del departamento</span><br><br>
        <input class="form-control" style="margin-bottom: 25px" value="{{ old('location', $departamento->location) }}" type="text" autocomplete="off" name="location" placeholder="Localización" min-length="2" max-length="100" required />
        @error('location')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Empleado jefe</span><br><br>
        <select class="form-control" style="width: 300px; margin-bottom: 25px" name="idempleadojefe">
            <option @if($departamento->idempleadojefe == null) selected @endif value="">&nbsp;</option>
            @foreach($empleados as $empleado)
                @if($empleado->iddepartamento == $departamento->id || $empleado->iddepartamento == null)
                    <option @if($departamento->idempleadojefe != null) selected @endif value="{{ $empleado->id }}">{{ $empleado->name }}</option>
                @endif
            @endforeach
        </select>
        @error('idempleadojefe')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div style="margin-bottom: 50px">
            <input class="btn btn-primary" type="submit" value="Editar departamento"/>
            <a class="btn btn-info" href="{{ url('departamento') }}">Volver</a>
        </div>
    </form>
    
</div>

@endsection