@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($motivoLlamada, ['route' => ['motivoLlamadas.update', $motivoLlamada->id], 'method' => 'patch']) !!}

        @include('motivoLlamadas.fields')

    {!! Form::close() !!}
</div>
@endsection
