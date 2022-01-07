define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'cesiummapv/mapimagery/index' + location.search,
                    add_url: 'cesiummapv/mapimagery/add',
                    edit_url: 'cesiummapv/mapimagery/edit',
                    del_url: 'cesiummapv/mapimagery/del',
                    multi_url: 'cesiummapv/mapimagery/multi',
                    import_url: 'cesiummapv/mapimagery/import',
                    table: 'cesiummapv_mapimagery',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'weigh',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'name', title: __('Name'), operate: 'LIKE'},
                        {
                            field: 'type', title: __('Type'), searchList: {
                                "ArcGisMapServerImageryProvider": __('Type arcgismapserverimageryprovider'),
                                "BingMapsImageryProvider": __('Type bingmapsimageryprovider'),
                                "OpenStreetMapImageryProvider": __('Type openstreetmapimageryprovider'),
                                "TileMapServiceImageryProvider": __('Type tilemapserviceimageryprovider'),
                                "GoogleEarthEnterpriseImageryProvider": __('Type googleearthenterpriseimageryprovider'),
                                "GoogleEarthEnterpriseMapsProvider": __('Type googleearthenterprisemapsprovider'),
                                "GridImageryProvider": __('Type gridimageryprovider'),
                                "IonImageryProvider": __('Type ionimageryprovider'),
                                "MapboxImageryProvider": __('Type mapboximageryprovider'),
                                "MapboxStyleImageryProvider": __('Type mapboxstyleimageryprovider'),
                                "SingleTileImageryProvider": __('Type singletileimageryprovider'),
                                "TileCoordinatesImageryProvider": __('Type tilecoordinatesimageryprovider'),
                                "UrlTemplateImageryProvider": __('Type urltemplateimageryprovider'),
                                "WebMapServiceImageryProvider": __('Type webmapserviceimageryprovider'),
                                "WebMapTileServiceImageryProvider": __('Type webmaptileserviceimageryprovider')
                            }, formatter: Table.api.formatter.normal
                        },
                        {
                            field: 'invertswitch',
                            title: __('Invertswitch'),
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
                            field: 'showswitch',
                            title: __('Showswitch'),
                            searchList: {"1": __('Yes'), "0": __('No')},
                            table: table,
                            formatter: Table.api.formatter.toggle
                        },
                        {field: 'weigh', title: __('Weigh'), operate: false},
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
                    $('#c-filterRGB').val(data.color)
                    $('#c-invertswitch').val(data.invertColor ? 1 : 0)
                    if (!data.invertColor) {
                        $('#c-invertswitch-ai').addClass('fa-flip-horizontal')
                        $('#c-invertswitch-ai').addClass('text-gray')
                    } else {
                        $('#c-invertswitch-ai').removeClass('fa-flip-horizontal')
                        $('#c-invertswitch-ai').removeClass('text-gray')
                    }
                    var interfaceConfigJson = JSON.stringify(data.interfaceConfig)
                    $(".fieldlist textarea[name='row[interfaceConfig]']").val(interfaceConfigJson)
                    $(".fieldlist textarea[name='row[interfaceConfig]']").text(interfaceConfigJson)
                    $(".fieldlist textarea[name='row[interfaceConfig]']").trigger("fa.event.refreshfieldlist")
                    Layer.close(LayerID)
                })
                $('#Vdata_bt').click(function () {
                    var urlArr = $('#c-classConfig').val()
                    if (!urlArr) {
                        urlArr = "{}"
                    }
                    urlArr = JSON.parse(urlArr)
                    if (Object.getOwnPropertyNames(urlArr).length === 0) {
                        Layer.alert("请填写正确的底图参数");
                        return
                    }
                    var that = this;
                    $(window.parent.$.find('.layui-layer-btn.layui-layer-footer')).hide()

                    var urlParam = '?urlArr=' + encodeURIComponent(JSON.stringify(urlArr))
                    urlParam += '&interfaceConfig=' + encodeURIComponent($('#c-interfaceConfig').val())
                    urlParam += '&invertColor=' + $('#c-invertswitch').val()
                    urlParam += '&color=' + $('#c-filterRGB').val()
                    urlParam += '&type=' + $('#c-type').val()
                    var content = ['http://localhost:8080/assets/addons/cesiummapv/vue3/#/imagery' + urlParam]
                    if(!Config.frontDebugger){
                        content = isEdit ? ['../../../../../addons/cesiummapv#/imagery' + urlParam] : ['../../../addons/cesiummapv#/imagery' + urlParam]
                    }
                    LayerID = Layer.open({
                        type: 2,
                        title: '图层管理',
                        closeBtn: 1, //不显示关闭按钮
                        shade: [0],
                        offset: 'auto', //右下角弹出
                        area: ['100%', '100%'],
                        maxmin: true, //开启最大化最小化按钮
                        anim: 2,
                        content: content,
                        end: function () {
                            $(window.parent.$.find('.layui-layer-btn.layui-layer-footer')).show()
                        },
                        success: function (layero, index) {
                        },
                        cancel: function (index, layero) {
                        },
                    });
                })
            }
        }
    };
    return Controller;
});