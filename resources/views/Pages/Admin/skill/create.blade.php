@extends('layouts.app')
@section('title', 'Tambah Skill')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <h4 class="mb-0">Tambah Skill</h4>
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

            <form action="{{ route('skill.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Skill</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto (Opsional)</label>
                    <input type="file" name="foto" class="form-control" id="foto" accept="image/*">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('skill.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
