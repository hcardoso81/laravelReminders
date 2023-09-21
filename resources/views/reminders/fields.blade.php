<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', '*Descripción:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'required', 'rows' => 5]) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', '*Fecha:') !!}
    {!! Form::date('date', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time', '*Hora:') !!}
    {!! Form::time('time', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', '*Usuario:') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control custom-select']) !!}
</div>