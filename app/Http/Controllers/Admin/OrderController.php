<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\DeleteOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    public function showList(Request $request)
    {
        $list = Order::all();
        $options = [
            'list' => $list
        ];
        return view('admin.pages.order.index', $options);
    }

    public function deleteOrder(OrderRequest $request) 
    {  
        try {
            Order::findOrFail($request->get('order_id'))->delete();
        } catch (\Exception $e) {
            return back()->with('delete_order',[
                'status' => 'danger',
                'message' => 'Fail to delete order!!'
            ]); 
        }
        return back()->with('delete_order',[
            'status' => 'success',
            'message' => 'Order no.' . $request->get('order_id') . ' has been deleted!!'
        ]);
    }

    public function checkOrder(UpdateOrderRequest $request)
    {
        // dd($request->all());
        try {
            Order::findOrFail($request->get('order_id'))->update([
                'status' => $request->get('order_status')
            ]);
        } catch (\Exception $e) {
            return back()->with('delete_order',[
                'status' => 'danger',
                'message' => $e->getMessage()
            ]);
        }
        return back()->with('delete_order',[
            'status' => 'success',
            'message' => 'Order no.' . $request->get('order_id') . ' has been deleted!!'
        ]);
    }
}
