<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function show(){
        $data = DB::table('banners')
      ->get();
        return view('admin.ban.show', compact('data'));
    }
    public function add(){
      
        return view('admin.ban.add');
    }
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validated = $request->validate([
                'tenbanner' => 'required',
                
                'image' => 'required',
            ]);

            $params = $request->except('_token');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = $image->store('ban', 'public');
                $params['image'] = $filename;
            }

            $ban = Banner::create($params);

            if ($ban->id) {
                return redirect()->route('ban.show')->with('success', 'Thêm mới thành công');
            } else {
                return redirect()->route('ban.show')->with('error', 'Thêm mới thất bại');
            }
        }
    }
    public function delete(string $id){
        $ban = Banner::find($id);
      
        $deleteImg = Storage::delete($ban->image);
        $ban->delete();
        return redirect()->back()->with('success', 'xóa thành còng');
    }
    
    public function edit($id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('ban.show')->with('error', 'Banner not found.');
        }

        return view('admin.ban.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('ban.show')->with('error', 'Banner not found.');
        }

        $validated = $request->validate([
            'tenbanner' => 'required',
            'image' => 'image|nullable', // Chỉ yêu cầu nếu có file ảnh mới
        ]);

        $params = $request->except('_token', '_method');

        if ($request->hasFile('image')) {
            if ($banner->image && Storage::exists('public/' . $banner->image)) {
                Storage::delete('public/' . $banner->image);
            }

            $image = $request->file('image');
            $filename = $image->store('banners', 'public');
            $params['image'] = $filename;
        } else {
            // Nếu không có ảnh mới, giữ ảnh cũ
            $params['image'] = $banner->image;
        }

        $result = $banner->update($params);

        if ($result) {
            return redirect()->route('ban.edit', ['id' => $id])->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('ban.edit', ['id' => $id])->with('error', 'Cập nhật thất bại');
        }
    }



}
