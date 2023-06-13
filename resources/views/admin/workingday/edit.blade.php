@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.workingday.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.workingday.update", [$info->id]) }}" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.from') }}</label>
                <input class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" type="time" name="from" id="from" value="{{ old('from',$info->from) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.to') }}</label>
                <input class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}" type="time" name="to" id="to" value="{{ old('to', $info->to) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.days') }}</label>
                <select class="form-control" required name="day">
                    <option value="Saturday"  @if($info->day=='Saturday')  selected @endif>{{ trans('cruds.clients.fields.Saturday') }} </option>
                    <option value="Sunday" @if($info->day=='Sunday')  selected @endif> {{ trans('cruds.clients.fields.Sunday') }} </option>
                    <option value="Monday" @if($info->day=='Monday')  selected @endif>{{ trans('cruds.clients.fields.Monday') }}</option>
                    <option value="Tuesday" @if($info->day=='Tuesday')  selected @endif> {{ trans('cruds.clients.fields.Tuesday') }}</option>
                    <option value="Wednesday" @if($info->day=='Wednesday')  selected @endif> {{ trans('cruds.clients.fields.Wednesday') }} </option>
                    <option value="Thursday" @if($info->day=='Thursday')  selected @endif> {{ trans('cruds.clients.fields.Thursday') }}</option>
                    <option value="Friday" @if($info->day=='Friday')  selected @endif> {{ trans('cruds.clients.fields.Friday') }} </option>
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