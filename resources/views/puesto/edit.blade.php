@extends('admin.base')

@section('cuerpo')

<div style="margin-left: 10%; width: 80%; height: 80%; display: flex; flex-direction: column;">
    
    <h1 style="color:black; margin-top: 20px; margin-bottom: 30px; text-transform: uppercase">Edita el puesto {{$puesto->name}}</h1>
    
    @if (Session::has('message'))
        <div class="alert alert-{{ session()->get('type') }}" role="alert">
          {{ session()->get('message') }}
        </div>
    @endif
    
    <form action="{{ url('puesto/' . $puesto->id) }}" method="post">
        @csrf
        @method('put')
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Nombre del puesto</span><br><br>
        <input class="form-control" style="margin-bottom: 25px" value="{{ old('name', $puesto->name) }}" type="text" name="name" autocomplete="off" placeholder="Nombre del puesto" min-length="2" max-length="100" required />
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Salario mínimo</span><br><br>
        <input class="form-control" style="margin-bottom: 25px" value="{{ old('minsal', $puesto->minsal) }}" type="number" name="minsal" placeholder="Salario mínimo" min="965" step="1" required />
        @error('minsal')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        &nbsp;<span style="font-size: 1.6em; color: blue">&raquo;</span>&nbsp;<span class="spanmio">Salario máximo</span><br><br>
        <input class="form-control" style="margin-bottom: 25px" value="{{ old('maxsal', $puesto->maxsal) }}" type="number" name="maxsal" placeholder="Salario máximo" min="965" step="1" required />
        @error('maxsal')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        <div style="margin-bottom: 50px">
            <input class="btn btn-primary" type="submit" value="Editar puesto"/>
            <a class="btn btn-info" href="{{ url('puesto') }}">Volver</a>
        </div>
    </form>
    
</div>

@endsection