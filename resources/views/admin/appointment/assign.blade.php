@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.appointment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.appointment.assign",$appointment->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">


                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.appointment.fields.employees') }}</label>
                    <select name="emp_id" id="emp_id" class="form-control">
                        <option disabled selected value="">{{ trans('cruds.appointment.fields.choose') }}</option>
                        @foreach($employees as $employee)
                            <option @if($employee->id == $appointment->emp_id) selected @endif value="{{$employee->id}}">{{$employee->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

                <div class="form-group col-md-6">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.update') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection