<?php

namespace App\Http\Controllers;

use App\Http\Services\Blog\BlogService;
use Illuminate\Http\Request;

class BlogDetailController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index($id = '', $slug = '')
    {
        $blog = $this->blogService->showDetail($id);

        return view('blogs.content', [
            'title' => $blog->name,
            'blog' => $blog,
            'latests' => $this->blogService->latestPost(),
            'menus' => $this->blogService->getMenuCounts()
        ]);
    }
}
