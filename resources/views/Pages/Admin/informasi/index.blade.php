@extends('layouts.app')
@section('title', 'Informasi')
@section('content')

<div class="container">
    <div class="card shadow-sm border-light-subtle">
        <div class="card-body p-4 p-lg-5">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom">
                <h2 class="h4 fw-bold mb-0">Pengaturan Informasi</h2>
                <button form="form-informasi" type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle me-2"></i>Simpan Perubahan
                </button>
            </div>

            <div class="row g-4 g-lg-5">

                <!-- Form Informasi -->
                <div class="col-md-7">
                    <form id="form-informasi" action="{{ route('informasi.update', $informasi->id ?? 0) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" id="nama"
                                   value="{{ old('nama', $informasi->nama ?? '') }}">
                        </div>

                        <div class="mb-4">
                            <label for="pekerjaan" class="form-label fw-semibold">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" id="pekerjaan"
                                   value="{{ old('pekerjaan', $informasi->pekerjaan ?? '') }}">
                        </div>

                        <div class="mb-4">
                            <label for="lokasi" class="form-label fw-semibold">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" id="lokasi"
                                   value="{{ old('lokasi', $informasi->lokasi ?? '') }}">
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label fw-semibold">Nomor hp</label>
                            <input type="text" name="no_telpon" class="form-control" id="no_telpon"
                                   value="{{ old('no_telpon', $informasi->no_telpon ?? '') }}">
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label fw-semibold">Email</label>
                            <input type="text" name="email" class="form-control" id="email"
                                   value="{{ old('email', $informasi->email ?? '') }}">
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5">{{ old('deskripsi', $informasi->deskripsi ?? '') }}</textarea>
                        </div>
                    </form>
                </div>

                <!-- Upload Foto -->
                <div class="col-md-5">
    <label class="form-label fw-semibold">Foto Profil</label>
    <div class="text-center p-3 border rounded-3 bg-body-tertiary">

        {{-- Preview Foto --}}
                <img 
                    src="{{ !empty($informasi?->foto) ? asset('image/' . $informasi->foto) : 'https://via.placeholder.com/200' }}" 
                    class="rounded-circle mx-auto d-block shadow-sm"
                    style="width: 70%; max-width: 200px; height: auto; aspect-ratio: 1 / 1; object-fit: cover;" 
                    alt="Foto Profil">

        {{-- Input Upload --}}
        <input type="file" name="foto" id="foto" class="form-control mt-2" form="form-informasi">
        <p class="text-body-secondary small mt-2 mb-0">Format: 1:1  jpg/jpeg/png • Maks: 2MB</p>
    </div>
</div>


            </div>

        </div>
    </div>
</div>

@endsection
