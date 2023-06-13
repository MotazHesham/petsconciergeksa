@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.aboutus.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.aboutus.update",[$aboutus->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.aboutus.fields.description') }}</label>
                    <textarea id="description" class="form-control" required name="descripton" rows="4" cols="50">{!! $aboutus->descripton !!}</textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.aboutus.fields.mission') }}</label>
                    <textarea id="description" class="form-control" name="mission" required rows="4" cols="50">{!! $aboutus->mission !!}</textarea>
                    @if($errors->has('mission'))
                        <div class="invalid-feedback">
                            {{ $errors->first('mission') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.aboutus.fields.vision') }}</label>
                    <textarea id="description" class="form-control" required name="vision" rows="4" cols="50">{!! $aboutus->vision !!}</textarea>
                    @if($errors->has('vision'))
                        <div class="invalid-feedback">
                            {{ $errors->first('vision') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="required" for="title">{{ trans('cruds.aboutus.fields.image_about_us') }}</label>  
                        </div>
                        <div class="col-md-2">
                            <input type="file"  name="image"  class="form-control">
                        </div>
                        <div class="col-md-8">
                            <img src="{{URL::asset('storage/app/public/attachment/' . $aboutus->image_about_us)}}" style="width:30%" class="img-responsive" alt="">  
                        </div>
                    </div>

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