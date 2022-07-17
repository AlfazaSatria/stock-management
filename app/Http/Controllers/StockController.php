<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\User;
use Illuminate\Http\Request;
use DataTables;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stock = Stock::all();
       
        if (request()->ajax()) {
            
            return Datatables::of($stock)
            ->addIndexColumn()
            
            ->addColumn('action', function ($stock) {
                
                $button = '<button id="delete" class="btn btn-sm btn-danger" data-id="'.$stock->id.'">Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.stocks.index')->with('title', 'Stock')->with('stock', $stock);
    }

    public function showAddStock()
    {   
        $title = "Add Stock";
        return view('admin.stocks.addStock')->with('title', $title);
    }

    public function addStock(Request $request)
    {
        try{
            $stock = new Stock;
            $stock->name = $request->name;
            $stock->stock_current = $request->stock_current;
            $stock->stock_in = $request->stock_in;
            $stock->stock_out = $request->stock_out;
            $stock->save();
                
            
            return response()->json([
                'status' => '200',
                'message' => 'Success add stock',
                'data' => $stock
            ], 200);
             
        }catch(Exception $err){
            return response()->json([
                'status' => '500',
                'error' => $err->getMessage()
            ], 500);
        }
    }

    public function destroy($id){
        try{
            $stock= Stock::firstwhere('id', $id);
            $stock->delete();

            return response()->json([

            ], 200);
        }catch(Exception $err){
            return response()->json([
                'status' => '500',
                'error' => $err->getMessage()
            ], 500);
        }
    }

    public function changePasswordView(){
        return view('auth.reset')->with('title', 'Ganti Password');
    }

    public function changePassword(Request $request){
        try{
            $user = User::firstwhere('id', Auth::user()->id);
            
            $user->password = Hash::make($request->password);

            $user->save();

            return response()->json([
                'status' => '200',
                'message' => 'Success change password',
            ], 200);

        }catch(Exception $err){
            return response()->json([
                'status' => '500',
                'error' => $err->getMessage()
            ], 500);
        }
    }
}
