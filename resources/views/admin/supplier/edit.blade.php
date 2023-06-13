@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.supplier.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.supplier.update", [$clients->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.name') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $clients->name) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.name_ar') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="name_ar" id="name_ar" value="{{ old('name_ar', $clients->name_ar) }}" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                <label class="required" for="email">{{ trans('cruds.clients.fields.email') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email',  $clients->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone',  $clients->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
            </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.address') }}</label>
                    <textarea name="address" class="form-control" required>{!! $clients->address !!}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.address_ar') }}</label>
                    <textarea name="address_ar" class="form-control" required>{!! $clients->address_ar !!}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.tax_number') }}</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="tax_number" id="tax_number" value="{{ old('tax_number', $clients->tax_number) }}" required>
                    @if($errors->has('tax_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tax_number') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.building_num') }}</label>
                    <input class="form-control" type="text" name="building_num" id="building_num" value="{{ old('building_num', $clients->building_num) }}" >

                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.street_name') }}</label>
                    <input class="form-control" type="text" name="street_name" id="street_name" value="{{ old('street_name', $clients->street_name) }}" >

                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.street') }}</label>
                    <input class="form-control" type="text" name="street" id="street" value="{{ old('street', $clients->street) }}" >

                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.disincit') }}</label>
                    <input class="form-control" type="text" name="disincit" id="disincit" value="{{ old('disincit', $clients->disincit) }}" >

                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.city') }}</label>
                    <select name="city_id" class="form-control">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}" @if($clients->city_id==$city->id) selected @endif >{{$city->name_ar}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.addidtional_address') }}</label>
                    <input class="form-control" type="text" name="addidtional_address" id="addidtional_address" value="{{ old('addidtional_address', $clients->addidtional_address) }}" >

                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.another_id') }}</label>
                    <input class="form-control" type="text" name="another_id" id="another_id" value="{{ old('another_id', $clients->another_id) }}" >

                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.zipCode') }}</label>
                    <input class="form-control" type="text" name="zipCode" id="zipCode" value="{{ old('zipCode', $clients->zipCode) }}" >

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