@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.gallery.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.gallery.update", [$gallery->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">


                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.gallery.fields.petcategory') }}</label>
                    <select name="category_id" id="category_id">

                        @foreach($categories as $category)
                            <option @if($category->id == $gallery->category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>
                @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.gallery.fields.image') }}</label>
                    <input type="file"  name="image"   class="form-control">

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