@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.setting.update", [$setting->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" type="number" step="0.1" name="tax" id="tax" value="{{ old('tax',$setting->tax) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
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