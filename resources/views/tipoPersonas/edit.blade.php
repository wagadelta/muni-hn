@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($tipoPersona, ['route' => ['tipoPersonas.update', $tipoPersona->id], 'method' => 'patch']) !!}

        @include('tipoPersonas.fields')

    {!! Form::close() !!}
</div>
@endsection
