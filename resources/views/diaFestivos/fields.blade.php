<!--- Usuario Ingresa Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('usuario_ingresa', 'Usuario Ingresa:') !!}
    {!! Form::text('usuario_ingresa', null, ['class' => 'form-control']) !!}
</div>

<!--- Fecha Ingresa Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('fecha_ingresa', 'Fecha Ingresa:') !!}
    {!! Form::text('fecha_ingresa', null, ['class' => 'form-control']) !!}
</div>

<!--- Descripcion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!--- Activo Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('activo', 'Activo:') !!}
    {!! Form::text('activo', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
