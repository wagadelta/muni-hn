@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'usuarioRols.store']) !!}

        @include('usuarioRols.fields')

    {!! Form::close() !!}
</div>
@endsection
