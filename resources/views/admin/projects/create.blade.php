@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.projects.title_singular') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("admin.projects.store") }}" enctype="multipart/form-data">
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
                            {{ $errors->first('name_ar') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                <label class="required" for="email">{{ trans('cruds.clients.fields.start_date') }}</label>
                <input class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="date" name="start_date" id="start_date" value="{{ old('start_date', '') }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
            </div>
                <div class="form-group col-md-6">
                <label class="required" for="email">{{ trans('cruds.clients.fields.end_date') }}</label>
                <input class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="date" name="end_date" id="end_date" value="{{ old('start_date', '') }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
            </div>
                <div class="form-group col-md-6">
                <label class="required" for="email">{{ trans('cruds.clients.fields.cities') }}</label>
              <select name="city_id" class="form-control">
                  @foreach($cities as $city)
                      <option value="{{$city->id}}">@if(app()->getLocale()=="en") {{$city->name}} @else {{$city->name_ar}} @endif</option>
                  @endforeach
              </select>
            </div>
                <div class="form-group col-md-6">
                    <label class="required" for="email">{{ trans('cruds.clients.fields.suppliers') }}</label>
                    <select name="supplier_id" class="form-control">
                        @foreach($suppliers as $city)
                            <option value="{{$city->id}}">@if(app()->getLocale()=="en") {{$city->name}} @else {{$city->name_ar}} @endif</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                <label class="required" for="email">{{ trans('cruds.clients.fields.types') }}</label>
                <select name="type_id" class="form-control">
                    @foreach($types as $city)
                        <option value="{{$city->id}}">@if(app()->getLocale()=="en") {{$city->name}} @else {{$city->name_ar}} @endif</option>
                    @endforeach
                </select>
            </div>
                <div class="form-group col-md-6">
                <label class="required" for="email">{{ trans('cruds.clients.fields.clients') }}</label>
                <select name="client_id" class="form-control" >
                    @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
            </div>
                                            <div class="row">

            @foreach($contracts as $contract)
                                                <div class="col-md-4">

                <div class="form-group col-md-6">
                <label class="required" for="email">@if(app()->getLocale()=="en") {{$contract->name}} @else {{$contract->name_ar}} @endif</label>
                <input class="form-control {{ $errors->has('contracts') ? 'is-invalid' : '' }}" type="text" name="values[{{$contract->id}}]" id="contract_id"  required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
            </div>
                        </div>

            @endforeach
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