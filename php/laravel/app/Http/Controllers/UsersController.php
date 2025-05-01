<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUserMail;
use Illuminate\Support\Facades\Auth;

// UsersController 负责处理用户相关操作的控制器
class UsersController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return Factory|Application|View
     */
    public function create(): Factory|Application|View
    {
        return view('users.create');
    }

    /**
     * Store a new user.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        // dd($request->all());
        # todo validate the request and create a new user
        # todo send a welcome email to the user
        # todo log the user in
        // $validated 已验证的变量名
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // bctypt 是加密密码的算法，用来保护用户的登录密码
        ]);

        // 发送欢迎邮件
        Mail::to($user->email)->send(new WelcomeUserMail($user));

        // 登录
        Auth::login($user);

        // 跳转
        return redirect('/dashboard');
    }

    /**
     * Show the user profile.
     *
     * @param int|null $id
     * @return void
     */
    public function show(?int $id): View
    {
        # todo get the user by id and return the view
        $user = User::findOrFail($id); // 获取用户，如果找不到会抛 404
        return view('users.show', ['id' => $id], compact('user')); // 返回视图并传递 user 变量
    }
}
