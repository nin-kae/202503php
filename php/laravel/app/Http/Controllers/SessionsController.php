<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse; // 重定向响应：服务器返回的一个“跳转到另一个页面”的响应对象
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector; // 重定向器：他不直接跳转，而是帮你构造跳转的指令
use JetBrains\PhpStorm\NoReturn; // 这个函数不会返回结果，它会直接中断或结束程序（可以在日志中记录异常）

// SessionsController 负责用户登录与退出的控制器
class SessionsController extends Controller
{
    /**
     * Show the login form.
     *
     * @return Factory|Application|View
     */
    public function create(): Factory|Application|View
    {
        return view('sessions.login');
    }

    /**
     * Log the user in.
     *
     * @param Request $request
     * @return void
     */
    #[NoReturn] public function store(Request $request): void
    {
        dd($request->all());
        # todo validate the request and log the user in
    }

    /**
     * Log the user out and redirect to the login page.
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(): Application|Redirector|RedirectResponse
    {
        auth()->logout();
        return redirect('/login');
    }
}
