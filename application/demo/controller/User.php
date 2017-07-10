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
use think\Model;

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

    public function read($id = "")
    {
        $list = null;
        if ($id !== "") {
            //将对象放到数组里，应该volist是遍历数组的
            $list[0] = UserModel::get($id, 'profile');
        } else {
            $list = UserModel::paginate(3);
        }
        $this->assign('list', $list);
        $this->assign('data', dump($list->toArray(), false));
        $this->assign('count', count($list));
        //动态启动模板布局文件,这里因为已经在read.html里启动布局,所以注释了,无需再执行
        //$this->view->engine->layout('layout/readLayout');
        return $this->fetch();
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