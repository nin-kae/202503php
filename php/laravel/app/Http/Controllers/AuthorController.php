<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;

class AuthorController extends Controller
{
    protected int $perPage = 10;
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View|Application
    {
        $authors = Author::with('post')->paginate($this->perPage);
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse // 让用户浏览器跳转到另一个页面
     */
    public function store(Request $request): RedirectResponse
    {
        // 'validate' 验证用户提交数据的方法
        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
            'bio' => 'nullable|string|string|max:1000',
        ]);

        Author::create($request->only('name', 'email', 'bio'));

        // session()->flash('success', 'Author created successfully.');
        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author): View
    {
        return view('authors.show', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author): View
    {
        return view('authors.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Author $author): RedirectResponse
    {
        $author->deleteOrFail();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
