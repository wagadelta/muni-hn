@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">tipoPersonas</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tipoPersonas.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($tipoPersonas->isEmpty())
                <div class="well text-center">No tipoPersonas found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Activo</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($tipoPersonas as $tipoPersona)
                        <tr>
                            <td>{!! $tipoPersona->nombre !!}</td>
					<td>{!! $tipoPersona->activo !!}</td>
                            <td>
                                <a href="{!! route('tipoPersonas.edit', [$tipoPersona->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('tipoPersonas.delete', [$tipoPersona->id]) !!}" onclick="return confirm('Are you sure wants to delete this tipoPersona?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection