@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'aplications.store']) !!}

        @include('aplications.fields')

    {!! Form::close() !!}
</div>
@endsection
