<?php
namespace addons\cesiummapv\model;
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

}
