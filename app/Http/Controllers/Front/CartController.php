<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    protected $product;
    protected $cart_view;
    protected $checkout_view;
    protected $confirm_view;

    public function __construct()
    {
        $this->product = new Product;    
        $this->cart_view = 'frontend.cart';
        $this->checkout_view = 'frontend.checkout';
        $this->confirm_view = 'frontend.confirm';
    }

    public function index(Request $request)
    {
        $cart = Cart::content();
        $options = [
            'cart' => $cart
        ];
        return view($this->cart_view, $options);
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
                'name' => $product->slug,
                'qty' => 1,
                'price' => $product->price,
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
        $rowId = $request->get('id');
        Cart::remove($rowId);
        return response()->json([
            'status' => 'success',
            'message' => 'Product has been removed!'
        ]);
    }

    public function updateItem(Request $request)
    {
        $rowId = $request->get('rowId');
        $product_temp = Product::find(Cart::get($rowId)->id);
        $quantity = $product_temp->quantity;
        $qty = $request->get('qty');
        if ($qty > $quantity) {
            $request->session()->put('cart_qty_key', 'false');
            return response()->json([
                'qty' => $qty,
                'status' => 'fail',
                'message' => 'Maximum products reached!',
            ]);
        } else {
            $request->session()->forget('cart_qty_key');
            Cart::update($rowId, $qty);
            return response()->json([
                'qty' => Cart::get($rowId)->qty,
                'status' => 'success',
                'message' => 'Successfully updated!',
            ]);    
        }
    }

    public function removeAllItems(Request $request)
    {

    }



}
