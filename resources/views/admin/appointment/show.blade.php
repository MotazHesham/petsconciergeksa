@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
             {{ trans('cruds.appointment.title_singular') }} {{ trans('global.details') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.appointment.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.id') }}
                        </th>
                        <td>
                            {{ $appointment->id ?? ''}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.date') }}
                        </th>
                        <td>
                            {{ $appointment->date ?? ''}}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.status') }}
                        </th>
                        <td>
                            @if ($appointment->status == 0)
                                {{ trans('cruds.appointment.fields.active') }}
                            @elseif($appointment->status == 1)
                                {{ trans('cruds.appointment.fields.assigned') }}
                            @else
                                {{ trans('cruds.appointment.fields.done') }}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.client') }}
                        </th>
                        <td>
                            {{ $appointment->client->name ?? ''}}
                            <br>
                            ({{ $appointment->pet->instagram_account ?? '' }})
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.employee.title_singular') }}
                        </th>
                        <td>
                            {{ $appointment->employee->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.petname') }}
                        </th>
                        <td>
                            {{ $appointment->pet->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.package') }}
                        </th>
                        <td>
                            {{ $appointment->package->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.addons') }}
                        </th>
                        <td>
                            <?php
                            if ($appointment->addon_id)
                            {
                                $addons = json_decode($appointment->addon_id);
                                foreach ($addons as $key=>$addon){
                                    $addonID = \App\Models\Addons::find($addon);
                                    $span =$key+1 .'- '.$addonID->name;
                                    echo $span.'<br/>';
                                }
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.size') }}
                        </th>
                        <td>
                            {{ $appointment->size ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.time') }}
                        </th>
                        <td>
                            {{ $appointment->time ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.comment') }}
                        </th>
                        <td>
                            {{ $appointment->comment ?? '' }}
                        </td>
                    </tr>


                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.price') }}
                        </th>
                        <td>
                            {{ $appointment->price ?? '' }}
                        </td>
                    </tr>


                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.appointment.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>

    </div>



@endsection