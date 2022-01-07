<?php

namespace app\admin\model\cesiummapv;

use think\Model;


class Pointeffect extends Model
{

    

    

    // 表名
    protected $name = 'cesiummapv_pointeffect';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'effect_type_text'
    ];
    

    
    public function getEffectTypeList()
    {
        return ['CircleDiffusion' => __('Effect_type circlediffusion'), 'Scanline' => __('Effect_type Scanline'), 'CircleScan' => __('Effect_type circlescan'), 'CircleWave' => __('Effect_type circlewave'), 'HexagonSpread' => __('Effect_type hexagonspread'), 'SpreadWall' => __('Effect_type spreadwall')];
    }


    public function getEffectTypeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['effect_type']) ? $data['effect_type'] : '');
        $valueArr = explode(',', $value);
        $list = $this->getEffectTypeList();
        return implode(',', array_intersect_key($list, array_flip($valueArr)));
    }

    protected function setEffectTypeAttr($value)
    {
        return is_array($value) ? implode(',', $value) : $value;
    }


}
