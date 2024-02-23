<?php


namespace App\Http\Services\Product;


use App\Models\Product;

class ProductService
{
    const LIMIT = 8;

    public function get($page = null)
    {
        return Product::select('id', 'name', 'description', 'content', 'menu_id', 'price', 'price_sale', 'thumb')
            ->orderByDesc('id')
            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * self::LIMIT);
            })
            ->limit(self::LIMIT)
            ->get();
    }

    public function getPrice($minValue = null, $maxValue = null)
    {
        return Product::select('id', 'name', 'description', 'content', 'menu_id', 'price', 'price_sale', 'thumb')
            ->where(function ($query) use ($minValue, $maxValue) {
                $query->whereBetween('price', [$minValue, $maxValue])
                    ->orWhereBetween('price_sale', [$minValue, $maxValue]);
            })
            ->orderByDesc('id')
            ->paginate(9);
    }

    public function getPriceId($menuId, $minValue = null, $maxValue = null)
    {
        return Product::select('id', 'name', 'description', 'content', 'menu_id', 'price', 'price_sale', 'thumb')
            ->where('menu_id', $menuId)
            ->where(function ($query) use ($minValue, $maxValue) {
                $query->whereBetween('price', [$minValue, $maxValue])
                    ->orWhereBetween('price_sale', [$minValue, $maxValue]);
            })
            ->orderByDesc('id')
            ->paginate(9);
    }

    public function getAll()
    {
        return Product::select('id', 'name', 'description', 'content', 'menu_id', 'price', 'price_sale', 'thumb')
            ->orderByDesc('id')
            ->paginate(9);
    }

    public function getAllProduct()
    {
        return Product::select('id', 'name', 'description', 'content', 'menu_id', 'price', 'price_sale', 'thumb')
            ->orderByDesc('id')
            ->get();
    }

    public function topDeal()
    {
        return Product::select('id', 'name', 'description', 'content', 'menu_id', 'price', 'price_sale', 'thumb')
            ->orderByRaw('(price - price_sale) / price DESC')
            ->limit(5)
            ->get();
    }


    public function show($id)
    {
        return Product::where('id', $id)
            ->where('active', 1)
            ->with('menu')
            ->firstOrFail();
    }

    public function more($id)
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
}
