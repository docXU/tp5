<?php
/**
 * Created by PhpStorm.
 * User: XZF
 * Date: 2017/7/9
 * Time: 15:02
 */

namespace app\demo\controller;

use app\demo\model\User as UserModel;
use app\demo\model\Profile;

use think\Controller;

class User extends Controller
{
    public function add()
    {
        $user = new UserModel;
        $user['name'] = 'thinkphp';
        $user['password'] = '123456';
        $user['nickname'] = 'xxw';
        if ($user->save()) {
            $profile = new Profile;
            $profile['truename'] = '徐雄伟';
            $profile['address'] = 'TKK';
            $profile['birthday'] = '1996-03-20';
            $profile['email'] = '1304924151@qq.com';
            $user->profile()->save($profile);
            return '用户新增成功';
        } else {
            return $user->getError();
        }
    }

    public function read($id)
    {
        $user = UserModel::get($id, 'profile');
        echo $user->name . '<br/>';
        echo $user->profile->truename . '<br/>';
        dump($user);
    }

    public function update($id, $email)
    {
        $user = UserModel::get($id);
        $user->profile['email'] = $email;
        $user->profile->save();
        return '用户[' . $user->name . ']更新邮箱成功';
    }

    public function delete($id)
    {
        $user = UserModel::get($id);
        if ($user->delete()) {
            $user->profile->delete();
            return '用户[' . $user->name . ']删除成功';
        } else {
            return $user->getError();
        }
    }

    public function addBook($id)
    {
        $user = UserModel::get($id);
        $books = [
            ['title' => 'ThinkPHP5快速入门', 'publish_time' => '2016-05-06'],
            ['title' => 'ThinkPHP5开发手册', 'publish_time' => '2016-03-06'],
        ];
        $user->books()->saveAll($books);
        return '添加Book成功';
    }

    public function addRole($id, $name, $title)
    {
        $user = UserModel::get($id);
        $user->roles()->saveAll([
            ['name' => $name, 'title' => $title],
            ['name' => 'admin', 'title' => '管理员'],
        ]);
        return '用户角色增加成功';
    }
}