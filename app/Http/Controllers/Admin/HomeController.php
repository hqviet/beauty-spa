<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        $orderPending = Order::where('status', '=', '0')->get()->count();
        $options = [
            'orderPending' => $orderPending
        ];
        return view('admin.pages.index', $options);
    }
}
