@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($tipoResolucion, ['route' => ['tipoResolucions.update', $tipoResolucion->id], 'method' => 'patch']) !!}

        @include('tipoResolucions.fields')

    {!! Form::close() !!}
</div>
@endsection
