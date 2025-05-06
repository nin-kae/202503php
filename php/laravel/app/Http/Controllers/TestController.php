<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Application;

class TestController extends Controller
{
    public function index(): Factory|Application|View
    {
        $data = [
            'name' => 'Laravel',
            'version' => '12.x',
            'authors' => 'Taylor Otwell',
        ];

        $author = 'Mr.Ren';

        $categories = Categories::paginate($this->perPage);

        $html = '<h1 class="text-4xl"Hello World!</h1>';

        // session()->flash('succcess', 'This is a flash message!');

        return view('tests.index');
    }

//    public function login(Request $request): Factory|Application|View
//    {
//        if ($request->isMethod('POST')) {
//            dd($request->all());
//        }
//        return view('tests.login');
//    }

}
