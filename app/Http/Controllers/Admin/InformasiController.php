<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::first();

        if (!$informasi) {
       return redirect()->route('informasi.create');
        }
        return view('pages.admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
         return view('pages.admin.informasi.create');
    }

    public function store(Request $request)
    {
            $request->validate([
            'nama'      => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'lokasi'    => 'required|string|max:255',
            'no_telpon' => 'required|string|max:20',
            'email'     => 'required|email|unique:informasi,email,',
            'deskripsi' => 'nullable|string',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
            $informasi = new Informasi();
            $informasi->nama = $request->nama;
            $informasi->pekerjaan = $request->pekerjaan;
            $informasi->lokasi = $request->lokasi;
            $informasi->no_telpon = $request->no_telpon;
            $informasi->email = $request->email;
            $informasi->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time().'.'.$foto->getClientOriginalName();
            $foto->move(public_path('image'), $namaFoto);
            $informasi->foto = $namaFoto;
        }
        $informasi->save();

        return redirect()->route('informasi.index')->with('success','informasi berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('pages.admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {   
        try {
            $informasi = Informasi::findOrFail($id);

            $request->validate([
                'nama'      => 'required|string|max:255',
                'pekerjaan' => 'required|string|max:255',
                'lokasi'    => 'required|string|max:255',
                'no_telpon' => 'required|string|max:20',
                'email'     => 'required|email|unique:informasi,email,' . $id,
                'deskripsi' => 'nullable|string',
                'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Update data
            $informasi->nama = $request->nama;
            $informasi->pekerjaan = $request->pekerjaan;
            $informasi->lokasi = $request->lokasi;
            $informasi->no_telpon = $request->no_telpon;
            $informasi->email = $request->email;
            $informasi->deskripsi = $request->deskripsi;

            // Update foto jika ada
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $namaFoto = time().'.'.$foto->getClientOriginalName();
                $foto->move(public_path('image'), $namaFoto);
                $informasi->foto = $namaFoto;
            }

            $informasi->save();

            return redirect()->back()->with('success', 'Informasi berhasil diperbarui.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        //
    }
}
