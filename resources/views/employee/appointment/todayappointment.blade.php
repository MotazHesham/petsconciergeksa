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
                            {{ trans('cruds.clients.fields.phone') }}
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
                            {{ trans('cruds.appointment.fields.package') }}
                        </th>

                        <th>

                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                        <tr data-entry-id="{{ $appointment->id }}">

                            <td>
                                {{ $appointment->id ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->client->name ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->client->phone ?? '' }}
                            </td>
                            <td>
                                <a href="https://www.google.com/maps/?q={{$appointment->client->lat}},{{$appointment->client->lng}}" target="_blank">{{$appointment->client->address}}</a>
                            </td>
                            <td>
                                {{ $appointment->date .' '.$appointment->time }}
                            </td>
                            <td>
                                {{ $appointment->pet->name ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->package->name ?? '' }}
                            </td>

                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('employee.appointment.edit', $appointment->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
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