<?php


namespace App\Http\Services\Blog;


use App\Models\Blog;

class BlogService
{
    public function getAll()
    {
        return Blog::select('id', 'name', 'description', 'content', 'menu_id', 'thumb', 'created_at')
            ->where('active', 1)
            ->orderBy('created_at')
            ->paginate(10);
    }

    public function latestPost()
    {
        return Blog::select('id', 'name', 'description', 'content', 'menu_id', 'thumb', 'created_at')
            ->where('active', 1)
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();
    }
    
    public function getMenuCounts()
    {
        return Blog::rightJoin('menus', 'blogs.menu_id', '=', 'menus.id')
            ->where('blogs.active', 1)
            ->where('menus.parent_id', '=', 5)
            ->select('blogs.menu_id', 'menus.name', Blog::raw('COUNT(blogs.menu_id) AS menu_count'))
            ->groupBy('menus.name','blogs.menu_id')
            ->get();
    }
    
    public function show($id)
    {
        return Blog::select('id', 'name', 'description', 'content', 'menu_id', 'thumb', 'created_at')
            ->where('menu_id', $id)
            ->where('active', 1)
            ->orderBy('created_at')
            ->paginate(10);
    }

    public function showDetail($id)
    {
        return Blog::where('id', $id)
            ->where('active', 1)
            ->with('menu')
            ->firstOrFail();
    }
}
