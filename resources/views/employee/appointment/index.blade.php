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
                                {{ trans('cruds.clients.fields.phone') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.date') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.petname') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.package') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.price') }}
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
                                    <a href="https://www.google.com/maps/?q={{$appointment->client->lat}},{{$appointment->client->lng}}" target="_blank">{{$appointment->client->address}}</a>
                                </td>
                                <td>
                                    {{ $appointment->client->phone ?? '' }}
                                </td>
                                <td>
                                    {{ $appointment->date ?? '' }}
                                </td>
                                <td>
                                    {{ $appointment->pet->name ?? '' }} 
                                    <br>
                                    <span class="badge badge-danger"> AGE : {{ $appointment->pet->age ?? '' }}</span>
                                    <span class="badge badge-success"> Type : {{ $appointment->pet->category->name ?? '' }}</span>
                                    <span class="badge badge-warning">{{ $appointment->size ?? '' }}</span>
                                    <br>
                                    @if($appointment->additional_info)({{ $appointment->additional_info }}) @endif
                                </td>
                                <td>
                                    {{ $appointment->package->name ?? '' }}
                                    <br> 
                                    @if($appointment->addon_id != null) 
                                        @foreach(json_decode($appointment->addon_id) as $id)
                                            @php
                                                $addon = \App\Models\Addons::find($id);
                                                $addon_name = $addon ? $addon->name : '';
                                            @endphp
                                            <small class="badge badge-dark">{{ $addon_name }}</small> <br>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    {{ $appointment->price }}
                                    @if($appointment->is_it_loyalty_appoint)
                                    <br>
                                        <span class="badge badge-danger">it's loyalty Card</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($appointment->status == 0)
                                        {{ trans('cruds.appointment.fields.active') }}
                                    @elseif($appointment->status == 1)
                                        {{ trans('cruds.appointment.fields.assigned') }}
                                    @else
                                        {{ trans('cruds.appointment.fields.done') }}
                                    @endif
                                    <br>
                                    <b>{{ $appointment->employee->name ?? ''  }}</b>
                                    
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
