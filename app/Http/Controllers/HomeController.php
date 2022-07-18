<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Stock;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product=DB::table('stocks')->count();
        $current_stock=DB::table('stocks')->sum('stock_current');
        $stock_in=DB::table('stocks')->sum('stock_in');
        $stock_out=DB::table('stocks')->sum('stock_out');
        return view('home')->with('title', 'Home Dashboard')->with('product', $product)->with('current_stock', $current_stock)->with('stock_in', $stock_in)->with('stock_out', $stock_out);
    }

   
}
