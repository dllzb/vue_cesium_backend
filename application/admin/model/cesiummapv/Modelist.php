<?php

namespace app\admin\model\cesiummapv;

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
        'colorModelist_text'
    ];
    

    
    public function getColormodelistList()
    {
        return ['HIGHLIGHT' => __('Colormodelist highlight'), 'MIX' => __('Colormodelist mix'), 'REPLACE' => __('Colormodelist replace')];
    }


    public function getColormodelistTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['colorModelist']) ? $data['colorModelist'] : '');
        $list = $this->getColormodelistList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
