<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class UsersController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show', [$user]);
    }

    public function create()
    {
    	return view('users.create');
    }

    public function show(User $user)
    {
       return view('users.show', compact('user'));
    }


}

/*
use Illuminate\Http\Request 是引入Http请求Request类，由服务容器自动创建一个Request实例。
use App\Http\Requests 是引入表单验证命名空间下所有的类。因该注册页面将来会涉及到表单验证，所以有必要按规范先引入。可以使用命令行：php artisan make:request yourRquestRules创建你自己的表单验证规则。
详见文档：请求、表单验证两章。教程哪会犯这么简单的错误
*/

