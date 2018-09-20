<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product;    
    }

    public function addToCart(Request $request)
    {
        $id = $request->get('product_id');
        $status = '';
        $message = '';
        $product = $this->product->find($id);
        if ($product->quantity > 0) {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'options' => [
                    'img' => $product->image
                ]
            ]);
            $status = 'success';
            $message = 'Item has been added!';
        } else {
            $status = 'warning';
            $message = 'Fail to add item!';
        }
        $totalItems = Cart::count();
        return response()->json([
            'totalItems' => $totalItems,
            'status' => $status,
            'message' => $message,
        ]);
    }

    public function removeItem(Request $request)
    {

    }

    public function updateItem(Request $request)
    {

    }

    public function removeAllItems(Request $request)
    {

    }

}
