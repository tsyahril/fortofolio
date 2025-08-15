@extends('layouts.app')
@section('title', 'Edit Project')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <h4 class="mb-0">Edit Project</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama Project --}}
                <div class="mb-3">
                    <label for="nama_project" class="form-label">Nama Project</label>
                    <input type="text" name="nama_project" id="nama_project" 
                           class="form-control @error('nama_project') is-invalid @enderror" 
                           value="{{ old('nama_project', $project->nama_project) }}" required>
                    @error('nama_project')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" 
                              class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $project->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Link Project --}}
                <div class="mb-3">
                    <label for="link_project" class="form-label">Link Project</label>
                    <input type="url" name="link_project" id="link_project" 
                           class="form-control @error('link_project') is-invalid @enderror" 
                           value="{{ old('link_project', $project->link_project) }}" required>
                    @error('link_project')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Foto Lama --}}
                @if ($project->foto)
                <div class="mb-3">
                    <label class="form-label d-block">Foto Saat Ini</label>
                    <img src="{{ asset('image/' . $project->foto) }}" 
                         alt="Foto Lama" class="img-thumbnail" style="max-height: 150px;">
                </div>
                @endif

                {{-- Upload Foto Baru --}}
                <div class="mb-3">
                    <label for="foto" class="form-label">Ganti Foto (Opsional)</label>
                    <input type="file" name="foto" id="foto" 
                           class="form-control @error('foto') is-invalid @enderror">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('project.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
