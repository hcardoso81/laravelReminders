<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="reminders-table">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Usuario</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reminders as $reminder)
                <tr>
                    <td>{{ $reminder->description }}</td>
                    <td>{{ $reminder->date }}</td>
                    <td>{{ $reminder->time }}</td>
                    <td>{{ $reminder->user->name }}</td>
                    <td style="width: 120px">
                        {!! Form::open(['route' => ['reminders.destroy', $reminder->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('reminders.show', [$reminder->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('reminders.edit', [$reminder->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn
                            btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $reminders])
        </div>
    </div>
</div>