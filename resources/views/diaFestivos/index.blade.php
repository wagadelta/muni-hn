@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">DiaFestivos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('diaFestivos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($diaFestivos->isEmpty())
                <div class="well text-center">No DiaFestivos found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Usuario Ingresa</th>
			<th>Fecha Ingresa</th>
			<th>Descripcion</th>
			<th>Activo</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($diaFestivos as $diaFestivo)
                        <tr>
                            <td>{!! $diaFestivo->usuario_ingresa !!}</td>
					<td>{!! $diaFestivo->fecha_ingresa !!}</td>
					<td>{!! $diaFestivo->descripcion !!}</td>
					<td>{!! $diaFestivo->activo !!}</td>
                            <td>
                                <a href="{!! route('diaFestivos.edit', [$diaFestivo->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('diaFestivos.delete', [$diaFestivo->id]) !!}" onclick="return confirm('Are you sure wants to delete this DiaFestivo?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection