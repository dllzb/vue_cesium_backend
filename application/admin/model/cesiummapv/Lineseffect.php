<?php

namespace app\admin\model\cesiummapv;

use think\Model;


class Lineseffect extends Model
{

    

    

    // 表名
    protected $name = 'cesiummapv_lineseffect';
    
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
        return ['FlyLines' => __('Type flylines'), 'RoadPic' => __('Type roadpic'), 'BusLines' => __('Type buslines')];
    }


    public function getTypeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['type']) ? $data['type'] : '');
        $list = $this->getTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
