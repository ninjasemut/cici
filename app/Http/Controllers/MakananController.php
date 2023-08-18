<?php
namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index()
    {
        $makanan = Makanan::all();
        return view('pages.admin.makanan.index', compact('makanan'));
    }

    public function create()
    {
        return view('pages.admin.makanan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:minuman,makanan',
        ]);

        Makanan::create($data);

        return redirect()->route('admin.makanan.index')->with('success', 'Data makanan berhasil ditambahkan.');
    }

    public function edit(Makanan $makanan)
    {
        return view('pages.admin.makanan.edit', compact('makanan'));
    }

    public function update(Request $request, Makanan $makanan)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:minuman,makanan',
        ]);

        $makanan->update($data);

        return redirect()->route('admin.makanan.index')->with('success', 'Data makanan berhasil diperbarui.');
    }

    public function destroy(Makanan $makanan)
    {
        $makanan->delete();
        return redirect()->route('admin.makanan.index')->with('success', 'Data makanan berhasil dihapus.');
    }
}
