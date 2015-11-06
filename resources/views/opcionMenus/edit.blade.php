@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($opcionMenu, ['route' => ['opcionMenus.update', $opcionMenu->id], 'method' => 'patch']) !!}

        @include('opcionMenus.fields')

    {!! Form::close() !!}
</div>
@endsection
