<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
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
    public function index()
    {
        $Transaksis = Transaksi::with('barang')->get();
        return view('transaksi.index', compact('Transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Barangs = Barang::all();
        return view('transaksi.create', compact('Barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaksi = $request->validate([
            'barang' => 'required',
            'harga' => 'required|min:3',
            'total_item' => 'required|min:1',
            'total_harga' => 'required|min:3',
            'status_pembayaran' => 'required|min:3'
        ]);
        $transaksi['id_barang'] = $transaksi['barang'];
        Transaksi::create($transaksi);
        return redirect()->route('transaksi.index')->with(['success', 'Data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        $Barangs = Barang::all();
        $Transaksis = $transaksi;
        return view('transaksi.edit', compact('Transaksis', 'Barangs'));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->back()->with(['success' => 'Berhasil menghapus barang']);
    }
    /**
     * Viewing receipt of a transaction
     */
    public function nota_transaksi(Transaksi $transaksi)
    {
        $detail = $transaksi;
        return view('transaksi.nota', compact('detail'));
    }
    public function update(Transaksi $transaksi, Request $request){
        $transaksi->update($request->all());
        return redirect()->route('transaksi.index');
    }
}
