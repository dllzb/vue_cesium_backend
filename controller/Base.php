<?php

namespace addons\cesiummapv\controller;

use app\common\controller\Api;
use addons\cesiummapv\model\Config as ConfigModel;

header('Access-Control-Allow-Origin:*');//允许跨域
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('Access-Control-Allow-Headers:x-requested-with,content-type,token');//浏览器页面ajax跨域请求会请求2次，第一次会发送OPTIONS预请求,不进行处理，直接exit返回，但因为下次发送真正的请求头部有带token，所以这里设置允许下次请求头带token否者下次请求无法成功
    exit("ok");
}
/**
 * 地图基础类
 * Class Base
 * @package addons\cesiummapv\controller
 */
class Base extends Api
{
    /**
     * 无需鉴权的方法,但需要登录
     * @var array
     */
    protected $noNeedRight = ['*'];
    /**
     * 无需登录的方法
     * @var array
     */
    protected $noNeedLogin = ['*'];

    public function _initialize()
    {
        parent::_initialize();
    }

    /**
     * @ApiTitle    (获得地图配置信息)
     * @ApiSummary  (获得地图配置信息)
     * @ApiMethod   (GET)
     * @ApiReturn   ({"code":1,"msg":"","data":[]})
     */
    public function getMapConfig()
    {
        $data = ConfigModel::getBaseMapConfig();
        $this->success('', $data);
    }

    /**
     * @ApiTitle    (获得地图初始化视角配置)
     * @ApiSummary  (获得地图初始化视角配置)
     * @ApiMethod   (GET)
     * @ApiReturn   ({"code":1,"msg":"","data":[]})
     */
    public function getMapView()
    {
        $data = ConfigModel::getMapView();
        $this->success('', $data);
    }

    /**
     * @ApiTitle    (获得地图图层列表)
     * @ApiSummary  (获得地图图层列表)
     * @ApiMethod   (GET)
     * @ApiReturn   ({"code":1,"msg":"","data":[]})
     */
    public function getMapImageryList()
    {
        $data = \addons\cesiummapv\model\Mapimagery::where('showswitch', 1)->order(['weigh' => 'desc'])->select();
        $this->success('', $data);
    }

    /**
     * @ApiTitle    (设置地图图层列表)
     * @ApiSummary  (设置地图图层列表)
     * @ApiMethod   (POST)
     * @ApiParams   (name="lat", type=float, required=true, description="精度")
     * @ApiParams   (name="lng", type=float, required=true, description="维度")
     * @ApiParams   (name="height", type=float, required=true, description="高度")
     * @ApiParams   (name="direction", type=object, required=true, description="方向", sample="{'x':'float','y':'float','z':'float'}")
     * @ApiParams   (name="up", type=object, required=true, description="高位", sample="{'x':'float','y':'float','z':'float'}")
     * @ApiReturn   ({"code":1,"msg":"","data":[]})
     */
    public function setMapView()
    {
        $data = [];
        $lat = $this->request->post('lat', null);
        if ($lat != null) {
            $data = array('value' => $lat);
            ConfigModel::update($data,['name' => 'lat']);
        }
        $lng = $this->request->post('lng', null);
        if ($lng != null) {
            $data = array('value' => $lng);
            ConfigModel::update($data,['name' => 'lng']);
        }
        $height = $this->request->post('height', null);
        if ($height != null) {
            $data = array('value' => $height);
            ConfigModel::update($data,['name' => 'height']);
        }
        $direction = $this->request->post('direction/a', null);
        if($direction != null){
            $data = array('value' => $direction['x']);ConfigModel::update($data,['name' => 'direction_x']);
            $data = array('value' => $direction['y']);ConfigModel::update($data,['name' => 'direction_y']);
            $data = array('value' => $direction['z']);ConfigModel::update($data,['name' => 'direction_z']);
        }
        $up = $this->request->post('up/a', null);
        if($up != null){
            $data = array('value' => $up['x']);ConfigModel::update($data,['name' => 'up_x']);
            $data = array('value' => $up['y']);ConfigModel::update($data,['name' => 'up_y']);
            $data = array('value' => $up['z']);ConfigModel::update($data,['name' => 'up_z']);
        }
        $data = $this->request->post();
        $this->success('成功', $data);
    }
}
