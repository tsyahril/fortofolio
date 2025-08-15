@extends('layouts.app')
@section('title', 'Edit Skill')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <h4 class="mb-0">Edit Skill</h4>
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

            <form action="{{ route('skill.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Skill</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $skill->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control">{{ old('deskripsi', $skill->deskripsi) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Saat Ini</label><br>
                    @if ($skill->foto)
                        <img src="{{ asset('storage/' . $skill->foto) }}" alt="Foto Skill" class="img-thumbnail" style="max-width: 200px;">
                    @else
                        <p>Tidak ada foto</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Upload Foto Baru (Opsional)</label>
                    <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('skill.index') }}" class="btn btn-secondary ms-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>

@endsection
