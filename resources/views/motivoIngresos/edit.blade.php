@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($motivoIngreso, ['route' => ['motivoIngresos.update', $motivoIngreso->id], 'method' => 'patch']) !!}

        @include('motivoIngresos.fields')

    {!! Form::close() !!}
</div>
@endsection
