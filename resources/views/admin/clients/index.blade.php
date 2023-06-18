@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.clients.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                    <thead>
                        <tr>

                            <th>
                                {{ trans('cruds.permission.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.clients.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.clients.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.clients.fields.phone') }}
                            </th>
                            <th>
                                {{ trans('cruds.clients.fields.address') }}
                            </th>
                            <th>
                                {{ trans('cruds.clients.fields.active') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $key => $permission)
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
                                    {{ $permission->phone ?? '' }}
                                </td>
                                <td>
                                    @if ($permission->lat && $permission->lng)
                                        <a href="https://www.google.com/maps/?q={{ $permission->lat }},{{ $permission->lng }}"
                                            target="_blank">{{ $permission->address }}</a>
                                    @endif
                                </td>
                                <td >
                                    @if ($permission->status == 0)
                                        No
                                    @elseif($permission->status == 1)
                                        Yes @if ($permission->status != 0) <i class="fas fa-check-circle" style="color:rgb(44, 189, 104)"></i> @endif
                                    @endif
                                </td>
                                <td> 
                                    <form action="{{ route('admin.clients.destroy', $permission->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                            value="{{ trans('global.delete') }}">
                                    </form>

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
