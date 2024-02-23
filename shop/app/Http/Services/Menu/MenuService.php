<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class MenuService
{
    public function getParent($parent_id = 0){
        return Menu::where('parent_id',0)->get()->sortByDesc('id');
    }

    public function getChild(){
        $parentIds = Menu::pluck('id'); // Lấy tất cả các id của menu
        return Menu::whereIn('parent_id', $parentIds)->get()->sortBy('id');
    }

    public function getAll(){
        return Menu::orderby('id')->paginate(50);
    }

    public function showAllMenu()
    {
        return Menu::select('id', 'name','parent_id')->get();
    }

    public function show()
    {
        return Menu::select('name', 'id')
            ->where('parent_id', 0)
            ->orderbyDesc('id')
            ->get();
    }
    
    public function create($request){
        try {
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
            ]);

            Session::flash('success', 'Category created successfully.');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $menu) : bool{
        // $menu->fill($request->input()); //quét toàn bộ thông tin request trả lên
        // $menu->save();

        if ($request->input('parent_id') != $menu->id) $menu->parent_id = (int) $request->input('parent_id');
        $menu->name = (string) $request->input('name');
        $menu->description = (string) $request->input('description');
        $menu->content = (string) $request->input('content');
        $menu->active = (string) $request->input('active');
        $menu->save();
        
        Session::flash('success', 'List updated successfully.');
        return true;
    }

    public function destroy($request){
        $id = (int) $request->input('id');
        $menu = Menu::where('id', $id)->first();

        if ($menu){
            return Menu::where('id', $id)->orwhere('parent_id', $id)->delete();
        }

        return false;
    }

    // public function Remove (int $idMenu) {
    //     try {
    //         //Xoá Root
    //         Menu::where('id', $idMenu)->delete();
    //         //Lấy danh sách con của Root
    //         $listMenu = Menu::where('parent_id', $idMenu)->get();
    //         //Duyệt danh sách con
    //         foreach ($listMenu as $menu) {
    //             //Gọi đệ quy
    //             $this->Remove($menu->id);
    //             //Xoá danh sách con
    //             Menu::destroy($menu);
    //         }
    //         return true;
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }

    public function getId($id){
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function getAllProduct($request)
    {
        $query = Product::select('id', 'name', 'description', 'content', 'menu_id', 'price', 'price_sale', 'thumb');
        //dd($request->input('category'));
        if ($request->input('category')){
            $query->where('menu_id', $request->input('category'));
        }

        // Sắp xếp
        $sortOption = $request->input('sort');
        
        if ($sortOption == 'price_asc') {
            $query->orderBy('price_sale', 'asc');
        } elseif ($sortOption == 'price_desc') {
            $query->orderBy('price_sale', 'desc');
        } elseif ($sortOption == 'name_asc') {
            $query->orderBy('name', 'asc');
        } elseif ($sortOption == 'name_desc') {
            $query->orderBy('name', 'desc');
        } else {
            $query->orderByDesc('id');
        }

        // Phân trang
        $perPageOptions = [3, 6, 9, 16, 32];
        $perPage = in_array($request->input('per_page'), $perPageOptions) ? $request->input('per_page') : 9;

        return $query
            ->paginate($perPage)
            ->withQueryString();
    }


    public function getProduct($menu, $request)
    {
        $query = $menu->products()
            ->select('id', 'name', 'description', 'content', 'menu_id', 'price', 'price_sale', 'thumb')
            ->where('active', 1);

        if ($request->input('category') !== null){
            $query->where('name', $request->input('category'));
        }

        // Sắp xếp
        $sortOption = $request->input('sort');
        
        if ($sortOption == 'price_asc') {
            $query->orderBy('price_sale', 'asc');
        } elseif ($sortOption == 'price_desc') {
            $query->orderBy('price_sale', 'desc');
        } elseif ($sortOption == 'name_asc') {
            $query->orderBy('name', 'asc');
        } elseif ($sortOption == 'name_desc') {
            $query->orderBy('name', 'desc');
        } else {
            $query->orderByDesc('id');
        }

        // Phân trang
        $perPageOptions = [3, 6, 9, 16, 32];
        $perPage = in_array($request->input('per_page'), $perPageOptions) ? $request->input('per_page') : 9;

        return $query
            ->paginate($perPage)
            ->withQueryString();
    }



}