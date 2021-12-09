@extends('admin.base')

@section('cuerpo')

<div style="margin-left: 10%; width: 80%; height: 80%; display: flex; flex-direction: column;">
    
    <h1 style="color:black; margin-top: 20px; margin-bottom: 30px; text-transform: uppercase">Añade un empleado nuevo</h1>
    
    <form action="{{ url('empleado') }}" method="post">
        @csrf
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Nombre del empleado</span><br><br>
        <input class="form-control" value="{{ old('name') }}" type="text" name="name" autocomplete="off" placeholder="Nombre del empleado" min-length="2" max-length="50" required /><br>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Apellidos del empleado</span><br><br>
        <input class="form-control" value="{{ old('surname') }}" type="text" autocomplete="off" name="surname" placeholder="Apellidos" min-length="2" max-length="100" required /><br>
        @error('surname')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Correo electrónico del empleado</span><br><br>
        <input class="form-control" value="{{ old('email') }}" type="email" autocomplete="off" name="email" placeholder="Correo electrónico" min-length="2" max-length="120" required /><br>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Teléfono del empleado</span><br><br>
        <input class="form-control" value="{{ old('phone') }}" type="number" name="phone" placeholder="Teléfono" min="600000000" max="999999999" step="1" required /><br>
        @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Fecha de contratación</span><br><br>
        <input class="form-control" style="width: 300px;" value="{{ old('datecontract') }}" type="date" name="datecontract" required /><br>
        @error('datecontract')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Departamento asociado</span><br><br>
        <select class="form-control" style="width: 300px; margin-bottom: 25px" style="width: 300px; margin-bottom: 25px" name="iddepartamento">
            <option selected value="">&nbsp;</option>
            @foreach($departamentos as $departamento)
                <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
            @endforeach
        </select>
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Puesto asociado</span><br><br>
        <select class="form-control" style="width: 300px;" name="idpuesto">
            <option selected value="">&nbsp;</option>
            @foreach($puestos as $puesto)
                <option value="{{ $puesto->id }}">{{ $puesto->name }}</option>
            @endforeach
        </select><br>
        <label style="margin-bottom: 25px">
            &nbsp;<input type="checkbox" name="idempleadojefe" />&nbsp;&nbsp;Ser jefe del departamento
        </label><br>

        <div style="margin-bottom: 50px">
            <input class="btn btn-primary" type="submit" value="Añadir empleado"/>
            <a class="btn btn-info" href="{{ url('empleado') }}">Volver</a>
        </div>
    </form>
    
</div>

@endsection