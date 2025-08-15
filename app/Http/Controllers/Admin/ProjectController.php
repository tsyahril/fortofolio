<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\project;
use App\Models\Informasi;

class projectController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $projects = project::when($query, function ($q) use ($query) {
            return $q->where('nama_project', 'like', "%{$query}%");
        })
        ->latest()
        ->paginate(5)
        ->appends(['search' => $query]);


        $informasi = Informasi::first();

        return view('pages.admin.project.index', compact('projects', 'informasi', 'query'));
    }

    public function create()
    {
            $informasi = Informasi::first();

        return view('pages.admin.project.create',compact('informasi'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_project' => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'link_project' => 'required|url',
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFile = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('image'), $namaFile);
            $validatedData['foto'] = $namaFile;
        }

        project::create($validatedData);

        return redirect()->route('project.index')->with('success', 'Project berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $project = project::findOrFail($id);
        $informasi = Informasi::first();
        return view('pages.admin.project.edit', compact('project','informasi'));
    }

    public function update(Request $request, $id)
    {
        $project = project::findOrFail($id);

        $validatedData = $request->validate([
            'nama_project' => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'link_project' => 'required|url',
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($project->foto && file_exists(public_path('image/' . $project->foto))) {
                unlink(public_path('image/' . $project->foto));
            }

            $foto = $request->file('foto');
            $namaFile = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('image'), $namaFile);
            $validatedData['foto'] = $namaFile;
        }

        $project->update($validatedData);

        return redirect()->route('project.index')->with('success', 'Project berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $project = project::findOrFail($id);

        if ($project->foto && file_exists(public_path('image/' . $project->foto))) {
            unlink(public_path('image/' . $project->foto));
        }

        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project berhasil dihapus!');
    }
}
