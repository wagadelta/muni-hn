@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">motivoIngresos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('motivoIngresos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($motivoIngresos->isEmpty())
                <div class="well text-center">No motivoIngresos found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Activo</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($motivoIngresos as $motivoIngreso)
                        <tr>
                            <td>{!! $motivoIngreso->nombre !!}</td>
					<td>{!! $motivoIngreso->activo !!}</td>
                            <td>
                                <a href="{!! route('motivoIngresos.edit', [$motivoIngreso->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('motivoIngresos.delete', [$motivoIngreso->id]) !!}" onclick="return confirm('Are you sure wants to delete this motivoIngreso?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection