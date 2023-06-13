@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.service.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.service.update", [$service->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">


                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.service.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $service->name) }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.service.fields.image') }}</label>
                    <input type="file"  name="image"   class="form-control">

                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.service.fields.description') }}</label>
                    <textarea id="description" class="form-control" name="description" rows="4" cols="50">{!! $service->description !!}</textarea>
                    @if($errors->has('name_ar'))
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