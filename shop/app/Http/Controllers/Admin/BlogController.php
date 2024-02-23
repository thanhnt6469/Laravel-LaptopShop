<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use App\Http\Services\Blog\BlogAdminService;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogAdminService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function create(){
        return view('admin.blog.add', [
            'title' => 'Add New Blogs',
            'menus' => $this->blogService->getMenu()
        ]);
    }

    public function store(BlogRequest $request){
        $this->blogService->insert($request);

        return redirect()->back();
    }

    public function index(){
        return view('admin.blog.list',[
            'title' => 'New Blog List',
            'blogs' => $this->blogService->get()
        ]);
    }

    public function show(Blog $blog){
        return view('admin.blog.edit',[
            'title' => 'Edit Blogs',
            'blog' => $blog,
            'menus' => $this->blogService->getMenu()
        ]);
    }

    public function update(Request $request, Blog $blog){
        $result = $this->blogService->update($request, $blog);
        if ($result) {
            return redirect('/admin/blogs/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request){
        $result = $this->blogService->delete($request);

        if ($result){
            return response()->json([
                'error' => false,
                'message' => 'Blog deleted successfully.'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
