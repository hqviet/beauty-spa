<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use DB;
use Sentinel;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CheckoutRequest;

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
            $message = trans('message.add_item_success');
        } else {
            $status = 'warning';
            $message = trans('message.add_item_fail');
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
            'message' => trans('message.remove_item_success')
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
                'message' => trans('message.maximum_item'),
            ]);
        } else {
            $request->session()->forget('cart_qty_key');
            Cart::update($rowId, $qty);
            return response()->json([
                'qty' => Cart::get($rowId)->qty,
                'status' => 'success',
                'message' => trans('message.update_item_success'),
            ]);    
        }
    }

    public function removeAllItems(Request $request)
    {
        Cart::destroy();
        return redirect()->back();
    }

    public function checkout(Request $request)
    {
        $listItem = Cart::content();
        $options = [
            'list' => $listItem
        ];
        $user = Sentinel::getUser();
        $options['user'] = $user ? $user : null;
        return view('frontend.checkout', $options);
    }

    public function checkoutHandler(CheckoutRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = [
                'user_id' => $request->get('user_id', ''),
                'name' => $request->get('orderName'),
                'email' => $request->get('orderEmail'),
                'phone' => $request->get('orderPhone'),
                'address' => $request->get('orderAddress'),
                'note' => $request->get('orderNote', ''),
                'payment' => $request->get('orderPaymentMethod'),
                'total' => Cart::subtotal(),
                'status' => 0
            ];
            $order = Order::create($data);
            $cartItems = Cart::content();
            foreach ($cartItems as $item) {
               OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'price' => $item->price,
                    'quantity' => $item->qty
                ]);
            }

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with('checkout', [
                'status' => 'danger',
                'message' => trans('message.checkout_error')
            ]);
        }
        DB::commit();
        Cart::destroy();
        return redirect()->route('front.index')->with('checkout', [
            'status' => 'success',
            'message' => trans('message.checkout_success')
        ]);
    }
}
