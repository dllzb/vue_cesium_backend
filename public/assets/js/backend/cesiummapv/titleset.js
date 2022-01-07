define(['jquery', 'bootstrap', 'backend', 'table', 'form', 'docs'], function ($, undefined, Backend, Table, Form, docs) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'cesiummapv/titleset/index' + location.search,
                    add_url: 'cesiummapv/titleset/add',
                    edit_url: 'cesiummapv/titleset/edit',
                    del_url: 'cesiummapv/titleset/del',
                    multi_url: 'cesiummapv/titleset/multi',
                    import_url: 'cesiummapv/titleset/import',
                    table: 'fa_cesiummapv_titleset',
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
                        {field: 'name', title: __('名称')},
                        {
                            field: 'onswitch',
                            title: __('Onswitch'),
                            searchList: {"1": __('Yes'), "0": __('No')},
                            table: table,
                            formatter: Table.api.formatter.toggle
                        },
                        {
                            field: 'flytoswitch',
                            title: __('Flytoswitch'),
                            searchList: {"1": __('Yes'), "0": __('No')},
                            table: table,
                            formatter: Table.api.formatter.toggle
                        },
                        {field: 'color', title: __('Color'), operate: 'LIKE'},
                        {
                            field: 'effectswitch',
                            title: __('Effectswitch'),
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
        },
        add: function () {
            Controller.api.bindevent();
            Controller.api.common_vue_effect_set(false);
        },
        edit: function () {
            Controller.api.bindevent();
            Controller.api.common_vue_effect_set(true);
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            },
            common_vue_effect_set: function (isEdit) {
                var LayerID = null;
                //父窗体中监听消息
                window.addEventListener('message', function (e) {
                    var data = e.data;
                    $('#c-offset_x').val(data.offSet_lon)
                    $('#c-offset_y').val(data.offSet_lat)
                    $('#c-offset_z').val(data.offSet_height)
                    $('#c-effectswitch').val(data.effectswitch ? 1 : 0)
                    if (!data.effectswitch) {
                        $('#c-effectswitch-ai').addClass('fa-flip-horizontal')
                        $('#c-effectswitch-ai').addClass('text-gray')
                    } else {
                        $('#c-effectswitch-ai').removeClass('fa-flip-horizontal')
                        $('#c-effectswitch-ai').removeClass('text-gray')
                    }
                    $('#c-height').val(data.effect_height)
                    $('#c-effect_color').val(data.effect_color)
                    $("#c-color").spectrum("set", data.color);
                    $('#c-color').val(data.color)

                    Layer.close(LayerID)
                })
                $('#Vdata_bt').click(function () {
                    var url = $('#c-url').val()
                    if (!url) {
                        Layer.alert("请填写正确的白膜地址");
                        return
                    }
                    $(window.parent.$.find('.layui-layer-btn.layui-layer-footer')).hide()
                    var urlParam = '?url=' + encodeURI(url)
                    urlParam += '&offset_x=' + $('#c-offset_x').val()
                    urlParam += '&offset_y=' + $('#c-offset_y').val()
                    urlParam += '&offset_z=' + $('#c-offset_z').val()
                    urlParam += '&color=' + $('#c-color').val()
                    urlParam += '&height=' + $('#c-height').val()
                    urlParam += '&effectswitch=' + $('#c-effectswitch').val()
                    urlParam += '&effect_color=' + $('#c-effect_color').val()

                    var content = ['http://localhost:8080/assets/addons/cesiummapv/vue3/#/titleset' + urlParam]
                    if(!Config.frontDebugger){
                        content = isEdit ? ['../../../../../addons/cesiummapv#/titleset' + urlParam] : ['../../../addons/cesiummapv#/titleset' + urlParam]
                    }
                    LayerID = Layer.open({
                        type: 2,
                        title: '白膜管理',
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
                            // layero.css('height',(layero.height() + 51) + 'px')
                        },
                        cancel: function (index, layero) {
                            console.log('Layer cancel');
                        },
                    });
                })
            }
        }
    };
    return Controller;
});