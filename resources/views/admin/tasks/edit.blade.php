@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.workingday.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tasks.update", [$info->id]) }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.users') }}</label>
                    <select name="admin_id" class="form-control">
                        @foreach($users as $user)
                            <option value="{{$user->id}}"
                            @if($info->admin_id==$user->id) selected @endif>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.name') }}</label>
                <input class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name',$info->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.date') }}</label>
                    <input class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" type="date" name="date" id="date" value="{{ old('date', $info->date) }}" required>
                    @if($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.days') }}</label>
                    <input class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" type="number" name="days" id="days" value="{{ old('days', $info->days) }}" required>
                    @if($errors->has('days'))
                        <div class="invalid-feedback">
                            {{ $errors->first('days') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.today_rate') }}</label>
                    <input class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" type="number" step="0.1" name="today_rate" id="days" value="{{ old('today_rate', $info->today_rate) }}" required>
                    @if($errors->has('days'))
                        <div class="invalid-feedback">
                            {{ $errors->first('days') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.details') }}</label>
                    <textarea name="details" required class="form-control" >{!! $info->details !!}</textarea>
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