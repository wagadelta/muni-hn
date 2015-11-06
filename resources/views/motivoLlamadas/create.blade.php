@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'motivoLlamadas.store']) !!}

        @include('motivoLlamadas.fields')

    {!! Form::close() !!}
</div>
@endsection
