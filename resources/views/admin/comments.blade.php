@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.comments.title_singular') }} {{ trans('global.list') }}
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
                            {{ trans('cruds.comments.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.comments.fields.comment') }}
                        </th>
                        <th>
                            {{ trans('cruds.comments.fields.status') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $key => $comment)
                        <tr data-entry-id="{{ $comment->id }}">

                            <td>
                                {{ $comment->id ?? '' }}
                            </td>
                            <td>
                                {{ $comment->client->name ?? '' }}
                            </td>
                            <td>
                                {{ $comment->comment  }}
                            </td>
                            <td>
                                @if($comment->flag == 0)
                                    {{ trans('cruds.comments.fields.suspend') }}
                                @else
                                    {{ trans('cruds.comments.fields.publish') }}
                                @endif
                            </td>

                            <td>

{{--                                <a class="btn btn-xs btn-primary" href="{{ route('admin.comments.show', $comment->id) }}">--}}
{{--                                    {{ trans('global.view') }}--}}
{{--                                </a>--}}

{{--                                @can('comment_edit')--}}
{{--                                    <a class="btn btn-xs btn-info" href="{{ route('admin.comments.edit', $comment->id) }}">--}}
{{--                                        {{ trans('global.edit') }}--}}
{{--                                    </a>--}}
{{--                                @endcan--}}
                                    @if($comment->flag == 0)
                                    <form action="{{ route('admin.comments.update', $comment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        @method('PUT')
                                        @csrf
                                        <input type="submit" class="btn btn-xs btn-primary" value="{{ trans('global.allow') }}">
                                    </form>
                                  @endif

                                    <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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