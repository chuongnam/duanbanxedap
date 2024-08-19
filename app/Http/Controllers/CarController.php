<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('cars')->get();
        $dt = DB::table('categoris')->get();
        return view('car.list', compact('data','dt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carid = $request->idhidden;
        $quantity = $request->qty;
        $data = DB::table('cars')->where('id','=',$carid)->get();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('cars')->where('id','=',$id)->get();
        $dt = DB::table('categoris')->get();
        return view('car.cate', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detail = DB::table('cars')->where('id','=',$id)->first();
        
        return view('car.detail', compact('detail'));
        
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
   
    
}
