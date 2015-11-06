@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Aplications</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('aplications.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($aplications->isEmpty())
                <div class="well text-center">No Aplications found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Activo</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($aplications as $aplication)
                        <tr>
                            <td>{!! $aplication->nombre !!}</td>
					<td>{!! $aplication->activo !!}</td>
                            <td>
                                <a href="{!! route('aplications.edit', [$aplication->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('aplications.delete', [$aplication->id]) !!}" onclick="return confirm('Are you sure wants to delete this Aplication?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection