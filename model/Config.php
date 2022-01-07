<?php

namespace addons\cesiummapv\model;

use think\Cache;
use think\Model;

class Config extends Model
{
    // 表名
    protected $name = 'cesiummapv_config';

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
//    protected $createTime = 'createtime';
//    protected $updateTime = 'updatetime';

    /**
     * 获取系统配置
     * @param $name
     * @return mixed|\think\db\Query
     */
    public static function getByName($name)
    {
        if (Cache::has('configGetByName_3d_'. $name)) {
            $config = Cache::get('configGetByName_3d_'. $name);
        } else {
            $config = parent::__callStatic('getByName', [$name]);
            $expire = self::__callStatic('getByName', ['cache_expire'])['value'];
            Cache::set('configGetByName_3d_'. $name, $config, $expire);
        }
        return $config;
    }

    /**
     * 获取地图基本配置
     * @return mixed|\think\db\Query
     */
    public static function getBaseMapConfig()
    {
//        if (Cache::has('configBaseMap_3d')) {
//            $config = Cache::get('configBaseMap_3d');
//        } else {
            $config = self::where('group','map_config')->select();
//            Cache::set('configBaseMap_3d', $config, 3600 * 24);
//        }
        return $config;
    }

    /**
     * 获取地图初始化视角 数据
     * @return mixed|\think\db\Query
     */
    public static function getMapView()
    {
//        if (Cache::has('configMapView_3d')) {
//            $config = Cache::get('configMapView_3d');
//        } else {
            $config = self::where('group','map_view_first')->select();
//            Cache::set('configMapView_3d', $config, 3600 * 24);
//        }
        return $config;
    }
}
