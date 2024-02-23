<?php


namespace App\Http\Services\Blog;


use App\Models\Menu;
use App\Models\Blog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BlogAdminService
{
    public function getMenu()
    {
        return Menu::where('active', 1)
                    ->where('parent_id',5)
                    ->get();
    }

    public function insert($request)
    {
        try {
            $request->except('_token');
            Blog::create($request->all());

            Session::flash('success', 'Add Blog successfully');
        } catch (\Exception $err) {
            Session::flash('error', 'Add Defective Blog');
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }

    public function get()
    {
        return Blog::with('menu')
            ->orderByDesc('id')->paginate(15);
    }

    public function update($request, $Blog)
    {
        try {
            $Blog->fill($request->input());
            $Blog->save();
            Session::flash('success', 'Update successful');
        } catch (\Exception $err) {
            Session::flash('error', 'There was an error, please try again');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $Blog = Blog::where('id', $request->input('id'))->first();
        if ($Blog) {
            $Blog->delete();
            return true;
        }

        return false;
    }
}