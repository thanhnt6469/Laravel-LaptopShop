<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }

    public function create(){
        return view('admin.product.add', [
            'title' => 'Add New Products',
            'menus' => $this->productService->getMenu(),
            'menuss' => $this->productService->getMenuChild()
        ]);
    }

    public function store(ProductRequest $request){
        $this->productService->insert($request);

        return redirect()->back();
    }

    public function index(){
        return view('admin.product.list',[
            'title' => 'New Product List',
            'products' => $this->productService->get()
        ]);
    }

    public function show(Product $product){
        return view('admin.product.edit',[
            'title' => 'Edit Products',
            'product' => $product,
            'menus' => $this->productService->getMenu(),
            'menuss' => $this->productService->getMenuChild()
        ]);
    }

    public function update(Request $request, Product $product){
        $result = $this->productService->update($request, $product);
        if ($result) {
            return redirect('/admin/products/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request){
        $result = $this->productService->delete($request);

        if ($result){
            return response()->json([
                'error' => false,
                'message' => 'Product deleted successfully.'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
