<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Application;

class TestsController extends Controller
{
    public function index(): Factory|Application|View
    {
        return view('tests.index');
    }

    public function login(Request $request): Factory|Application|View
    {
        if ($request->isMethod('POST')) {
            dd($request->all());
        }
        return view('tests.login');
    }

}
