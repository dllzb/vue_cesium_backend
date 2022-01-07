define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'cesiummapv/modelist/index' + location.search,
                    add_url: 'cesiummapv/modelist/add',
                    edit_url: 'cesiummapv/modelist/edit',
                    del_url: 'cesiummapv/modelist/del',
                    multi_url: 'cesiummapv/modelist/multi',
                    import_url: 'cesiummapv/modelist/import',
                    table: 'cesiummapv_modellist',
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
                        {field: 'name', title: __('Name'), operate: 'LIKE'},
                        {
                            field: 'showswitch',
                            title: __('Showswitch'),
                            searchList: {"1": __('Yes'), "0": __('No')},
                            table: table,
                            formatter: Table.api.formatter.toggle
                        },
                        {field: 'positionLon', title: __('Positionlon'), operate: 'BETWEEN'},
                        {field: 'positionLat', title: __('Positionlat'), operate: 'BETWEEN'},
                        {field: 'height', title: __('Height')},
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
                $(".btn-edit").data("area", ["100%", "100%"]);
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
            Controller.api.selectedBingEvent(false);
        },
        edit: function () {
            Controller.api.bindevent();
            Controller.api.selectedBingEvent(true);
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            },
            selectedBingEvent: function (isEdit) {
                var LayerID = null;
                //父窗体中监听消息
                window.addEventListener('message', function (e) {
                    var data = e.data;
                    $('#c-color').val(data.color)
                    $('#c-colorModelist').selectpicker('val', data.colorMode)
                    $('#c-duration').val(data.duration)
                    $('#c-rotateSpeed').val(data.rotateSpeed)
                    $('#c-latRotation').val(data.LatRotation)
                    $('#c-positionLon').val(data.positionLon)
                    $('#c-positionLat').val(data.positionLat)
                    $('#c-height').val(data.height)
                    $('#c-scale').val(data.scale)
                    $('#c-minimumPixelSize').val(data.minimumPixelSize)

                    Layer.close(LayerID)
                })
                $('#Vdata_bt').click(function () {
                    var that = this;
                    $(window.parent.$.find('.layui-layer-btn.layui-layer-footer')).hide()
                    var urlParam = ''
                    var modelUlr = $('#c-url').val()
                    if (!modelUlr) {
                        Layer.alert("请填写正确的模型地址");
                        return
                    }
                    urlParam += '?url=' + encodeURI(modelUlr)
                    urlParam += '&color=' + $('#c-color').val()
                    urlParam += '&colorMode=' + $('#c-colorModelist').val()
                    urlParam += '&duration=' + $('#c-duration').val()
                    urlParam += '&rotateSpeed=' + $('#c-rotateSpeed').val()
                    urlParam += '&LatRotation=' + $('#c-latRotation').val()
                    urlParam += '&positionLon=' + $('#c-positionLon').val()
                    urlParam += '&positionLat=' + $('#c-positionLat').val()
                    urlParam += '&height=' + $('#c-height').val()
                    urlParam += '&scale=' + $('#c-scale').val()
                    urlParam += '&minimumPixelSize=' + $('#c-minimumPixelSize').val()

                    var content = ['http://localhost:8080/assets/addons/cesiummapv/vue3/#/model' + urlParam]
                    if(!Config.frontDebugger){
                        content = isEdit ? ['../../../../../addons/cesiummapv#/model' + urlParam] : ['../../../addons/cesiummapv#/model' + urlParam]
                    }
                    LayerID = Layer.open({
                        type: 2,
                        title: '模型管理',
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