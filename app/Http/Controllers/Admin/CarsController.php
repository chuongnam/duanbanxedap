<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\car;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CarsController extends Controller
{
    public function show(){
        $data = DB::table('cars')
        ->join('categoris', 'cars.iddm', '=', 'categoris.iddm')
        ->select('cars.*', 'categoris.iddm as iddm', 'categoris.name as name_danhmuc')->get();
        return view('admin.cars.cars', compact('data'));
    }
    public function add(){
        $data = DB::table('categoris')->get();
        return view('admin.cars.carsadd',compact('data'));
    }
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validated = $request->validate([
                'name' => 'required',
                'price' => 'required',
                'mota' => 'required',
                'mausac' => 'required',
                'iddm' => 'required',
                'image' => 'required',
            ]);

            $params = $request->except('_token');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = $image->store('cars', 'public');
                $params['image'] = $filename;
            }

            $car = Car::create($params);

            if ($car->id) {
                return redirect()->route('carss.show')->with('success', 'Thêm mới thành công');
            } else {
                return redirect()->route('carss.show')->with('error', 'Thêm mới thất bại');
            }
        }
    }
    public function delete(string $id){
        $car = Car::find($id);
      
        $deleteImg = Storage::delete($car->image);
        $car->delete();
        return redirect()->back()->with('success', 'xóa thành còng');
    }
    public function edit($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return redirect()->route('cars.index')->with('error', 'Car not found.');
        }

        $categories = DB::table('categoris')->get();

        return view('admin.cars.carsedit', compact('car', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return redirect()->route('cars.index')->with('error', 'Car not found.');
        }

        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'mota' => 'required',
            'mausac' => 'required',
            'iddm' => 'required', 
            'image' => 'image',
        ]);

        $params = $request->except('_token', '_method');

        if ($request->hasFile('image')) {
            if ($car->image && Storage::exists('public/' . $car->image)) {
                Storage::delete('public/' . $car->image);
            }

            $image = $request->file('image');
            $filename = $image->store('cars', 'public');
            $params['image'] = $filename;
        } else {
            $params['image'] = $car->image;
        }

        $result = $car->update($params);

        if ($result) {
            return redirect()->route('carss.edit', ['id' => $id])->with('success', 'Sửa thành công');
        } else {
            return redirect()->route('carss.edit', ['id' => $id])->with('error', 'Sửa thất bại');
        }
    }



}
