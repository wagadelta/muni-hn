@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'tipoResolucions.store']) !!}

        @include('tipoResolucions.fields')

    {!! Form::close() !!}
</div>
@endsection
