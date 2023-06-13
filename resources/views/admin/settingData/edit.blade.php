@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settingData.update", [$clients->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.machine_num') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="machine_num" id="machine_num" value="{{ old('machine_num', $clients->machine_num) }}" required>
                @if($errors->has('machine_num'))
                    <div class="invalid-feedback">
                        {{ $errors->first('machine_num') }}
                    </div>
                @endif
            </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.box_honer') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="box_honer" id="box_honer" value="{{ old('box_honer', $clients->box_honer) }}" required>
                    @if($errors->has('box_honer'))
                        <div class="invalid-feedback">
                            {{ $errors->first('box_honer') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-12">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.police') }}</label>
                    <textarea name="police" class="form-control" required>{!! $clients->police !!}</textarea>
                </div>
                <div class="form-group col-md-12">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.roles') }}</label>
                    <textarea name="roles" class="form-control" required>{!! $clients->roles !!}</textarea>
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

<script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'police' );
    CKEDITOR.replace( 'roles' );

</script>

@endsection