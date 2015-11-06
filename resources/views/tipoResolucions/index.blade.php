@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">tipoResolucions</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tipoResolucions.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($tipoResolucions->isEmpty())
                <div class="well text-center">No tipoResolucions found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Activo</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($tipoResolucions as $tipoResolucion)
                        <tr>
                            <td>{!! $tipoResolucion->nombre !!}</td>
					<td>{!! $tipoResolucion->activo !!}</td>
                            <td>
                                <a href="{!! route('tipoResolucions.edit', [$tipoResolucion->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('tipoResolucions.delete', [$tipoResolucion->id]) !!}" onclick="return confirm('Are you sure wants to delete this tipoResolucion?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection