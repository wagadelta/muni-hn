@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'opcionMenus.store']) !!}

        @include('opcionMenus.fields')

    {!! Form::close() !!}
</div>
@endsection
