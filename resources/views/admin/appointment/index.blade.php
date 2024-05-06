@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.appointment.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.appointment.title_singular') }}
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.appointment.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Permission">
                    <thead>
                        <tr>  
                            <th>
                                {{ trans('cruds.appointment.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.clients.fields.phone') }}
                            </th> 
                            <th>
                                {{ trans('cruds.appointment.fields.date') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.status') }}
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

                            </th>

                        </tr>
                    </thead> 
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

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.appointment.index') }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'client_name',
                        name: 'client.name'
                    },
                    {
                        data: 'client_phone',
                        name: 'client.phone'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'pet_name',
                        name: 'pet.name'
                    },
                    {
                        data: 'package_name',
                        name: 'package.name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'actions',
                        name: '{{ trans('global.actions') }}'
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            };
            let table = $('.datatable-Permission').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
