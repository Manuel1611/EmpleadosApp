@extends('admin.base')

@section('cuerpo')

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">¿Estás seguro de que quieres borrar el puesto <span id="deletePuesto"></span>?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">Pulsa el botón borrar para confirmar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <form id="modalDeletePuestoForm" action="" method="post">
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
        <h1 style="color:black; margin-top: 20px">&#9758;&nbsp;PUESTOS</h1>
    
        <a class="btn btn-info" style="height: 38px;margin-top: 25px" href="{{ url('puesto/create') }}">Nuevo puesto</a>
    </div>

    @if (Session::has('message'))
        <div class="alert alert-{{ session()->get('type') }}" role="alert">
          {{ session()->get('message') }}
        </div>
    @endif

    @if($puestos->isEmpty())

        <div class="center-doesntexist">
            <div>No existe ningún puesto</div>
            <div>Prueba a crear uno nuevo <span><a style="text-decoration:none;" href="{{ url('puesto/create') }}">aquí</a></span></div>
        </div>

    @endif

    @if(!($puestos->isEmpty()))
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre del puesto</th>
                    <th scope="col">Salario mínimo</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody style="color: black">
                @foreach($puestos as $puesto)
                    <tr>
                        <td>
                            {{ $puesto->name }}
                        </td>
                        <td>
                            {{ $puesto->minsal }} €
                        </td>
                        <td>
                            <a class="linktablemio" href="{{ url('puesto/' . $puesto->id) }}">Mostrar</a>
                        </td>
                        <td>
                            <a class="linktablemio" href="{{ url('puesto/' . $puesto->id . '/edit') }}">Editar</a>
                        </td>
                        <td>
                            
                            <a class="linktablemio" href="javascript: void(0);" data-name="{{ $puesto->name }}" data-url="{{ url('puesto/' . $puesto->id) }}" data-toggle="modal" data-target="#modalDelete">Borrar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
</div>

@endsection

@section('js')

    <script src="{{ url('assets/admin/js/deletePuesto.js') }}"></script>
    
@endsection