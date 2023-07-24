@extends('employee.layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.appointment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("employee.appointment.done",$appointment->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="row"> 
                <input type="hidden" name="status" value="2">

                <div class="form-group col-md-12">
                    <label class="required" for="title">{{ trans('cruds.appointment.fields.comment') }}</label>
                    <textarea id="comment" class="form-control" name="comment" rows="4" cols="50"></textarea>
                    @if($errors->has('name_ar'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

            </div>

                <div class="form-group col-md-6">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.update') }}
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'comment' );

</script>

@endsection