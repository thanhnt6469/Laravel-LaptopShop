<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;

class MenuController extends Controller
{
    protected $menuService;
    protected $product;

    public function __construct(MenuService $menuService, ProductService $product)
    {
        $this->menuService = $menuService;
        $this->product = $product;
    }

    public function category(Request $request)
    {
        return view('menu', [
            'title' => '',
            'products' => $this->menuService->getAllProduct($request),
            'menu_parent' => $this->menuService->getParent(),
            'menu_child' => $this->menuService->getChild()
        ]);
    }
    

    public function index(Request $request, $id, $slug = '')
    {
        $menu = $this->menuService->getId($id);
        //dd($menu);
        $products = $this->menuService->getProduct($menu, $request);
        //dd($products);
        return view('menu', [
            'title' => $menu->name,
            'products' => $products,
            //'menu'  => $menu,
            'menu_parent' => $this->menuService->getParent(),
            'menu_child' => $this->menuService->getChild()
        ]);
    }

    public function filterProduct(Request $request)
    {
        $minValue = $request->input('minValue');
        $maxValue = $request->input('maxValue');
        $menuId = $request->input('category');
        //dd($menuId);
        //dd($minPrice,$maxPrice);

        if($menuId && ($minValue && $maxValue)){
            $result = $this->product->getPriceId($menuId, $minValue, $maxValue);
        }
        
        else if ($minValue && $maxValue){
            $result = $this->product->getPrice($minValue, $maxValue);
        }

        //dd($result);
        if (count($result) != 0) {
            $html = view('products.filter', ['products' => $result ])->render();

            return response()->json([ 'html' => $html ]);
        }

        return response()->json(['html' => '' ]);
    }


}