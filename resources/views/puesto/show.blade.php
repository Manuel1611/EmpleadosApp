@extends('admin.base')

@section('cuerpo')

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">¿Estás seguro de que quieres borrar el puesto {{$puesto->name}}?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">Pulsa el botón borrar para confirmar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <form id="modalDeletePuestoForm" action="{{ url('puesto/' . $puesto->id) }}" method="post">
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
        <h1 style="color:black; margin-top: 20px; margin-bottom: 30px; text-transform: uppercase">Puesto {{$puesto->name}}</h1>
        <div style="margin-top: 30px">
            <a class="btn btn-primary" href="{{url('puesto/' . $puesto->id . '/edit')}}">Editar puesto</a>
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
                <td>Nombre del puesto</td>
                <td>{{ $puesto->name }}</td>
            </tr>
            <tr>
                <td>Salario mínimo</td>
                <td>{{ $puesto->minsal }} €</td>
            </tr>
            <tr>
                <td>Salario máximo</td>
                <td>{{ $puesto->maxsal }} €</td>
            </tr>
        </tbody>
    </table>
    
    <a class="btn btn-info" style="width: 80px" href="{{ url('puesto') }}">Volver</a>
    
</div>

@endsection