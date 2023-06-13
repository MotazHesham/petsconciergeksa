@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.workingday.title_singular') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url("admin/storeworkingday") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">

            <input type="hidden" name="project_id" value="{{$id}}">
                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.from') }}</label>
                <input class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" type="time" name="from" id="from" value="{{ old('from', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.to') }}</label>
                <input class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}" type="time" name="to" id="to" value="{{ old('to', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.days') }}</label>
                <select class="form-control" required name="day">
                    <option value="Saturday" selected>{{ trans('cruds.clients.fields.Saturday') }} </option>
                    <option value="Sunday"> {{ trans('cruds.clients.fields.Sunday') }} </option>
                    <option value="Monday">{{ trans('cruds.clients.fields.Monday') }}</option>
                    <option value="Tuesday"> {{ trans('cruds.clients.fields.Tuesday') }}</option>
                    <option value="Wednesday"> {{ trans('cruds.clients.fields.Wednesday') }} </option>
                    <option value="Thursday"> {{ trans('cruds.clients.fields.Thursday') }}</option>
                    <option value="Friday"> {{ trans('cruds.clients.fields.Friday') }} </option>
                </select>
            </div>
            </div>
                <div class="form-group col-md-6">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection