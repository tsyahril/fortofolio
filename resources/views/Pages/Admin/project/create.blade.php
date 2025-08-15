@extends('layouts.app')
@section('title', 'Tambah Project')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <h4 class="mb-0">Tambah Project Baru</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama_project" class="form-label">Nama Project</label>
                    <input type="text" name="nama_project" class="form-control" id="nama_project" value="{{ old('nama_project') }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="link_project" class="form-label">Link Project</label>
                    <input type="url" name="link_project" class="form-control" id="link_project" value="{{ old('link_project') }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
                </div>


                <div class="mb-3">
                    <label for="foto" class="form-label">Foto (Opsional)</label>
                    <input type="file" name="foto" class="form-control" id="foto" accept="image/*">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('project.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
