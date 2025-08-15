<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Informasi;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index(Request $request)  
    {
        $query = $request->input('search');

        // Filter + paginate data
        $skills = Skill::when($query, function ($q) use ($query) {
                return $q->where('nama', 'like', "%{$query}%");
            })
            ->latest()
            ->paginate(5)
            ->appends(['search' => $query]);

        $informasi = Informasi::first();

        return view('pages.admin.skill.index', compact('skills', 'informasi', 'query'));
    }

    public function create()
    {
        $informasi = Informasi::first();

        return view('pages.admin.skill.create', compact('informasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // max 2MB
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('skills', 'public');
        }

        Skill::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('skill.index')->with('success', 'Skill berhasil ditambahkan!');
    }

    public function edit(Skill $skill)
    {
        $informasi = Informasi::first();

        return view('pages.admin.skill.edit', compact('skill', 'informasi'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($skill->foto && Storage::disk('public')->exists($skill->foto)) {
                Storage::disk('public')->delete($skill->foto);
            }
            $data['foto'] = $request->file('foto')->store('skills', 'public');
        }

        $skill->update($data);

        return redirect()->route('skill.index')->with('success', 'Skill berhasil diperbarui!');
    }

    public function destroy(Skill $skill)
    {
        // Hapus foto jika ada
        if ($skill->foto && Storage::disk('public')->exists($skill->foto)) {
            Storage::disk('public')->delete($skill->foto);
        }

        $skill->delete();

        return redirect()->route('skill.index')->with('success', 'Skill berhasil dihapus.');
    }
}
