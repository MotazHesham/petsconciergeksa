@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.contact.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                    <thead>
                        <tr>

                            <th>
                                {{ trans('cruds.contact.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.contact.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.contact.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.contact.fields.subject') }}
                            </th>
                            <th>
                                {{ trans('cruds.contact.fields.message') }}
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $key => $permission)
                            <tr data-entry-id="{{ $permission->id }}">

                                <td>
                                    {{ $permission->id ?? '' }}
                                </td>
                                <td>
                                    {{ $permission->name ?? '' }}
                                </td>
                                <td>
                                    {{ $permission->email ?? '' }}
                                </td>
                                <td>
                                    {{ $permission->subject ?? '' }}
                                </td>
                                <td>
                                    {{ $permission->message ?? '' }}
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
