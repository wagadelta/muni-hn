@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">opcionMenus</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('opcionMenus.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($opcionMenus->isEmpty())
                <div class="well text-center">No opcionMenus found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Id Aplicacion</th>
			<th>Id Aplicacion Padre</th>
			<th>Id Opcion Menu</th>
			<th>Id Opcion Menu Padre</th>
			<th>Nombre</th>
			<th>Direccion</th>
			<th>Orden</th>
			<th>Imagen</th>
			<th>Activo</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($opcionMenus as $opcionMenu)
                        <tr>
                            <td>{!! $opcionMenu->id_aplicacion !!}</td>
					<td>{!! $opcionMenu->id_aplicacion_padre !!}</td>
					<td>{!! $opcionMenu->id_opcion_menu !!}</td>
					<td>{!! $opcionMenu->id_opcion_menu_padre !!}</td>
					<td>{!! $opcionMenu->nombre !!}</td>
					<td>{!! $opcionMenu->direccion !!}</td>
					<td>{!! $opcionMenu->orden !!}</td>
					<td>{!! $opcionMenu->imagen !!}</td>
					<td>{!! $opcionMenu->activo !!}</td>
                            <td>
                                <a href="{!! route('opcionMenus.edit', [$opcionMenu->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('opcionMenus.delete', [$opcionMenu->id]) !!}" onclick="return confirm('Are you sure wants to delete this opcionMenu?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection