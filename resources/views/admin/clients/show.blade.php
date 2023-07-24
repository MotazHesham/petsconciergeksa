@extends('layouts.admin')
@section('content')

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
                    </tr>
                </thead> 
                
                <tbody>
                    @foreach($clients->pets as $pet)
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
                                {{ $pet->age}}
                            </td>
                            <td>
                                {{ $pet->gender}}
                            </td>
                            <td>
                                {{ $pet->instagram_account}}
                            </td>
                            <td>
                                <img src="{{URL::asset('storage/app/public/attachment/' . $pet->image)}}" style="width: 80px; height: 80px;">
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