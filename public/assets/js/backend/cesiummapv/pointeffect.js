define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'cesiummapv/pointeffect/index' + location.search,
                    add_url: 'cesiummapv/pointeffect/add',
                    // add_url: 'http://localhost:8080/#/Effect',
                    edit_url: 'cesiummapv/pointeffect/edit',
                    // edit_url: 'http://localhost:8080/#/Effect?duration=2000&color=rgba(255,%206,%202,%200.6)&position=113.9103,22.5116,0',
                    del_url: 'cesiummapv/pointeffect/del',
                    multi_url: 'cesiummapv/pointeffect/multi',
                    import_url: 'cesiummapv/pointeffect/import',
                    table: 'cesiummapv_pointeffect',
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
                            field: 'effect_type',
                            title: __('Effect_type'),
                            searchList: {
                                "CircleDiffusion": __('Effect_type circlediffusion'),
                                'Scanline': __('Effect_type Scanline'),
                                "CircleScan": __('Effect_type circlescan'),
                                "CircleWave": __('Effect_type circlewave'),
                                "HexagonSpread": __('Effect_type hexagonspread'),
                                "SpreadWall": __('Effect_type spreadwall')
                            },
                            operate: 'FIND_IN_SET',
                            formatter: Table.api.formatter.label
                        },
                        {field: 'lon', title: __('Lon'), operate: 'BETWEEN'},
                        {field: 'lat', title: __('Lat'), operate: 'BETWEEN'},
                        {field: 'height', title: __('Height')},
                        {
                            field: 'onswitch',
                            title: __('Onswitch'),
                            searchList: {"1": __('Yes'), "0": __('No')},
                            table: table,
                            formatter: Table.api.formatter.toggle
                        },
                        {field: 'color', title: __('Color'), operate: 'LIKE'},
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
                    $('#c-lon').val(data.positionx)
                    $('#c-lat').val(data.positiony)
                    $('#c-height').val(data.positionz)
                    $('#c-color').val(data.color)
                    $('#c-radius').val(data.maxRadius)
                    $('#c-duration').val(data.duration)
                    $('#c-effect_type').selectpicker('val', data.selEffect)
                    $('#c-ext').val(`{"waveCount":${data.waveCount},"step":${data.step},"height":${data.height},"edgeCount":${data.edgeCount} }`)
                    Layer.close(LayerID)
                })

                $('#Vdata_bt').click(function () {
                    var that = this;
                    $(window.parent.$.find('.layui-layer-btn.layui-layer-footer')).hide()
                    // debugger
                    // $(window.parent.$.find('.layui-layer-content')).height('100%')
                    var urlParam = '?position=' + $('#c-lon').val() + ',' + $('#c-lat').val() + ',' + $('#c-height').val()
                    urlParam += '&color=' + $('#c-color').val()
                    urlParam += '&maxRadius=' + $('#c-radius').val()
                    urlParam += '&duration=' + $('#c-duration').val()
                    urlParam += '&selEffect=' + $('#c-effect_type').val()
                    var ext = $('#c-ext').val()
                    ext = JSON.parse(ext)
                    if (ext.waveCount !== undefined) {
                        urlParam += '&waveCount=' + ext.waveCount
                    }
                    if (ext.step !== undefined) {
                        urlParam += '&step=' + ext.step
                    }
                    if (ext.height !== undefined) {
                        urlParam += '&height=' + ext.height
                    }
                    if (ext.edgeCount !== undefined) {
                        urlParam += '&edgeCount=' + ext.edgeCount
                    }
                    var content = ['http://localhost:8080/assets/addons/cesiummapv/vue3/#/Effect' + urlParam]
                    if(!Config.frontDebugger){
                        content = isEdit ? ['../../../../../addons/cesiummapv#/Effect' + urlParam] : ['../../../addons/cesiummapv#/Effect' + urlParam]
                    }
                    LayerID = Layer.open({
                        type: 2,
                        title: '点效果集合管理',
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
            }
        }
    };
    return Controller;
});