<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Application;

// 命名 IndexController 用于处理首页、默认页相关的功能 // 所以方法名用 home 命名
class IndexController extends Controller
{
    /**
     * Display the home page
     *
     * @return Factory|Application|View
     */
    public function home(): Factory|Application|View
    {
        return view('index.home');
    }
}
