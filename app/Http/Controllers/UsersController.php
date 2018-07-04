<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class UsersController extends Controller
{
    public function create()
    {
    	return view('users.create');
    }
}

/*
use Illuminate\Http\Request 是引入Http请求Request类，由服务容器自动创建一个Request实例。
use App\Http\Requests 是引入表单验证命名空间下所有的类。因该注册页面将来会涉及到表单验证，所以有必要按规范先引入。可以使用命令行：php artisan make:request yourRquestRules创建你自己的表单验证规则。
详见文档：请求、表单验证两章。教程哪会犯这么简单的错误
*/

