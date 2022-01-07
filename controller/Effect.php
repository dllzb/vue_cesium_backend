<?php
namespace addons\cesiummapv\controller;

use app\common\controller\Api;
/**
 * 效果类
 * Class Effect
 * @package addons\cesiummapv\controller
 */
class Effect extends Api
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
     * @ApiTitle    (获得点效果集合列表)
     * @ApiSummary  (获得点效果集合列表)
     * @ApiMethod   (GET)
     * @ApiReturn   ({"code":1,"msg":"","data":[]})
     */
    public function getPointsEffectList()
    {
        $data = \addons\cesiummapv\model\Effect::where('onswitch', 1)->select();
        $this->success('', $data);
    }

    /**
     * @ApiTitle    (获得线效果集合列表)
     * @ApiSummary  (获得线效果集合列表)
     * @ApiMethod   (GET)
     * @ApiReturn   ({"code":1,"msg":"","data":[]})
     */
    public function getLinesEffectList()
    {
        $data = \addons\cesiummapv\model\Lines::where('showswitch', 1)->select();
        $this->success('', $data);
    }
}