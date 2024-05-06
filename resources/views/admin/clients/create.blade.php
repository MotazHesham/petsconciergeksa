@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.clients.title_singular') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.clients.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="form-group col-md-6">
                        <label class="required" for="title">{{ trans('cruds.clients.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                            name="name" id="name" value="{{ old('name', '') }}" required>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div> 
                    <div class="form-group col-md-6">
                        <label class="required" for="email">{{ trans('cruds.clients.fields.email') }}</label>
                        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="email"
                            name="email" id="email" value="{{ old('email', '') }}" required>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="title">{{ trans('cruds.clients.fields.phone') }}</label>
                        <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                            name="phone" id="phone" value="{{ old('phone', '') }}" required>
                        @if ($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div> 
                    <div class="form-group col-md-6">
                        <label class="required" for="title">Password</label>
                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                            name="password" id="password" value="{{ old('password', '') }}" required>
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div> 
                    <div class="form-group col-md-12">
                        <label class="required" for="title">Address</label>
                        <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                            name="address" id="address" value="{{ old('address', '') }}" required>
                        @if ($errors->has('address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
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
