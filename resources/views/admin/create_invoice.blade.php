@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.clients.title_singular') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("admin.clients.store") }}" enctype="multipart/form-data">
            @csrf
            <div id="repeater">
                <!-- Repeater Heading -->

                <div class="items" data-group="albums">
                    <!-- Repeater Content -->
                    <div class="item-content">
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">English Description</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="descriptions[]"   placeholder="Description"  data-name="descriptions">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmails" class="col-lg-2 control-label">Arabic Description</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="descriptions_ar[]"   placeholder="Arabic Description"  data-name="descriptions_ar">
                            </div>
                        </div>
                    </div>
                    <div class="item-content">
                        <div class="form-group">
                            <label for="inputEmailss" class="col-lg-2 control-label">Image</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="images[]" multiple required data-name="images">
                            </div>
                        </div>
                    </div>

                    <!-- Repeater Remove Btn -->
                    <div class="pull-right repeater-remove-btn">
                        <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">
                            Remove
                        </button>
                    </div>
                </div>

                <div class="repeater-heading">
                    <button type="button" class="btn btn-primary repeater-add-btn">
                        Add More
                    </button>
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

        });
    </script>

@endsection

