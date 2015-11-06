<!--- Id Aplicacion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_aplicacion', 'Id Aplicacion:') !!}
    {!! Form::text('id_aplicacion', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Aplicacion Padre Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_aplicacion_padre', 'Id Aplicacion Padre:') !!}
    {!! Form::text('id_aplicacion_padre', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Opcion Menu Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_opcion_menu', 'Id Opcion Menu:') !!}
    {!! Form::text('id_opcion_menu', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Opcion Menu Padre Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_opcion_menu_padre', 'Id Opcion Menu Padre:') !!}
    {!! Form::text('id_opcion_menu_padre', null, ['class' => 'form-control']) !!}
</div>

<!--- Nombre Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!--- Direccion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!--- Orden Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('orden', 'Orden:') !!}
    {!! Form::text('orden', null, ['class' => 'form-control']) !!}
</div>

<!--- Imagen Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('imagen', 'Imagen:') !!}
    {!! Form::text('imagen', null, ['class' => 'form-control']) !!}
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
