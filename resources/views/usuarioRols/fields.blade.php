<!--- Id Usuario Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_usuario', 'Id Usuario:') !!}
    {!! Form::text('id_usuario', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Aplicacion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_aplicacion', 'Id Aplicacion:') !!}
    {!! Form::text('id_aplicacion', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Rol Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_rol', 'Id Rol:') !!}
    {!! Form::text('id_rol', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
