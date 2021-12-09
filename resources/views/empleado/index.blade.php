@extends('admin.base')

@section('cuerpo')

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">¿Estás seguro de que quieres borrar al empleado <span id="deleteEmpleado"></span>?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">Pulsa el botón borrar para confirmar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <form id="modalDeleteEmpleadoForm" action="" method="post">
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
        <h1 style="color:black; margin-top: 20px">&#9758;&nbsp;EMPLEADOS</h1>
    
        <a class="btn btn-info" style="height: 38px;margin-top: 25px" href="{{ url('empleado/create') }}">Nuevo empleado</a>
    </div>
    
    @if (Session::has('message'))
        <div class="alert alert-{{ session()->get('type') }}" role="alert">
          {{ session()->get('message') }}
        </div>
    @endif
    
    @if($empleados->isEmpty())

        <div class="center-doesntexist">
            <div>No existe ningún empleado</div>
            <div>Prueba a crear uno nuevo <span><a style="text-decoration:none;" href="{{ url('empleado/create') }}">aquí</a></span></div>
        </div>

    @endif
    
    @if(!($empleados->isEmpty()))
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre del empleado</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody style="color: black">
                @foreach($empleados as $empleado)
                    <tr>
                        <td>
                            {{ $empleado->name }}
                        </td>
                        <td>
                            {{ $empleado->phone }}
                        </td>
                        <td>
                            <a class="linktablemio" href="{{ url('empleado/' . $empleado->id) }}">Mostrar</a>
                        </td>
                        <td>
                            <a class="linktablemio" href="{{ url('empleado/' . $empleado->id . '/edit') }}">Editar</a>
                        </td>
                        <td>
                            <a class="linktablemio" href="javascript: void(0);" data-name="{{ $empleado->name }}" data-url="{{ url('empleado/' . $empleado->id) }}" data-toggle="modal" data-target="#modalDelete">Borrar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
</div>

@endsection

@section('js')

    <script src="{{ url('assets/admin/js/deleteEmpleado.js') }}"></script>
    
@endsection