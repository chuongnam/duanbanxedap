<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CateController extends Controller
{
    public function list(){
        $data = DB::table('categoris')->get();
        return view('admin.cate.categorislist', compact('data'));
       
    }
    public function home(){
        return view('admin.home');
    }
    public function add(){
        return view('admin.cate.categoriadd');
    }
    public function store(Request $request){
        DB::table('categoris')->insert([
            'name' => $request->name
        ]);
        return redirect()->route('cate.list');
    }
    public function edit(string $id){
        $data = DB::table('categoris')->where('iddm',$id)->first();
        return view('admin.cate.categoriedit', compact('data'));
    }
    public function update(Request $request,$id){
        DB::table('categoris')->where('iddm',$id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('cate.list');
    }
    public function delete(string $id){
        DB::table('categoris')->where('iddm','=',$id)->delete();
      return back();
    }
}
