@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.aboutus.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.aboutus.update",[$aboutus->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row"> 
                <div class="form-group col-md-4">
                    <label class="required" for="phone">{{ trans('cruds.aboutus.fields.phone') }}</label>
                    <input type="text" name="phone" id="phone" class="form-control" required value="{{ $aboutus->phone }}">
                    @if($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="email">{{ trans('cruds.aboutus.fields.email') }}</label>
                    <input type="email" name="email" id="email" class="form-control" required value="{{ $aboutus->email }}">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="address">{{ trans('cruds.aboutus.fields.address') }}</label>
                    <input type="text" name="address" id="address" class="form-control" required value="{{ $aboutus->address }}">
                    @if($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="count_to_loyalty">{{ trans('cruds.aboutus.fields.count_to_loyalty') }}</label>
                    <input type="number" name="count_to_loyalty" id="count_to_loyalty" class="form-control" required value="{{ $aboutus->count_to_loyalty }}">
                    @if($errors->has('count_to_loyalty'))
                        <div class="invalid-feedback">
                            {{ $errors->first('count_to_loyalty') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="appointment_count">{{ trans('cruds.aboutus.fields.appointment_count') }}</label>
                    <input type="number" name="appointment_count" id="appointment_count" class="form-control" required value="{{ $aboutus->appointment_count }}">
                    @if($errors->has('appointment_count'))
                        <div class="invalid-feedback">
                            {{ $errors->first('appointment_count') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="package_loyalty">{{ trans('cruds.aboutus.fields.package_loyalty') }}</label>
                    <select class="form-control" name="package_loyalty" id="package_loyalty">
                        @foreach($packages as $package)
                            <option value="{{ $package->id }}" @if($package->id == $aboutus->package_loyalty) selected @endif>
                                {{ $package->name }}
                            </option>
                        @endforeach
                    </select> 
                    @if($errors->has('package_loyalty'))
                        <div class="invalid-feedback">
                            {{ $errors->first('package_loyalty') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label class="required" for="facebook">{{ trans('cruds.aboutus.fields.facebook') }}</label>
                    <input type="text" name="facebook" id="facebook" class="form-control" required value="{{ $aboutus->facebook }}">
                    @if($errors->has('facebook'))
                        <div class="invalid-feedback">
                            {{ $errors->first('facebook') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label class="required" for="twitter">{{ trans('cruds.aboutus.fields.twitter') }}</label>
                    <input type="text" name="twitter" id="twitter" class="form-control" required value="{{ $aboutus->twitter }}">
                    @if($errors->has('twitter'))
                        <div class="invalid-feedback">
                            {{ $errors->first('twitter') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label class="required" for="instagram">{{ trans('cruds.aboutus.fields.instagram') }}</label>
                    <input type="text" name="instagram" id="instagram" class="form-control" required value="{{ $aboutus->instagram }}">
                    @if($errors->has('instagram'))
                        <div class="invalid-feedback">
                            {{ $errors->first('instagram') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label class="required" for="googleplus">{{ trans('cruds.aboutus.fields.googleplus') }}</label>
                    <input type="text" name="googleplus" id="googleplus" class="form-control" required value="{{ $aboutus->googleplus }}">
                    @if($errors->has('googleplus'))
                        <div class="invalid-feedback">
                            {{ $errors->first('googleplus') }}
                        </div>
                    @endif
                </div>
                
                <div class="form-group col-md-4">
                    <label class="required" for="descripton">{{ trans('cruds.aboutus.fields.descripton') }}</label>
                    <textarea id="descripton" class="form-control" required name="descripton" rows="4" cols="50">{!! $aboutus->descripton !!}</textarea>
                    @if($errors->has('descripton'))
                        <div class="invalid-feedback">
                            {{ $errors->first('descripton') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-4">
                    <label class="required" for="mission">{{ trans('cruds.aboutus.fields.mission') }}</label>
                    <textarea id="mission" class="form-control" name="mission" required rows="4" cols="50">{!! $aboutus->mission !!}</textarea>
                    @if($errors->has('mission'))
                        <div class="invalid-feedback">
                            {{ $errors->first('mission') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-4">
                    <label class="required" for="vision">{{ trans('cruds.aboutus.fields.vision') }}</label>
                    <textarea id="vision" class="form-control" required name="vision" rows="4" cols="50">{!! $aboutus->vision !!}</textarea>
                    @if($errors->has('vision'))
                        <div class="invalid-feedback">
                            {{ $errors->first('vision') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="required" for="title">{{ trans('cruds.aboutus.fields.logo') }}</label>  
                        </div>
                        <div class="col-md-4">
                            <input type="file"  name="logo"  class="form-control">
                        </div>
                        <div class="col-md-6">
                            <img src="{{URL::asset('storage/app/public/attachment/' . $aboutus->logo)}}" style="width:30%" class="img-responsive" alt="">  
                        </div>
                    </div>

                </div>

                <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="required" for="title">{{ trans('cruds.aboutus.fields.image_about_us') }}</label>  
                        </div>
                        <div class="col-md-4">
                            <input type="file"  name="image_about_us"  class="form-control">
                        </div>
                        <div class="col-md-6">
                            <img src="{{URL::asset('storage/app/public/attachment/' . $aboutus->image_about_us)}}" style="width:30%" class="img-responsive" alt="">  
                        </div>
                    </div>

                </div>

                <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="required" for="title">{{ trans('cruds.aboutus.fields.image_our_service') }}</label>  
                        </div>
                        <div class="col-md-4">
                            <input type="file"  name="image_our_service"  class="form-control">
                        </div>
                        <div class="col-md-6">
                            <img src="{{URL::asset('storage/app/public/attachment/' . $aboutus->image_our_service)}}" style="width:30%" class="img-responsive" alt="">  
                        </div>
                    </div>

                </div>

                <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="required" for="title">{{ trans('cruds.aboutus.fields.image_easy_quick') }}</label>  
                        </div>
                        <div class="col-md-4">
                            <input type="file"  name="image_easy_quick"  class="form-control">
                        </div>
                        <div class="col-md-6">
                            <img src="{{URL::asset('storage/app/public/attachment/' . $aboutus->image_easy_quick)}}" style="width:30%" class="img-responsive" alt="">  
                        </div>
                    </div>

                </div>

                <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="required" for="title">{{ trans('cruds.aboutus.fields.image_client_reviews') }}</label>  
                        </div>
                        <div class="col-md-4">
                            <input type="file"  name="image_client_reviews"  class="form-control">
                        </div>
                        <div class="col-md-6">
                            <img src="{{URL::asset('storage/app/public/attachment/' . $aboutus->image_client_reviews)}}" style="width:30%" class="img-responsive" alt="">  
                        </div>
                    </div>

                </div>

                <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="required" for="title">{{ trans('cruds.aboutus.fields.image_packages') }}</label>  
                        </div>
                        <div class="col-md-4">
                            <input type="file"  name="image_packages"  class="form-control">
                        </div>
                        <div class="col-md-6">
                            <img src="{{URL::asset('storage/app/public/attachment/' . $aboutus->image_packages)}}" style="width:30%" class="img-responsive" alt="">  
                        </div>
                    </div>

                </div>

                <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="required" for="title">{{ trans('cruds.aboutus.fields.image_contact') }}</label>  
                        </div>
                        <div class="col-md-4">
                            <input type="file"  name="image_contact"  class="form-control">
                        </div>
                        <div class="col-md-6">
                            <img src="{{URL::asset('storage/app/public/attachment/' . $aboutus->image_contact)}}" style="width:30%" class="img-responsive" alt="">  
                        </div>
                    </div>

                </div>
                <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="required" for="title">{{ trans('cruds.aboutus.fields.image_login') }}</label>  
                        </div>
                        <div class="col-md-4">
                            <input type="file"  name="image_login"  class="form-control">
                        </div>
                        <div class="col-md-6">
                            <img src="{{URL::asset('storage/app/public/attachment/' . $aboutus->image_login)}}" style="width:30%" class="img-responsive" alt="">  
                        </div>
                    </div>

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