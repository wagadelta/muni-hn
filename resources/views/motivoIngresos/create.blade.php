@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'motivoIngresos.store']) !!}

        @include('motivoIngresos.fields')

    {!! Form::close() !!}
</div>
@endsection
