@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sliders.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.slider.title_singular') }}
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.slider.title_singular') }} {{ trans('global.list') }}
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
                                {{ trans('cruds.slider.fields.photo') }}
                            </th>

                            <th>
                                {{ trans('cruds.slider.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.slider.fields.body') }}
                            </th>
                            <th>
                                {{ trans('cruds.slider.fields.button_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.slider.fields.link') }}
                            </th>

                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr data-entry-id="{{ $slider->id }}">

                                <td>
                                    {{ $slider->id ?? '' }}
                                </td>
                                <td>
                                    <img width="90"
                                        src="{{ URL::asset('storage/app/public/attachment/' . $slider->photo) }}">
                                </td>
                                <td>
                                    {{ $slider->title ?? '' }}
                                </td>

                                <td>
                                    {{ $slider->body ?? '' }}
                                </td>

                                <td>
                                    {{ $slider->button_name ?? '' }}
                                </td>
                                <td>
                                    {{ $slider->link ?? '' }}
                                </td>

                                <td> 
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sliders.edit', $slider->id) }}">
                                        {{ trans('global.edit') }}
                                    </a> 
                                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST"
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
