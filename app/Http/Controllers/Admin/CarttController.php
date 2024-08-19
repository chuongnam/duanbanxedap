<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class CarttController extends Controller
{
    public function show()
    {
        $data = DB::table('orders')->get();
        return view('admin.cart.show', compact('data'));
    }

    public function edit(string $id)
    {
        $data = DB::table('orders')->where('id', $id)->first();
        return view('admin.cart.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        DB::table('orders')->where('id', $id)->update([
            'trangthai' => $request->trangthai
        ]);
        return redirect()->route('cartt.show');
    }

    public function detail($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.cart.hoadon', compact('order'));
    }

    public function printInvoice($id)
    {
        ini_set('max_execution_time', 300); 
        ini_set('memory_limit', '512M'); 

        try {
            $order = Order::findOrFail($id);
            $pdf = PDF::loadView('admin.cart.invoice', compact('order'));
            
            return $pdf->download('invoice-' . $id . '.pdf');
        } catch (\Exception $e) {
          
            \Log::error('Error generating PDF: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Lỗi khi tạo hóa đơn PDF. Vui lòng thử lại.');
        }
    }
}
