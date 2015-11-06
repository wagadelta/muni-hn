@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">usuarioRols</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('usuarioRols.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($usuarioRols->isEmpty())
                <div class="well text-center">No usuarioRols found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Id Usuario</th>
			<th>Id Aplicacion</th>
			<th>Id Rol</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($usuarioRols as $usuarioRol)
                        <tr>
                            <td>{!! $usuarioRol->id_usuario !!}</td>
					<td>{!! $usuarioRol->id_aplicacion !!}</td>
					<td>{!! $usuarioRol->id_rol !!}</td>
                            <td>
                                <a href="{!! route('usuarioRols.edit', [$usuarioRol->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('usuarioRols.delete', [$usuarioRol->id]) !!}" onclick="return confirm('Are you sure wants to delete this usuarioRol?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection