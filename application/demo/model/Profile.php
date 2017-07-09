<?php
/**
 * Created by PhpStorm.
 * User: XZF
 * Date: 2017/7/9
 * Time: 15:00
 */

namespace app\demo\model;


use think\Model;

class Profile extends Model
{
    protected $type =[
        'birthday' => 'timestamp:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }

}