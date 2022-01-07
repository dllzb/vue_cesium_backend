<?php
namespace addons\cesiummapv\controller;

use app\common\controller\Api;

/**
 * 模型类
 * Class Primitive
 * @package addons\cesiummapv\controller
 */
class Primitive extends Api
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
     * @ApiTitle    (获得glft模型集合列表)
     * @ApiSummary  (获得glft模型集合列表)
     * @ApiMethod   (GET)
     * @ApiReturn   ({"code":1,"msg":"","data":[]})
     */
    public function getPrimitivesList()
    {
        $data = \addons\cesiummapv\model\Modelist::where('showswitch', 1)->select();
        $this->success('', $data);
    }

}