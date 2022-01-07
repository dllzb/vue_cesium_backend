<?php

namespace addons\cesiummapv\model;

use think\Model;

class Modelist extends Model
{
    // 表名
    protected $name = 'cesiummapv_modellist';

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
    ];

}
