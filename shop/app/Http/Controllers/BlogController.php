<?php

namespace App\Http\Controllers;

use App\Http\Services\Blog\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogs;

    public function __construct(BlogService $blogs)
    {
        $this->blogs = $blogs;
    }

    public function index()
    {
        //dd($this->blogs->getMenuCounts());
        return view('blog', [
            'title' => 'Blog Laptop',
            'blogs' => $this->blogs->getAll(),
            'latests' => $this->blogs->latestPost(),
            'menus' => $this->blogs->getMenuCounts()
        ]);
    }

    public function show($id = '', $name = '')
    {
        //dd($this->blogs->getMenuCounts());
        return view('blog', [
            'title' => 'Blog Laptop',
            'blogs' => $this->blogs->show($id),
            'latests' => $this->blogs->latestPost(),
            'menus' => $this->blogs->getMenuCounts()
        ]);
    }
}
