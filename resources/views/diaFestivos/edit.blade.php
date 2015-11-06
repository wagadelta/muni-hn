@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($diaFestivo, ['route' => ['diaFestivos.update', $diaFestivo->id], 'method' => 'patch']) !!}

        @include('diaFestivos.fields')

    {!! Form::close() !!}
</div>
@endsection
