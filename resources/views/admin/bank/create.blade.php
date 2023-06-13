@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.bank.title_singular') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("admin.bank.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.bank_name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.bank_name_ar') }}</label>
                    <input class="form-control {{ $errors->has('name_ar') ? 'is-invalid' : '' }}" type="text" name="name_ar" id="name_ar" value="{{ old('name_ar', '') }}" required>
                    @if($errors->has('name_ar'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_ar') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.nickname') }}</label>
                    <input class="form-control {{ $errors->has('nickname') ? 'is-invalid' : '' }}" type="text" name="nickname" id="nickname" value="{{ old('nickname', '') }}" required>
                    @if($errors->has('nickname'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nickname') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.nickname_ar') }}</label>
                    <input class="form-control {{ $errors->has('nickname_ar') ? 'is-invalid' : '' }}" type="text" name="nickname_ar" id="nickname_ar" value="{{ old('nickname_ar','') }}" required>
                    @if($errors->has('nickname_ar'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nickname_ar') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.iban') }}</label>
                <input class="form-control {{ $errors->has('name_ar') ? 'is-invalid' : '' }}" type="text" name="iban" id="iban" value="{{ old('iban', '') }}" required>

            </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.account_number') }}</label>
                    <input class="form-control {{ $errors->has('account_number') ? 'is-invalid' : '' }}" type="text" name="account_number" id="account_number" value="{{ old('account_number', '') }}" required>

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