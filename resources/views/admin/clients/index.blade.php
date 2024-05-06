@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.clients.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.clients.title_singular') }}
            </a>
        </div>
    </div>
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
                                {{ trans('cruds.clients.fields.appointments_count') }}
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
                        @foreach ($clients as $key => $client)
                            <tr data-entry-id="{{ $client->id }}">

                                <td>
                                    {{ $client->id ?? '' }}
                                </td>
                                <td>
                                    {{ $client->name ?? '' }}
                                </td>
                                <td>
                                    {{ $client->email ?? '' }}
                                </td>
                                <td>
                                    {{ $client->phone ?? '' }}
                                </td>
                                <td>
                                    @if ($client->lat && $client->lng)
                                        <a href="https://www.google.com/maps/?q={{ $client->lat }},{{ $client->lng }}"
                                            target="_blank">{{ $client->address }}</a>
                                    @else 
                                        {{ $client->address }}
                                    @endif
                                </td>
                                <td>{{ $client->appointments_count > 0 ? $client->appointments_count : '' }}</td>
                                <td >
                                    @if ($client->status == 0)
                                        No 
                                        <br>
                                        <a class="btn btn-xs btn-success"
                                            href="{{ route('admin.clients.active', $client->id) }}">
                                            active
                                        </a>
                                    @elseif($client->status == 1)
                                        Yes @if ($client->status != 0) <i class="fas fa-check-circle" style="color:rgb(44, 189, 104)"></i> @endif
                                    @endif
                                </td>
                                <td> 
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.clients.show', $client->id) }}">
                                        Pets Info
                                    </a>
                                    <a class="btn btn-xs btn-info"
                                        href="{{ route('admin.clients.edit', $client->id) }}">
                                        Edit Password
                                    </a>
                                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST"
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
