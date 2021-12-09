@extends('admin.base')

@section('cuerpo')

<div style="margin-left: 10%; width: 80%; height: 80%; display: flex; flex-direction: column;">

    <h1 style="color:black; margin-top: 20px; margin-bottom: 30px; text-transform: uppercase">Añade un departamento nuevo</h1>

    <form action="{{ url('departamento') }}" method="post">
        @csrf
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Nombre del departamento</span><br><br>
        <input class="form-control" value="{{ old('name') }}" type="text" name="name" autocomplete="off" placeholder="Nombre del departamento" min-length="2" max-length="100" required /><br>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Localización del departamento</span><br><br>
        <input class="form-control" value="{{ old('location') }}" type="text" autocomplete="off" name="location" placeholder="Localización" min-length="2" max-length="100" required /><br>
        @error('location')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Empleado jefe</span><br><br>
        <select class="form-control" style="width: 300px; margin-bottom: 25px" name="idempleadojefe">
            <option selected value="">&nbsp;</option>
            @foreach($empleados as $empleado)
                @if($empleado->iddepartamento == null)
                    <option value="{{ $empleado->id }}">{{ $empleado->name }}</option>
                @endif
            @endforeach
        </select>
        @error('idempleadojefe')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div style="margin-bottom: 50px">
            <input class="btn btn-primary" type="submit" value="Añadir departamento"/>
            <a class="btn btn-info" href="{{ url('departamento') }}">Volver</a>
        </div>
    </form>

</div>

@endsection