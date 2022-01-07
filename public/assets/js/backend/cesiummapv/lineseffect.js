define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'cesiummapv/lineseffect/index' + location.search,
                    add_url: 'cesiummapv/lineseffect/add',
                    edit_url: 'cesiummapv/lineseffect/edit',
                    del_url: 'cesiummapv/lineseffect/del',
                    multi_url: 'cesiummapv/lineseffect/multi',
                    import_url: 'cesiummapv/lineseffect/import',
                    table: 'cesiummapv_lineseffect',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {
                            field: 'type',
                            title: __('Type'),
                            searchList: {
                                "FlyLines": __('Type flylines'),
                                "RoadPic": __('Type roadpic'),
                                "BusLines": __('Type buslines')
                            },
                            formatter: Table.api.formatter.normal
                        },
                        {field: 'width', title: __('Width'), operate: 'BETWEEN'},
                        {field: 'geojsonfile', title: __('Geojsonfile'), operate: false},
                        {
                            field: 'effectimage',
                            title: __('Effectimage'),
                            operate: false,
                            events: Table.api.events.image,
                            formatter: Table.api.formatter.image
                        },
                        {
                            field: 'showswitch',
                            title: __('Showswitch'),
                            searchList: {"1": __('Yes'), "0": __('No')},
                            table: table,
                            formatter: Table.api.formatter.toggle
                        },
                        {
                            field: 'createtime',
                            title: __('Createtime'),
                            operate: 'RANGE',
                            addclass: 'datetimerange',
                            autocomplete: false,
                            formatter: Table.api.formatter.datetime
                        },
                        {
                            field: 'updatetime',
                            title: __('Updatetime'),
                            operate: 'RANGE',
                            addclass: 'datetimerange',
                            autocomplete: false,
                            formatter: Table.api.formatter.datetime
                        },
                        {
                            field: 'operate',
                            title: __('Operate'),
                            table: table,
                            events: Table.api.events.operate,
                            formatter: Table.api.formatter.operate
                        }
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
            //默认编辑窗口大小
            table.on('load-success.bs.table', function (data) {
                $(".btn-add").data("area", ["100%", "100%"]);
                $(".btn-editone").data("area", ["100%", "100%"]);
            });

            $("form.edit-form").data("validator-options", {
                display: function (elem) {
                    return $(elem).closest('tr').find("td:first").text();
                }
            });
            Form.api.bindevent($("form.edit-form"));

            //不可见的元素不验证
            $("form#add-form").data("validator-options", {ignore: ':hidden'});
            Form.api.bindevent($("form#add-form"), null, function (ret) {
                location.reload();
            });

        },
        add: function () {
            Controller.api.bindevent();
            $('#iGeojsonfile').hide();
            $('#iEffectimage').hide();
            Controller.api.selectedBingEvent(false);
        },
        edit: function () {
            Controller.api.bindevent();
            Controller.api.selectedBingEvent(true);
            var selected = $("#c-type").children('option:selected').val();
            Controller.api.selectedShowOrHide(selected);
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            },
            selectedBingEvent: function (isEdit) {
                $("#c-type").change(function () {
                    var selected = $(this).children('option:selected').val();
                    Controller.api.selectedShowOrHide(selected);
                });
                window.addEventListener('message', function (e) {
                    var data = e.data;
                    $('#c-width').val(data.width)
                    delete data.width
                    if (data.bbox) {
                        var data_bbox = JSON.parse(data.bbox)
                        data.startPoint_lng = data_bbox[0]
                        data.startPoint_lat = data_bbox[1]
                        data.endPoint_ing = data_bbox[2]
                        data.endPoint_lat = data_bbox[3]
                        delete data.bbox
                    }
                    $("#c-setupParam").val(JSON.stringify(data))
                    $("#c-setupParam").text(JSON.stringify(data))
                    $(".fieldlist textarea[name='row[setup_param]']").trigger("fa.event.refreshfieldlist");
                    // $("#c-setupParam").trigger("fa.event.refreshfieldlist")
                    Layer.close(LayerID)
                })

                $('#Vdata_bt').click(function () {
                    var that = this;
                    $(window.parent.$.find('.layui-layer-btn.layui-layer-footer')).hide()
                    var urlParam = '?type=' + $('#c-type').val()
                    urlParam += '&width=' + $('#c-width').val()
                    urlParam += '&Effectimage=' + encodeURI($('#c-effectimage').val())
                    urlParam += '&Geojsonfile=' + encodeURI($('#c-geojsonfile').val())
                    var ext = $('#c-setupParam').val()
                    ext = JSON.parse(ext ? ext : '[]')
                    for (let key in ext) {
                        urlParam += '&' + key + '=' + ext[key]
                    }
                    var content = ['http://localhost:8080/assets/addons/cesiummapv/vue3/#/Lines' + urlParam]
                    if(!Config.frontDebugger){
                        content = isEdit ? ['../../../../../addons/cesiummapv#/Lines' + urlParam] : ['../../../addons/cesiummapv#/Lines' + urlParam]
                    }
                    LayerID = Layer.open({
                        type: 2,
                        title: '线效果管理',
                        closeBtn: 1, //不显示关闭按钮
                        shade: [0],
                        offset: 'auto', //右下角弹出
                        area: ['100%', '100%'],
                        maxmin: true, //开启最大化最小化按钮
                        anim: 2,
                        content: content,
                        end: function () {
                            console.log('Layer end');
                            $(window.parent.$.find('.layui-layer-btn.layui-layer-footer')).show()
                        },
                        success: function (layero, index) {
                            console.log('Layer success');
                        },
                        cancel: function (index, layero) {
                            console.log('Layer cancel');
                        },
                    });
                })
            },
            selectedShowOrHide: function (selected) {
                if (selected == 'FlyLines') {
                    $('#iGeojsonfile').hide();
                    $('#iEffectimage').hide();
                } else if (selected == 'RoadPic') {
                    $('#iGeojsonfile').show();
                    $('#iEffectimage').show();
                } else if (selected == 'BusLines') {
                    $('#iGeojsonfile').show();
                    $('#iEffectimage').hide();
                }
            }
        }
    };
    return Controller;
});