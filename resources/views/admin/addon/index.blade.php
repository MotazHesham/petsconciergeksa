@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.addon.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.addon.title_singular') }}
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.addon.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                    <thead>
                        <tr>

                            <th>
                                {{ trans('cruds.addon.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.addon.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.addon.fields.price') }}
                            </th>
                            <th>
                                {{ trans('cruds.addon.fields.icon') }}
                            </th>
                            <th>
                                {{ trans('cruds.addon.fields.active') }} max(6)
                            </th>

                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($addons as $addon)
                            <tr data-entry-id="{{ $addon->id }}">

                                <td>
                                    {{ $addon->id ?? '' }}
                                </td>
                                <td>
                                    {{ $addon->name ?? '' }}
                                </td>
                                <td>
                                    {{ $addon->price ?? '' }}
                                </td>
                                <td>
                                    @if ($addon->icon)
                                        <img src="{{ URL::asset('storage/app/public/attachment/' . $addon->icon) }}"
                                            width="80" class="img-responsive" alt="">
                                    @endif
                                </td>
                                <td>
                                    <label class="c-switch c-switch-pill c-switch-success">
                                        <input onchange="update_statuses(this,'active')" value="{{ $addon->id }}"
                                            type="checkbox" class="c-switch-input" {{ $addon->active ? 'checked' : null }}>
                                        <span class="c-switch-slider"></span>
                                    </label>
                                </td>


                                <td>

                                    {{--                                @can('permission_edit') --}}
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.addon.edit', $addon->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                    {{--                                @endcan --}}

                                    {{--                                @can('permission_delete') --}}
                                    <form action="{{ route('admin.addon.destroy', $addon->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                            value="{{ trans('global.delete') }}">
                                    </form>
                                    {{--                                @endcan --}}

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
        function update_statuses(el, type) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('admin.addon.update_status') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status,
                type: type
            }, function(data) {
                if (data == 1) {
                    showAlert('success', 'Success', '');
                } else {
                    showAlert('error', 'Something went wrong', 'Cant add more than 6 items');
                }
            });
        }

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
