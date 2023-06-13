@extends('layouts.admin')
@section('content')
    <?php
    $setting = \App\Models\SettingData::first();
    ?>
    <div class="card" @if(app()->getLocale() == 'ar') style="    text-align: right; direction: rtl;" @endif>
        <div class="card-header">
            {{ trans('cruds.invoice.title_singular') }}

        </div>
        <button id="cmd" onclick="printDiv()">

            {{ trans('cruds.clients.fields.print') }} </button>

        <div class="card-body" id="cv">
            <?php
            $date = $invoice->created_at->format('Y-m-d');
            ?>
            <div class="raw">
                <img src="{{ asset('images/logo.png') }}" style="float: left; width: 272px;"/>
            </div>
                <br>
                <br>
                <br>
                <br>



{{--                <center><span id="company" style="width: 300px; height: 200px; display: none;">اسواق المستقبل</span>--}}
            </center>
            
            <br>
            @if(!$invoice->returned)
                <center><h6> {{__('cruds.invoice.fields.simple_invoice', [], 'ar')}}</h6></center>
                <center><h6> {{__('cruds.invoice.fields.simple_invoice', [], 'en')}}</h6></center>
            @else
                <center><h6>{{$invoice->num}} : {{__('cruds.invoice.fields.returned_invoice', [], 'ar')}} </h6></center>
                <center><h6> {{__('cruds.invoice.fields.returned_invoice', [], 'en')}} : {{$invoice->num}}</h6></center>
            @endif
            <br>
            <br>
            @if(!$invoice->returned)
                <center><h6> {{__('cruds.clients.fields.sale', [], 'ar')}}</h6></center>
                <center><h6> {{__('cruds.clients.fields.sale', [], 'en')}}</h6></center>
            @endif

            <div  style="text-align: left; direction: ltr;">
                <div  style="    text-align: left; direction: ltr; float: left;">
                    <div>
                        <label class="required" for="title">{{__('cruds.clients.fields.from', [], 'en')}}
                            : {{$project->suppliers->name_ar??''}} </label>
                    </div>
                    <div>
                        <label class="required" for="title">{{__('cruds.clients.fields.date_of_returned', [], 'en')}}
                            : {{date('d-m-Y',strtotime($date))}} </label>

                        </label>
                    </div>
                    <div>
                        <label class="required" style="    width: 357px;
" for="title">{{__('cruds.clients.fields.address', [], 'en')}}
                            : {!! $project->suppliers->address ??'' !!} </label>
                    </div>

                    <div>
                        <label class="required"
                               for="title">{{__('cruds.clients.fields.VAT Registration Number', [], 'en')}}
                            : {{$project->clients->tax_number??''}}
                        </label>
                    </div>
                </div>

                <div style="    text-align: right; direction: rtl;float: right;">
                    <div>
                        <label class="required" for="title">{{__('cruds.clients.fields.from', [], 'ar')}}
                            : {{$project->suppliers->name??''}} </label>
                    </div>
                    <div>
                        @if(!$invoice->returned)
                            <label class="required" for="title">{{__('cruds.clients.fields.date', [], 'ar')}}
                            : {{date('d-m-Y',strtotime($date))}} </label>
                        @else
                            <label class="required" for="title">{{__('cruds.clients.fields.date_of_returned', [], 'ar')}}
                            : {{date('d-m-Y',strtotime($date))}} </label>
                        @endif
                    </div>
                    <div>
                        <label class="required" style="    width: 357px;
"  for="title">{{__('cruds.clients.fields.address', [], 'ar')}}
                            : {{$project->suppliers->address_ar??''}} </label>
                    </div>

                    <div>
                        <label class="required"
                               for="title">{{__('cruds.clients.fields.VAT Registration Number', [], 'ar')}}
                            : {{$project->clients->tax_number??''}}
                        </label>
                    </div>
                </div>
            </div>
                <br>
                <br>
                <br>

            
                @if(!$invoice->returned)
                    <center><h6 style="    direction: rtl; margin-top: 105px;"> رقم الفاتورة: {{$invoice->num}} 
                    </h6></center>
                @else
                   <center> <h6 style="    direction: rtl; margin-top: 105px;"> رقم المرتجع :{{$invoice->returned_number}} 
                    </h6></center>
                   <center> <h6 style="    direction: rtl;">تاريخ المرتجع :{{$invoice->returned_date}} 
                    </h6></center>
                @endif
                
            <div  style="text-align: left; direction: ltr;
" >

                <div  style="text-align: left; direction: ltr; float: left;">

                    <div>
                        <label class="required" for="title">{{__('cruds.clients.fields.to', [], 'en')}}
                            : {{$project->clients->name??''}} </label>
                    </div>

                    <div>
                        <label class="required" for="title">{{__('cruds.clients.fields.project', [], 'en')}}
                            :{{$project->name}}
                        </label>
                    </div>
                    <div>
                        <label class="required" for="title" style="width: 300px">{{__('cruds.clients.fields.address', [], 'en')}}
                            : {{$project->clients->address??''}} </label>
                    </div>
                    <div>
                        <label class="required"
                               for="title">{{__('cruds.clients.fields.VAT Registration Number', [], 'en')}}
                            : {{$project->suppliers->tax_number??''}}
                        </label>
                    </div>
                    <br>


                </div>
                <div style="text-align: right; direction: rtl; float: right;">

                    <div>
                        <label class="required" for="title">{{__('cruds.clients.fields.to', [], 'ar')}}
                            : {{$project->clients->name_ar??''}} </label>
                    </div>

                    <div>
                        <label class="required" for="title">{{__('cruds.clients.fields.project', [], 'ar')}}
                            :{{$project->name_ar}}
                        </label>
                    </div>
                    <div>
                        <label class="required" for="title">{{__('cruds.clients.fields.address', [], 'ar')}}
                            : {{$project->clients->address_ar??''}} </label>
                    </div>
                    <div>
                        <label class="required"
                               for="title">{{__('cruds.clients.fields.VAT Registration Number', [], 'ar')}}
                            : {{$project->suppliers->tax_number??''}}
                        </label>
                    </div>
                    <br>


                </div>

            </div>


            <div class="table-responsive"
                 @if(app()->getLocale() == 'ar') style="    text-align: right; direction: rtl;" @endif>
                <label class="required" for="title"
                       @if(app()->getLocale() == 'ar') style="    text-align: right; direction: rtl;" @endif>{{ trans('cruds.clients.fields.details') }}</label>
                <table class=" table table-bordered table-striped table-hover datatable datatable-Permission"
                       style="width: 50%;">
                    <thead @if(app()->getLocale() == 'en') style="font-size: x-small;" @endif>
                    <tr>
                        <th>

                        </th>
                        <th>

                        </th>
                        <th>

                        </th>
                        <th>

                        </th>
                        <th>

                        </th>
                        <th colspan="3">
                            {{ trans('cruds.clients.fields.additional') }}

                        </th>
                        <th colspan="3">
                            {{ trans('cruds.clients.fields.Absence') }}

                        </th>
                        <th>

                        </th>

                    </tr>
                    <tr>

                        {{--                        <th>--}}
                        {{--                            {{ trans('cruds.permission.fields.id') }}--}}
                        {{--                        </th>--}}
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
                            {{ trans('cruds.clients.fields.OverTime Hours') }}
                        </th>
                        <th>
                            {{ trans('cruds.clients.fields.OverTime Rate') }}
                        </th>
                        <th>
                            {{ trans('cruds.clients.fields.OverTime Amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.clients.fields.Absence Days') }}
                        </th>
                        <th>
                            {{ trans('cruds.clients.fields.Absence Rate') }}
                        </th>
                        <th>
                            {{ trans('cruds.clients.fields.Absence Amount') }}
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
                    $x = 0;
                    $y = 0;
                    ?>
                    @foreach($tasks as  $key=>$task)
                        <tr data-entry-id="{{ $task->id }}">

                            {{--                            <td>--}}
                            {{--                                {{ $key+1 ?? '' }}--}}
                            {{--                            </td>--}}
                            <td>
                                {{ $task->name ?? '' }}
                            </td>

                            <td>
                                {{ number_format($task->working) ?? '' }}
                            </td>
                            <td>
                                {{ number_format(round($task->daily,4),4)  ?? '' }}

                            </td>
                            <td>
                                {{  number_format(round($task->over_time_hours,4))  ?? '' }}
                            </td>
                            <td>
                                {{ number_format(round($task->over_time_rate,4),4)  ?? '' }}
                            </td>
                            <td>
                                {{number_format(round($task->over_time_hours * $task->over_time_rate,4),4)   ?? '' }}

                            </td>
                            <td>
                                {{number_format($task->absense_days)  ?? '' }}

                            </td>
                            <td>
                                {{ number_format($task->absense_rate,4)  ?? '' }}

                            </td>
                            <td>
                                <?php
                                $total_absense = $task->absense_days * $task->absense_rate;
                                ?>
                                {{  number_format(round($task->absense_days * $task->absense_rate,4),4)   ?? '' }}

                            </td>
                            <td>
                                {{ number_format( round(($task->daily * $task->working) +($task->over_time_hours * $task->over_time_rate) -$total_absense,4),4)  ?? '' }}
                                <?php
                                $x += ($task->daily * $task->working) + ($task->over_time_hours * $task->over_time_rate) - $total_absense;
                                ?>
                            </td>
                            <td>
                                {{ number_format(round((($task->daily * $task->working) + ($task->over_time_hours * $task->over_time_rate) - $total_absense) * 15/100,4),4)  ?? '' }}
                            </td>
                            <td>

                                {{ number_format(round((($task->daily * $task->working) + ($task->over_time_hours * $task->over_time_rate)- $total_absense) * 15/100 + ( ($task->daily * $task->working) + ($task->over_time_hours * $task->over_time_rate) - $total_absense ),4),4)   ?? '' }}

                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <?php
            $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
            ?>
            <div  style="    text-align: left; direction: ltr;" >

                <table class="table table-bordered"  @if(app()->getLocale() == 'ar') style="width: 50%;direction: rtl; text-align: right;"@else style="width: 50%;"  @endif>
                    <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.clients.fields.total_amount') }}
                        </th>
                        <th>
                            {{number_format(round($x,4),4)}} {{ trans('cruds.clients.fields.currency') }}
                        </th>


                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.clients.fields.tax_rate') }}
                        </th>
                        <th>
                            {{number_format(round(($x*15)/100,4),4)}} {{ trans('cruds.clients.fields.currency') }}
                        </th>


                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clients.fields.total') }}
                        </th>
                        <th>
                            {{number_format(round($x+ (($x*15)/100),4),4)}} {{ trans('cruds.clients.fields.currency') }}
                        </th>


                    </tr>
                    </thead>
                </table>

            </div>

            {{--            <div>--}}

            {{--                <label class="required" for="title">{{ trans('cruds.clients.fields.total_letters') }} <?php  echo $f->format($x+ (($x*15)/100)); ?> </label>--}}
            {{--            </div>--}}
            {{--                <div id="certificate">--}}
            {{--                    <center>{{ trans('cruds.clients.fields.VAT Registration Certificate') }}</center>--}}
            {{--                    <br>--}}
            {{--                    <center>{{ trans('cruds.clients.fields.Hereby, The General Authority of Zakat & Tax (GAZT) certifies that the taxpayer below is--}}
            {{--VAT registered on 19/04/2022') }}</center>--}}

            {{--                    <div>--}}
            {{--                        <label class="required" for="title">{{ trans('cruds.clients.fields.Taxpayer Name') }} شركة اسواق المستقبل  للمقاولات </label>--}}
            {{--                    </div>--}}
            {{--                    <div>--}}
            {{--                        <label class="required" for="title">{{ trans('cruds.clients.fields.VAT Registration Number') }} 311259030600003 </label>--}}
            {{--                    </div>--}}
            {{--                    <div>--}}
            {{--                        <label class="required" for="title">{{ trans('cruds.clients.fields.Effective Registration Date') }} 2022/05/01} </label>--}}
            {{--                    </div>--}}
            {{--                    <div>--}}
            {{--                        <label class="required" for="title">{{ trans('cruds.clients.fields.Taxpayer Address') }} جدة،النزهة،حراء ،23534 </label>--}}
            {{--                    </div>--}}
            {{--                </div>--}}



            {{--                <div id="data">--}}

            {{--                    <div>--}}
            {{--                        <label class="required" for="title">{{ trans('cruds.clients.fields.police') }} {!! $setting->police !!} </label>--}}
            {{--                    </div>--}}
            {{--                    <div>--}}
            {{--                        <label class="required" for="title">{{ trans('cruds.clients.fields.roles') }} {!! $setting->roles !!} </label>--}}
            {{--                    </div>--}}
            {{--                </div>--}}


            @php($x=0)
            @foreach($tasks as  $key=>$task)
                <?php
                $total_absense = $task->absense_days * $task->absense_rate;
                $x += ($task->daily * $task->working) + ($task->over_time_hours * $task->over_time_rate) - $total_absense;

                ?>


            @endforeach
            <?php
            $data = "رقم الفاتورة: " . $invoice->returned_number . "\n"
                . "اسم المورد: " . $project->suppliers->name . "\n"
                . "الرقم الضريبي: " . $project->suppliers->tax_number . "\n"
                . "التاريخ: " . $date . "\n"
                . "اجمالي الفاتورة (بدون الضريبة): " . number_format(round($x,4),4) . "\n"
                . "اجمالي الضريبة: " . number_format(round(($x * 15) / 100,4),4) . "\n"
                . "اجمالي الفاتورة (مع الضريبة): " . number_format(round(($x + (($x * 15) / 100)),4),4);
            ?>



            <div  style="      margin-top: -127px;
  text-align: right; direction: rtl;
" >
                {!! QrCode::encoding('UTF-8')->margin(0)->size(100)->generate($data); !!}
            </div>
                        @if(isset($banks))
                            @foreach($banks as $bank)
                        <div>
                    <div  style="text-align: left; direction: ltr; margin-top: 19px;">
                        <div style="    text-align: left; direction: ltr; float: left;">
                            <div>
                                <label class="required" for="title">{{__('cruds.clients.fields.nickname', [], 'en')}}
                                    : {{$bank->nickname??''}} </label>
                            </div>
                            <div>
                                <label class="required" for="title">{{__('cruds.clients.fields.bank_name', [], 'en')}}
                                    : {{$bank->name??''}} </label>
                            </div>

                            <div>
                                <label class="required"
                                       for="title">{{__('cruds.clients.fields.account_number', [], 'en')}}
                                    : {{$bank->account_number??''}}
                                </label>
                            </div>
                            <div>
                                <label class="required" for="title">{{__('cruds.clients.fields.IBAN No', [], 'en')}}
                                    : {{$bank->iban??''}} </label>
                            </div>
                        </div>

                        <div  style="    text-align: right; direction: rtl;float: right;">
                            <div>
                                <label class="required" for="title">{{__('cruds.clients.fields.nickname', [], 'ar')}}
                                    : {{$bank->nickname_ar??''}} </label>
                            </div>

                            <div>
                                <label class="required" for="title">{{__('cruds.clients.fields.bank_name', [], 'ar')}}
                                    : {{$bank->name_ar??''}} </label>
                            </div>


                            <div>
                                <label class="required"
                                       for="title">{{__('cruds.clients.fields.account_number', [], 'ar')}}
                                    : {{$bank->account_number??''}}
                                </label>
                            </div>

                            <div>
                                <label class="required" for="title">{{__('cruds.clients.fields.IBAN No', [], 'ar')}}
                                    : {{$bank->iban??''}} </label>
                            </div>

                        </div>
                    </div>
                        </div>
                        <br><br><br><br><br><br>

                    @endforeach
                @endif

        </div>
        @endsection
        @section('scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.2.0/jspdf.umd.min.js"></script>
            <script type="text/JavaScript"
                    src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
            <script>
                function printDiv() {
                    $("#image").show();
                    $("#bank_details").show();
                    $("#company").show();

                    $("#cv").print();
                    $("#image").hide();
                    $("#bank_details").hide();
                    $("#company").hide();
                }
                
            </script>


@endsection
