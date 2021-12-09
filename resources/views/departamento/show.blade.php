@extends('admin.base')

@section('cuerpo')

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">¿Estás seguro de que quieres borrar el departamento {{$departamento->name}}?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">Pulsa el botón borrar para confirmar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <form id="modalDeleteDepartamentoForm" action="{{ url('departamento/' . $departamento->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Borrar"/>
                    </form>
                </div>
            </div>
        </div>
</div>

<div style="margin-left: 10%; width: 80%; height: 80%; display: flex; flex-direction: column;">
    
    <div style="display:flex; justify-content: space-between; margin-bottom: 20px">
        <h1 style="color:black; margin-top: 20px; margin-bottom: 30px; text-transform: uppercase">Departamento {{$departamento->name}}</h1>
        <div style="margin-top: 30px">
            <a class="btn btn-primary" href="{{url('departamento/' . $departamento->id . '/edit')}}">Editar departamento</a>
            <a class="btn btn-danger" href="javascript: void(0);" data-toggle="modal" data-target="#modalDelete">Borrar</a>
        </div>
    </div>
    
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Atributos</th>
                <th scope="col">Valor</th>
            </tr>
        </thead>
        <tbody style="color: black">
            <tr>
                <td>Nombre del departamento</td>
                <td>{{ $departamento->name }}</td>
            </tr>
            <tr>
                <td>Localización</td>
                <td>{{ $departamento->location }}</td>
            </tr>
            <tr>
                <td>Empleado jefe</td>
                @if($departamento->idempleadojefe != null)
                    @foreach($empleados as $empleado)
                        @if($empleado->id == $departamento->idempleadojefe)
                            <td>{{ $empleado->name }}</td>
                        @endif
                    @endforeach
                @endif
                @if($departamento->idempleadojefe == null)
                    <td>No hay empleado jefe</td>
                @endif
            </tr>
        </tbody>
    </table>
    
    <a class="btn btn-info" style="width: 80px" href="{{ url('departamento') }}">Volver</a>
    
</div>

@endsection