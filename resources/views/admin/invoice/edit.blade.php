@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.invoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.invoice.update", [$invoice->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.invoice_id') }}</label>
                    <input name="num" required type="text" value="{{$invoice->num}}" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.date_of_supply') }}</label>
                    <input name="date_of_supply" required value="{{$invoice->date_of_supply}}" type="date" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.projects') }}</label>
                    <select name="project_id" class="form-control">
                        @foreach($projects as $project)
                            <option value="{{$project->id}}"
                           @if($project->id==$invoice->project_id) selected @endif
                            >{{$project->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.clients.fields.banks') }}</label>
                    <select name="bank_id" class="form-control">
                        @foreach($banks as $project)
                            <option value="{{$project->id}}"
                                    @if($project->id==$invoice->bank_id) selected @endif
                            >{{$project->name}}</option>
                        @endforeach
                    </select>
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