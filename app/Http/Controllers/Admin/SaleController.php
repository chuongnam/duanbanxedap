<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function list(){
        $data = DB::table('sales')->get();
        return view('admin.khuyenmai.kmlist', compact('data'));
    }
    public function add(){
        return view('admin.khuyenmai.kmadd');
    }
    public function store(request $request){
        DB::table('sales')->insert([
            'magiamgia'=> $request->magiamgia,
            'phantram'=> $request->phantram,
        ]);
        return redirect()->route('km.list');
    }
    public function delete(string $id){
        DB::table('sales')->where('id','=',$id)->delete();
        return back();
    }
    public function edit(string $id){
        $data = DB::table('sales')->where('id','=',$id)->first();
        return view('admin.khuyenmai.kmedit', compact('data'));
    }
     public function update(request $request,$id){
        DB::table('sales')->where('id',$id)->update([
            'magiamgia'=> $request->magiamgia,
            'phantram'=> $request->phantram,
        ]);
        return redirect()->route('km.list');
     }
}
