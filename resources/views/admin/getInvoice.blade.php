@extends('layouts.admin')
@section('content')


    <div class="card">
    <div class="card-header">
         {{ trans('cruds.invoice.title_singular') }}
    </div>
    <button id="cmd" onclick="printDiv()">طباعة </button>

    <div class="card-body" id="cv">
        <div class="row">
            <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.invoice_id') }}</label>
                <?php
                $digits = 3;
                ?>
                <input class="form-control" type="text" name="text"  value="fa-{{$month}}-<?php echo rand(pow(10, $digits-1), pow(10, $digits)-1);?> " readonly>
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.date') }}</label>
                <?php
                $date=Carbon\Carbon::now()->format('Y-m-d');
                ?>
                <input class="form-control" type="text" name="text"  value="{{$date}}" readonly>
            </div>
            <div class="form-group col-md-6">
               <label class="required" for="title">{{ trans('cruds.clients.fields.project') }}</label>
                <input class="form-control" type="text" name="text"  value="{{$project->name}}" readonly>
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.supplier') }}</label>
                <input class="form-control" type="text" name="text"  value="{{$project->suppliers->name}}" readonly>
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.tax_number_supplier') }}</label>
                <input class="form-control" type="text" name="text" value="{{$project->suppliers->tax_number}}" readonly>
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.client') }}</label>
                <input class="form-control" type="text" name="text"  value="{{$project->clients->name}}" readonly>
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="title">{{ trans('cruds.clients.fields.tax_number_client') }}</label>
                <input class="form-control" type="text" name="text"  value="{{$project->clients->tax_number}}" readonly>
            </div>
    </div>

        <div class="table-responsive">
                <label class="required" for="title">{{ trans('cruds.clients.fields.details') }}</label>
                <input class="form-control" type="text" name="text"  value="{{$month}}  {{$project->name}}" readonly>
            <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.permission.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.clients.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.clients.fields.days') }}
                    </th>
                    <th>
                        {{ trans('cruds.clients.fields.today_rate') }}
                    </th>
                    <th>
                        {{ trans('cruds.clients.fields.total_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.clients.fields.tax_rate') }}
                    </th>
                    <th>
                        {{ trans('cruds.clients.fields.total') }}
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $x=0;
                ?>
                @foreach($tasks as $key => $permission)
                    <tr data-entry-id="{{ $permission->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $permission->id ?? '' }}
                        </td>
                        <td>
                            {{ $permission->name ?? '' }}
                        </td>

                        <td>
                            {{ $permission->days ?? '' }}
                        </td>
                        <td>
                            {{ $permission->today_rate ?? '' }}

                        </td>
                        <td>
                            {{ $permission->today_rate * $permission->days  ?? '' }}
                            <?php
                            $x+=$permission->today_rate * $permission->days;
                            ?>
                        </td>
                        <td>
                            {{ ($permission->today_rate * $permission->days * 15)/100  ?? '' }}
                        </td>
                        <td>
                            {{ (($permission->today_rate * $permission->days * 15)/100) + ( $permission->today_rate * $permission->days )  ?? '' }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group col-md-6">
            <label class="required" for="title">{{ trans('cruds.clients.fields.total_amount') }}</label>
            <input class="form-control" type="text" name="text"  value="{{$x}}" readonly>
        </div>
        <div class="form-group col-md-6">
            <label class="required" for="title">{{ trans('cruds.clients.fields.tax_rate') }}</label>
            <input class="form-control" type="text" name="text"  value="{{($x*15)/100}}" readonly>
        </div>
        <div class="form-group col-md-6">
            <label class="required" for="title">{{ trans('cruds.clients.fields.total') }}</label>
            <input class="form-control" type="text" name="text"  value="{{$x+ (($x*15)/100)}}" readonly>
        </div>
        <div class="form-group col-md-6">
            <label class="required" for="title">{{ trans('cruds.clients.fields.total_letters') }}</label>
            <?php
            $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
            ?>
            <input class="form-control" type="text" name="text"  value="<?php  echo $f->format($x+ (($x*15)/100)); ?>" readonly>
        </div>
        <?php
            $data="اسم البائع: ".$project->suppliers->name."\n"
                ."الرقم الضريبي: ".$project->suppliers->tax_number."\n"
                ."التاريخ: ".$date."\n"
                ."مبلغ الفاتورة (مع الضريبة): ".($x+(($x*15)/100))."\n"
                ."مبلغ الضريبة: ".(($x*15)/100);
        ?>
        {!! QrCode::encoding('UTF-8')->margin(10)->size(250)->generate($data); !!}
    </div>


@endsection

@section('scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.2.0/jspdf.umd.min.js"></script>
            <script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>


            <script>
                function printDiv()
                {
                    $("#cv").print();
                }
            </script>
@endsection
