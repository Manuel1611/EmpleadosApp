@extends('admin.base')

@section('cuerpo')

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">¿Estás seguro de que quieres borrar al empleado {{$empleado->name}}?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">Pulsa el botón borrar para confirmar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <form id="modalDeleteEmpleadoForm" action="{{ url('empleado/' . $empleado->id) }}" method="post">
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
        <h1 style="color:black; margin-top: 20px; margin-bottom: 30px; text-transform: uppercase">Empleado {{$empleado->name}}</h1>
        <div style="margin-top: 30px">
            <a class="btn btn-primary" href="{{url('empleado/' . $empleado->id . '/edit')}}">Editar empleado</a>
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
                <td>Nombre del empleado</td>
                <td>{{ $empleado->name }}</td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td>{{ $empleado->surname }}</td>
            </tr>
            <tr>
                <td>Correo</td>
                <td>{{ $empleado->email }}</td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td>{{ $empleado->phone }}</td>
            </tr>
            <tr>
                <td>Fecha de contratación</td>
                <td>{{ \Carbon\Carbon::parse($empleado->datecontract)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td>Departamento</td>
                @if($empleado->iddepartamento != null)
                    @foreach($departamentos as $departamento)
                        @if($departamento->id == $empleado->iddepartamento)
                            <td>{{ $departamento->name }}</td>
                        @endif
                    @endforeach
                @endif
                @if($empleado->iddepartamento == null)
                    <td>No hay ningún departamento asociado</td>
                @endif
            </tr>
            <tr>
                <td>Puesto</td>
                @if($empleado->idpuesto != null)
                    @foreach($puestos as $puesto)
                        @if($puesto->id == $empleado->idpuesto)
                            <td>{{ $puesto->name }}</td>
                        @endif
                    @endforeach
                @endif
                @if($empleado->idpuesto == null)
                    <td>No hay ningún puesto asociado</td>
                @endif
            </tr>
        </tbody>
    </table>
    
    <a class="btn btn-info" style="width: 80px" href="{{ url('empleado') }}">Volver</a>
    
</div>

@endsection