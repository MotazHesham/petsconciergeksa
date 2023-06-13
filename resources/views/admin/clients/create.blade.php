@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.clients.title_singular') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("admin.clients.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.name') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.name_ar') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="name_ar" id="name_ar" value="{{ old('name_ar', '') }}" required>
                    @if($errors->has('name_ar'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                <label class="required" for="email">{{ trans('cruds.clients.fields.email') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', '') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
            </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.address') }}</label>
                    <textarea name="address" class="form-control" required></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.address_ar') }}</label>
                    <textarea name="address_ar" class="form-control" required></textarea>
                </div>


                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.building_num') }}</label>
                    <input class="form-control" type="text" name="building_num" id="building_num" value="{{ old('building_num', '') }}" >

                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.street_name') }}</label>
                    <input class="form-control" type="text" name="street_name" id="street_name" value="{{ old('street_name', '') }}" >

                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.street') }}</label>
                    <input class="form-control" type="text" name="street" id="street" value="{{ old('street', '') }}" >

                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.disincit') }}</label>
                    <input class="form-control" type="text" name="disincit" id="disincit" value="{{ old('disincit', '') }}" >

                </div>
{{--                <div class="form-group col-md-6">--}}
{{--                    <label class="required" for="title">{{ trans('cruds.clients.fields.city') }}</label>--}}
{{--                    <select name="city_id" class="form-control">--}}
{{--                        @foreach($cities as $city)--}}
{{--                            <option value="{{$city->id}}">{{$city->name_ar}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}

{{--                </div>--}}

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.addidtional_address') }}</label>
                    <input class="form-control" type="text" name="addidtional_address" id="addidtional_address" value="{{ old('addidtional_address', '') }}" >

                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.another_id') }}</label>
                    <input class="form-control" type="text" name="another_id" id="another_id" value="{{ old('another_id', '') }}" >

                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.zipCode') }}</label>
                    <input class="form-control" type="text" name="zipCode" id="zipCode" value="{{ old('zipCode', '') }}" >

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