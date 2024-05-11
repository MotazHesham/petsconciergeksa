@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">

            <form method="post" action="{{ route('admin.clients.add_pet') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$clients->id}}" name="client_id">
                <div class="row">
                    <div class="form-group col-md-4">

                        <label>Pet name:<span class="required">*</span></label>
                        <input type="text" name="name" class="form-control input-field" required="">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Pet Image:<span class="required">*</span></label>
                        <input type="file" name="image" class="form-control input-field">
                    </div>


                    <div class="form-group col-md-4">
                        <label>Pet kind:<span class="required">*</span></label>
                        <select name="category_id" id="category_id" class="form-control input-field" required>
                            <option disabled selected value="">Choose Pet Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Pet Gender:<span class="required">*</span></label>
                        <select name="gender" id="gender" class="form-control input-field" required>
                            <option disabled selected value="">Choose Pet Age</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Pet Age:<span class="required"></span></label>
                        <input type="number" name="age" class="form-control input-field">
                    </div>

                    <div class="form-group col-md-4">
                        <label>instagram account
                        </label>
                        <input type="text" class="form-control" name="instagram_account">
                    </div>
                </div>
                <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Add Now</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.clients.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>
                                id
                            </th>
                            <th>
                                Pet Name
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                age
                            </th>
                            <th>
                                gender
                            </th>
                            <th>
                                instagram Account
                            </th>
                            <th>
                                image
                            </th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clients->pets as $pet)
                            <tr>
                                <td>
                                    {{ $pet->id }}
                                </td>
                                <td>
                                    {{ $pet->name }}
                                </td>
                                <td>
                                    {{ $pet->category->name }}
                                </td>
                                <td>
                                    {{ $pet->age }}
                                </td>
                                <td>
                                    {{ $pet->gender }}
                                </td>
                                <td>
                                    {{ $pet->instagram_account }}
                                </td>
                                <td>
                                    <img src="{{ URL::asset('storage/app/public/attachment/' . $pet->image) }}"
                                        style="width: 80px; height: 80px;">
                                </td>
                                <td>
                                    
                                    <form action="{{ route('admin.clients.destroy_pet', $pet->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                            value="{{ trans('global.delete') }}">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
