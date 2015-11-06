@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($aplication, ['route' => ['aplications.update', $aplication->id], 'method' => 'patch']) !!}

        @include('aplications.fields')

    {!! Form::close() !!}
</div>
@endsection
