<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchBlog(){
        $data = Blog::search()->get();
        return $data;
    }

    public function searchProduct(){
        $data = Product::search()->get();
        return $data;
    }
}