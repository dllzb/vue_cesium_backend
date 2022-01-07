<?php

namespace app\admin\model\cesiummapv;

use think\Model;


class Mapimagery extends Model
{


    // 表名
    protected $name = 'cesiummapv_mapimagery';

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'type_text'
    ];


    public function getTypeList()
    {
        return ['ArcGisMapServerImageryProvider' => __('Type arcgismapserverimageryprovider'), 'BingMapsImageryProvider' => __('Type bingmapsimageryprovider'), 'OpenStreetMapImageryProvider' => __('Type openstreetmapimageryprovider'), 'TileMapServiceImageryProvider' => __('Type tilemapserviceimageryprovider'), 'GoogleEarthEnterpriseImageryProvider' => __('Type googleearthenterpriseimageryprovider'), 'GoogleEarthEnterpriseMapsProvider' => __('Type googleearthenterprisemapsprovider'), 'GridImageryProvider' => __('Type gridimageryprovider'), 'IonImageryProvider' => __('Type ionimageryprovider'), 'MapboxImageryProvider' => __('Type mapboximageryprovider'), 'MapboxStyleImageryProvider' => __('Type mapboxstyleimageryprovider'), 'SingleTileImageryProvider' => __('Type singletileimageryprovider'), 'TileCoordinatesImageryProvider' => __('Type tilecoordinatesimageryprovider'), 'UrlTemplateImageryProvider' => __('Type urltemplateimageryprovider'), 'WebMapServiceImageryProvider' => __('Type webmapserviceimageryprovider'), 'WebMapTileServiceImageryProvider' => __('Type webmaptileserviceimageryprovider')];
    }


    public function getTypeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['type']) ? $data['type'] : '');
        $list = $this->getTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }

    protected static function init()
    {
        self::afterInsert(function ($row) {
            $pk = $row->getPk();
            $row->getQuery()->where($pk, $row[$pk])->update(['weigh' => $row[$pk]]);
        });
    }


}
