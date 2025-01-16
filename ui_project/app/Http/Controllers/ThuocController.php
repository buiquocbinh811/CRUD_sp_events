<?php

namespace App\Http\Controllers;

use App\Models\Thuoc;
use Illuminate\Http\Request;

class ThuocController extends Controller
{
    public function index()
    {
        $thuocs = Thuoc::paginate(10);
        $allThuocs = Thuoc::all();
        $expiringSoon = $allThuocs->filter(function($thuoc) {
            return $thuoc->isExpiringSoon();
        });

        $lowStock = $allThuocs->filter(function($thuoc) {
            return $thuoc->isLowStock();
        });
        
        return view('thuocs.index', compact('thuocs', 'expiringSoon', 'lowStock'));
    }

    public function create()
    {
        return view('thuocs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'TenThuoc' => 'required',
            'DonViTinh' => 'required',
            'SoLuongTon' => 'required|numeric|min:0',
            'DonGiaNhap' => 'required|numeric|min:0',
            'DonGiaBan' => 'required|numeric|min:0',
            'NgayHetHan' => 'required|date'
        ]);
    
        $existingThuoc = Thuoc::where('TenThuoc', $validated['TenThuoc'])
                              ->where('DonViTinh', $validated['DonViTinh'])
                              ->first();
    
        if ($existingThuoc) {
            $existingThuoc->SoLuongTon += $validated['SoLuongTon'];
            $existingThuoc->save();
    
            return redirect()->route('thuocs.index')
                ->with('success', 'Đã cập nhật số lượng thuốc ' . $existingThuoc->TenThuoc);
        }
    
        Thuoc::create($validated);
    
        return redirect()->route('thuocs.index')
            ->with('success', 'Đã thêm thuốc mới thành công');
    }

    public function show($id)
    {
        $thuoc = Thuoc::findOrFail($id);
        return view('thuocs.show', compact('thuoc'));
    }

    public function edit($id)
    {
        $thuoc = Thuoc::findOrFail($id);
        return view('thuocs.edit', compact('thuoc'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'TenThuoc' => 'required',
            'DonViTinh' => 'required',
            'SoLuongTon' => 'required|numeric|min:0',
            'DonGiaNhap' => 'required|numeric|min:0',
            'DonGiaBan' => 'required|numeric|min:0',
            'NgayHetHan' => 'required|date'
        ]);
    
        $thuoc = Thuoc::findOrFail($id);
        $thuoc->update($request->all());
    
        return redirect()->route('thuocs.index')
            ->with('success', 'Đã cập nhật thông tin thuốc thành công');
    }

    public function export($id)
    {
        $thuoc = Thuoc::findOrFail($id);
        return view('thuocs.export', compact('thuoc'));
    }

    public function exportStore(Request $request, $id)
    {
        $request->validate([
            'SoLuongExport' => 'required|numeric|min:1'
        ]);

        $thuoc = Thuoc::findOrFail($id);
        
        if($thuoc->SoLuongTon < $request->SoLuongExport) {
            return back()->with('error', 'Số lượng xuất vượt quá số lượng tồn kho');
        }

        $thuoc->SoLuongTon -= $request->SoLuongExport;
        $thuoc->save();

        return redirect()->route('thuocs.index')
            ->with('success', "Đã xuất {$request->SoLuongExport} {$thuoc->DonViTinh} {$thuoc->TenThuoc}");
    }
}