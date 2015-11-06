@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($usuarioRol, ['route' => ['usuarioRols.update', $usuarioRol->id], 'method' => 'patch']) !!}

        @include('usuarioRols.fields')

    {!! Form::close() !!}
</div>
@endsection
