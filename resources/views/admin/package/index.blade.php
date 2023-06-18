@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.package.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.package.title_singular') }}
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.package.title_singular') }} {{ trans('global.list') }}
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
                                {{ trans('cruds.package.fields.name') }}
                            </th>

                            <th>
                                {{ trans('cruds.package.fields.smallprice') }}
                            </th>
                            <th>
                                {{ trans('cruds.package.fields.midprice') }}
                            </th>
                            <th>
                                {{ trans('cruds.package.fields.hiprice') }}
                            </th>

                            <th>
                                {{ trans('cruds.service.fields.services_id') }}
                            </th>

                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $key => $service)
                            <tr data-entry-id="{{ $service->id }}">

                                <td>
                                    {{ $service->id ?? '' }}
                                </td>
                                <td>
                                    {{ $service->name ?? '' }}
                                </td>

                                <td>
                                    {{ $service->small_price ?? '' }}
                                </td>
                                <td>
                                    {{ $service->mid_price ?? '' }}
                                </td>
                                <td>
                                    {{ $service->hi_price ?? '' }}
                                </td>
                                <td>
                                    @if ($service->services_id && $service->services_id != 'null')
                                        <?php
                                        foreach (json_decode($service->services_id) as $serv) {
                                            $serviceID = \App\Models\Service::find($serv);
                                            $span = $serviceID->name;
                                            echo $span . '<br/>';
                                        }
                                        ?>
                                    @endif

                                </td>

                                <td>


                                    <a class="btn btn-xs btn-info" href="{{ route('admin.package.edit', $service->id) }}">
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
