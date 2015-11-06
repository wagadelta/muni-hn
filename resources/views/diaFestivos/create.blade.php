@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'diaFestivos.store']) !!}

        @include('diaFestivos.fields')

    {!! Form::close() !!}
</div>
@endsection
