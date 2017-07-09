<?php
/**
 * Created by PhpStorm.
 * User: XZF
 * Date: 2017/7/9
 * Time: 14:16
 */

namespace app\demo\model;


use think\Model;

class User extends Model
{
    protected $autoWriteTimestamp = true;

    protected $insert = ['status' => 1];

    public function profile()
    {
        return $this->hasOne('Profile');
    }

    public function books()
    {
        return $this->hasMany('Book');
    }

}