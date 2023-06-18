@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.slider.title_singular') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row"> 
                    <div class="form-group col-md-12">
                        <label class="required" for="photo">{{ trans('cruds.slider.fields.photo') }}</label>
                        <input type="file" name="photo" id="photo" class="form-control"> 
                    </div> 
                    <div class="form-group col-md-4">
                        <label class="required" for="title">{{ trans('cruds.slider.fields.title') }}</label>
                        <input type="text" name="title" id="title" class="form-control"> 
                    </div>
                    <div class="form-group col-md-4">
                        <label class="required" for="body">{{ trans('cruds.slider.fields.body') }}</label>
                        <input type="text" name="body" id="body" class="form-control"> 
                    </div>
                    <div class="form-group col-md-4">
                        <label class="required" for="button_name">{{ trans('cruds.slider.fields.button_name') }}</label>
                        <input type="text" name="button_name" id="button_name" class="form-control"> 
                    </div> 
                    <div class="form-group col-md-4">
                        <label class="required" for="link">{{ trans('cruds.slider.fields.link') }}</label>
                        <input type="text" name="link" id="link" class="form-control"> 
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
