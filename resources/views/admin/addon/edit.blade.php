@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.addon.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.addon.update", [$addon->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.addon.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $addon->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.addon.fields.price') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('name', $addon->price) }}" required>
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