<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
     public function index()
    {
        $laporans = Auth::user()->role === 'admin'
            ? Laporan::latest()->get()
            : Laporan::where('user_id', Auth::id())->latest()->get();

        return view('laporan.index', compact('laporans'));
    }

     public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'media' => 'required|file|mimes:jpg,jpeg,png,mp4|max:20480',
        ]);

       $mediaPath = $request->file('media')->store('media_laporan', 'public');


        Laporan::create([
            'user_id' => Auth::id(),
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'media' => $mediaPath,
            'tanggal_lapor' => now(),
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dikirim.');
    }

    public function show(Laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }
    
    public function edit(Laporan $laporan)
    {
        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'status' => 'required|in:pending,selesai',
            'bukti_media' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:20480',
            'deskripsi_tindakan' => 'nullable|string',
        ]);

        if ($request->hasFile('bukti_media')) {
            $buktiPath = $request->file('bukti_media')->store('bukti_laporan');
            $laporan->media = $buktiPath;
        }

        $laporan->update([
            'status' => $request->status,
            'deskripsi' => $request->deskripsi_tindakan ?? $laporan->deskripsi,
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan diperbarui.');
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
