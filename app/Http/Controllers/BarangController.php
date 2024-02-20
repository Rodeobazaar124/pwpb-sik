<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                return $next($request);
            } else {
                return redirect('/');
            }
        });
    }
    public function index(): View
    {
        $Barangs = Barang::orderBy('id_barang')->get();
        return view('barang.index', compact('Barangs'));
    }
    public function create(): View
    {
        return view('barang.insert');
    }
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_produk' => 'required|min:2',
            'merk' => 'required|min:3',
            'harga' => 'required|min:3'
        ]);
        $image = $request->file('image');
        $image->storeAs('public/product', $image->hashName());

        Barang::create([
            'image' => $image->hashName(),
            'nama_produk' => $request->nama_produk,
            'merk' => $request->merk,
            'harga' => $request->harga
        ]);
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil
Disimpan!']);
    }
    public function destroy(Barang $barang)
    {
        Storage::delete($barang->image);
        $barang->delete();
        return redirect()->back()->with(['success' => 'Berhasil menghapus barang']);
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Barang $barang, Request $request)
    {
        $new = $request->validate([
            'image' => 'nullable|image',
            'nama_produk' => 'required',
            'merk' => 'required',
            'harga' => 'required|min:3'
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/product', $image->hashName());
            $new['image'] = $image->hashName();
            Storage::delete($barang->image);
        }

        $barang->update($new);
        return redirect()->route('barang.index');
    }


}
