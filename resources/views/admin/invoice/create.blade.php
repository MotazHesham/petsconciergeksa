@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.invoice.title_singular') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route("admin.invoice.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="required" for="title">{{ trans('cruds.clients.fields.invoice_id') }}</label>
                        <input name="num" required type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="title">{{ trans('cruds.clients.fields.date_of_supply') }}</label>
                        <input name="date_of_supply" required type="date" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="title">{{ trans('cruds.clients.fields.projects') }}</label>
                        <select name="project_id" class="form-control">
                            @foreach($projects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="title">{{ trans('cruds.clients.fields.banks') }}</label>
                        <select name="bank_id" class="form-control">
                            @foreach($banks as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="repeater">
                    <!-- Repeater Heading -->
                    <div class="items" data-group="albums">
                        <!-- Repeater Content -->
                        <div class="item-content">
                            <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="inputEmail" class="control-label"> {{ trans('cruds.clients.fields.name') }}</label>
                                    <input type="text" class="form-control" name="name[]" required   placeholder="{{ trans('cruds.clients.fields.name') }}"  data-name="name">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="inputEmails" class="control-label">    {{ trans('cruds.clients.fields.days') }}</label>
                                    <input type="number" step="0.000001" class="form-control" required name="working[]"   placeholder="{{ trans('cruds.clients.fields.days') }}"  data-name="working">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="inputEmails" class="control-label">   {{ trans('cruds.clients.fields.today_rate') }} </label>
                                    <input type="number" step="0.000001"  class="form-control" required name="daily[]"   placeholder="{{ trans('cruds.clients.fields.today_rate') }}"  data-name="daily">
                            </div>
                                <div class="form-group col-lg-3">
                                    <label for="inputEmails" class="control-label">   {{ trans('cruds.clients.fields.OverTime Hours') }} </label>
                                    <input type="number" step="0.000001"  class="form-control"  name="hours[]"   placeholder="{{ trans('cruds.clients.fields.today_rate') }}"  data-name="hours">
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="inputEmails" class="control-label">   {{ trans('cruds.clients.fields.OverTime Rate') }} </label>
                                    <input type="number" step="0.000001"  class="form-control"  name="rate[]"   placeholder="{{ trans('cruds.clients.fields.today_rate') }}"  data-name="rate">
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="inputEmails" class="control-label">   {{ trans('cruds.clients.fields.Absence Days') }} </label>
                                    <input type="number" step="0.000001"  class="form-control"  name="absense_days[]"   placeholder="{{ trans('cruds.clients.fields.Absence Days') }}"  data-name="absense_days">
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="inputEmails" class="control-label">   {{ trans('cruds.clients.fields.Absence Rate') }} </label>
                                    <input type="number" step="0.000001"  class="form-control"  name="absense_rate[]"   placeholder="{{ trans('cruds.clients.fields.Absence Rate') }}"  data-name="absense_rate">
                                </div>
                                <div class="col-lg-2 repeater-remove-btn" style="    margin-top: 32px;
">
                                    <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">
                                        {{ trans('cruds.clients.fields.remove') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Repeater Remove Btn -->

                    </div>



                </div>

                <div class="form-group col-md-6">
                    <button type="button" class="btn btn-primary repeater-add-btn">
                        {{ trans('cruds.clients.fields.add_more') }}
                    </button>
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection

@section('scripts')

    <script>
        jQuery.fn.extend({
            createRepeater: function (options = {}) {
                var hasOption = function (optionKey) {
                    return options.hasOwnProperty(optionKey);
                };

                var option = function (optionKey) {
                    return options[optionKey];
                };

                var generateId = function (string) {
                    return string
                        .replace(/\[/g, '_')
                        .replace(/\]/g, '')
                        .toLowerCase();
                };

                var addItem = function (items, key, fresh = true) {
                    var itemContent = items;
                    var group = itemContent.data("group");
                    var item = itemContent;
                    var input = item.find('input,select,textarea');

                    input.each(function (index, el) {
                        var attrName = $(el).data('name');
                        var skipName = $(el).data('skip-name');
                        if (skipName != true) {
                            $(el).attr("name", group + "[" + key + "]" + "[" + attrName + "]");
                        } else {
                            if (attrName != 'undefined') {
                                $(el).attr("name", attrName);
                            }
                        }
                        if (fresh == true) {
                            $(el).attr('value', '');
                        }

                        $(el).attr('id', generateId($(el).attr('name')));
                        $(el).parent().find('label').attr('for', generateId($(el).attr('name')));
                    })

                    var itemClone = items;

                    /* Handling remove btn */
                    var removeButton = itemClone.find('.remove-btn');

                    if (key == 0) {
                        removeButton.attr('disabled', true);
                    } else {
                        removeButton.attr('disabled', false);
                    }

                    removeButton.attr('onclick', '$(this).parents(\'.items\').remove()');

                    var newItem = $("<div class='items'>" + itemClone.html() + "<div/>");
                    newItem.attr('data-index', key)

                    newItem.appendTo(repeater);
                };

                /* find elements */
                var repeater = this;
                var items = repeater.find(".items");
                var key = 0;
                var addButton = $('.repeater-add-btn');

                items.each(function (index, item) {
                    item.remove();

                    if (hasOption('showFirstItemToDefault') && option('showFirstItemToDefault') == true) {
                        addItem($(item), key);
                        key++;
                    } else {
                        if (items.length > 1) {
                            addItem($(item), key);
                            key++;
                        }
                    }
                });

                /* handle click and add items */
                addButton.on("click", function () {
                    addItem($(items[0]), key);
                    key++;
                });
            }
        });

    </script>


    <script type="text/javascript">
        $(function(){

            $("#repeater").createRepeater();
            $( ".repeater-add-btn" ).click();


        });
    </script>

@endsection

