@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'tipoPersonas.store']) !!}

        @include('tipoPersonas.fields')

    {!! Form::close() !!}
</div>
@endsection
