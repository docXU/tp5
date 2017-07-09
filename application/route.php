<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
        'id' => '\d+',
        //'email' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

    '[user]' =>[
        'add' => ['demo/User/add', ['method' => 'get']],
        '[:id]' => ['demo/User/read'],
        'update/:id/:email' => ['demo/User/update'],
        'delete/:id' => ['demo/User/delete'],
        'addbook/:id' =>['demo/User/addBook'],
        'addrole/:id/:name/:title' => ['demo/User/addRole']
    ]
];
