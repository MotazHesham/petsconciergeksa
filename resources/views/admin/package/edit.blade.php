@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.package.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.package.update", [$package->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row"> 
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.package.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ $package->name }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.package.fields.smallprice') }}</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" step="0.1" name="small_price" id="small_price" value="{{ $package->small_price }}" required>
                    @if($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.package.fields.midprice') }}</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" step="0.1" name="mid_price" id="mid_price" value="{{ $package->mid_price }}" required>
                    @if($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.package.fields.hiprice') }}</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" step="0.1" name="hi_price" id="hi_price" value="{{ $package->hi_price }}" required>
                    @if($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                </div>


                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.service.fields.services_id') }}</label>

                    <select name="services_id[]" multiple class="form-control">
                        @foreach($services as $service)
                            <option value="{{$service->id}}" @if(in_array($service->id,json_decode($package->services_id))) selected @endif>{{$service->name}}</option>
                        @endforeach
                    </select>

                </div>


            </div>

                <div class="form-group col-md-6">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
                    <a class="btn btn-success" href="{{route('admin.package.index')}}">Back</a>
            </div>
        </form>
    </div>
</div>



@endsection