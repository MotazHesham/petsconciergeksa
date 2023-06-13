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
                    @foreach($clients as $key => $permission)
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
                                @if($permission->lat && $permission->lng)
                                <a href="https://www.google.com/maps/?q={{$permission->lat}},{{$permission->lng}}" target="_blank">{{$permission->address}}</a>
                                @endif
                            </td>
                            <td @if($permission->status != 0) bgcolor="#32cd32" @endif>
                                @if($permission->status == 0)
                                    No
                                @elseif($permission->status == 1)
                                    Yes
                                @endif
                            </td>
                            <td>

{{--                                <a class="btn btn-xs btn-primary" href="{{ route('admin.clients.show', $permission->id) }}">--}}
{{--                                    {{ trans('global.view') }}--}}
{{--                                </a>--}}

{{--                                @can('permission_edit')--}}
{{--                                    <a class="btn btn-xs btn-info" href="{{ route('admin.clients.edit', $permission->id) }}">--}}
{{--                                        {{ trans('global.edit') }}--}}
{{--                                    </a>--}}
{{--                                @endcan--}}

                                    <form action="{{ route('admin.clients.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('permission_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.permissions.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Permission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection