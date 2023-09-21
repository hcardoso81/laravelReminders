@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>
                    Crear Recordatorio
                </h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3 d-flex justify-content-center">

    <div class="card w-75">
        @include('adminlte-templates::common.errors')

        {!! Form::open(['route' => 'reminders.store', 'novalidate']) !!}

        <div class="card-body">

            <div class="row">
                @include('reminders.fields')
            </div>

        </div>

        <div class="card-footer d-flex justify-content-center">
            {!! Form::submit('Save', ['class' => 'btn btn-primary m-2']) !!}
            <a href="{{ route('reminders.index') }}" class="btn btn-default m-2"> Cancel </a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection