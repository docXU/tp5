<?php
/**
 * Created by PhpStorm.
 * User: XZF
 * Date: 2017/7/9
 * Time: 16:08
 */

namespace app\demo\model;


use think\Model;

class Role extends Model
{
    public function user()
    {
        return $this->belongsToMany('User', 'access');
    }
}