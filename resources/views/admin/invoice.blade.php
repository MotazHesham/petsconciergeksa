@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
         {{ trans('cruds.invoice.title_singular') }}
    </div>
    <div class="card-body">
        <form method="get" action="{{ url("admin/selectInvoice") }}" enctype="multipart/form-data">

            <div class="row">
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.month') }}</label>
                    <input class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" type="month" name="month" id="month" value="{{ old('month', '') }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>


                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.projects') }}</label>
                 <select name="project" class="form-control">
                     <option value="" disabled selected>{{ trans('cruds.clients.fields.choose') }}</option>
                     @foreach($projects as $user)
                         <option value="{{$user->id}}">{{$user->name}}</option>
                     @endforeach
                 </select>
                </div>

                <div class="form-group col-md-6">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.search') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection