@extends('employee.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.appointment.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                    <thead>
                        <tr>

                            <th>
                                {{ trans('cruds.appointment.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.address') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.date') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.petname') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.status') }}
                            </th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr data-entry-id="{{ $appointment->id }}">

                                <td>
                                    {{ $appointment->id ?? '' }}
                                </td>
                                <td>
                                    {{ $appointment->client->name ?? '' }}
                                </td>
                                <td>
                                    {{ $appointment->client->email ?? '' }}
                                </td>
                                <td>
                                    {{ $appointment->client->address ?? '' }}
                                </td>
                                <td>
                                    {{ $appointment->date ?? '' }}
                                </td>
                                <td>
                                    {{ $appointment->pet->name ?? '' }}
                                    <br>
                                    ({{ $appointment->additional_info }})
                                </td>

                                <td>
                                    @if ($appointment->status == 0)
                                        {{ trans('cruds.appointment.fields.active') }}
                                    @elseif($appointment->status == 1)
                                        {{ trans('cruds.appointment.fields.assigned') }}
                                    @else
                                        {{ trans('cruds.appointment.fields.done') }}
                                    @endif
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) 
            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [0, 'desc']
                ],
                pageLength: 10,
            });
            let table = $('.datatable-Permission:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
