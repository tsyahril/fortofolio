@extends('layouts.app')
@section('title', 'Data Skill')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Data Skill</h4>
                <a href="{{ route('skill.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Skill
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="GET" action="{{ route('skill.index') }}" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari nama skill...">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="bi bi-search"></i> Cari
                    </button>
                </div>
            </form>

            @if(request('search'))
                <p class="text-muted">Hasil untuk: <strong>{{ request('search') }}</strong></p>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Skill</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($skills as $skill)
                            <tr>
                                <td>{{ $loop->iteration + ($skills->currentPage() - 1) * $skills->perPage() }}</td>
                                <td>
                                    @if($skill->foto)
                                        <img src="{{ asset('storage/' . $skill->foto) }}" alt="{{ $skill->nama }}" class="img-fluid rounded" style="width: 120px; height: 80px; object-fit: cover;">
                                    @else
                                        <img src="https://placehold.co/120x80/eef2f7/8e9ab3?text=No+Image" alt="No Image" class="img-fluid rounded" style="width: 120px; height: 80px; object-fit: cover;">
                                    @endif
                                </td>
                                <td class="fw-bold">{{ $skill->nama }}</td>
                                <td>{{ Str::limit($skill->deskripsi, 100) }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('skill.destroy', $skill->id) }}" method="POST">
                                        <a href="{{ route('skill.edit', $skill->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash3-fill"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    <div class="alert alert-danger">
                                        Data skill belum tersedia.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
 
            {{ $skills->links() }}
        </div>
    </div>
</div>

@endsection
