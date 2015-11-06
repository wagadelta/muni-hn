@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">motivoLlamadas</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('motivoLlamadas.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($motivoLlamadas->isEmpty())
                <div class="well text-center">No motivoLlamadas found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Activo</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($motivoLlamadas as $motivoLlamada)
                        <tr>
                            <td>{!! $motivoLlamada->nombre !!}</td>
					<td>{!! $motivoLlamada->activo !!}</td>
                            <td>
                                <a href="{!! route('motivoLlamadas.edit', [$motivoLlamada->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('motivoLlamadas.delete', [$motivoLlamada->id]) !!}" onclick="return confirm('Are you sure wants to delete this motivoLlamada?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection