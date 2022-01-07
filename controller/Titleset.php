<?php

namespace addons\cesiummapv\controller;

use app\common\controller\Api;

/**
 * 白膜类
 * Class Titleset
 * @package addons\cesiummapv\controller
 */
class Titleset extends Api
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

    /**
     * @ApiTitle    (获得白膜列表)
     * @ApiSummary  (获得白膜列表)
     * @ApiMethod   (GET)
     * @ApiReturn   ({"code":1,"msg":"","data":[]})
     */
    public function getTitlesetList()
    {
        $data = \addons\cesiummapv\model\Titleset::where('onswitch', 1)->select();
        $this->success('', $data);
    }

    /**
     * @ApiTitle    (获得对应id的白膜)
     * @ApiSummary  (获得对应id的白膜)
     * @ApiMethod   (GET)
     * @ApiParams   (name="id", type=int, required=true, description="id")
     * @ApiReturn   ({"code":1,"msg":"","data":{}})
     */
    public function getOneTitleset()
    {
        $id = $this->request->get('id', 1);
        $data = \addons\cesiummapv\model\Titleset::find()->select($id);
        $this->success('', $data);
    }
}