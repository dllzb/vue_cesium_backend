<?php
namespace addons\cesiummapv\controller;
use think\addons\Controller;
class Index extends Controller
{
    public function index()
    {
        //$this->error("当前插件暂无前台页面");
        return $this->view->fetch('vue3');
    }
}