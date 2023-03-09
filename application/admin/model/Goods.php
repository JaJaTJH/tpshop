<?php

namespace app\admin\model;

use think\Model;
use app\admin\model\Goods as GoodsModel;
use traits\model\SoftDelete;

class Goods extends Model
{
    //特殊表：没有前缀或者前缀特殊或者模型名称和数据表名称不对应
    //需要单独设置table的属性；就是完整的数据表名称
    // protected $tables = 'think_goods';

    //设置使用软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';
}
