<?php

namespace app\admin\controller\cesiummapv;

use app\common\controller\Backend;
use addons\cesiummapv\model\Config as ConfigModel;

/**
 * 线坐标效果集合
 *
 * @icon fa fa-circle-o
 */
class Lineseffect extends Backend
{
    
    /**
     * Lineseffect模型对象
     * @var \app\admin\model\cesiummapv\Lineseffect
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\cesiummapv\Lineseffect;
        $this->view->assign("typeList", $this->model->getTypeList());
        $this->assignconfig("frontDebugger",ConfigModel::getByName('frontDebugger')['value'] == "1");
    }

    public function import()
    {
        parent::import();
    }

    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    

}
