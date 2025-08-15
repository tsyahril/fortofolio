<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Portofolio | T.Syahril.</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
</head>
<body>

<!-- Hero Section -->
<section class="vh-100 d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">
        <div class="card text-center">
            <div class="card-body">
                <h1 class="display-5 fw-bold"><i>PORTOFOLIO</i></h1>
                <img 
                    src="{{ !empty($informasi?->foto) ? asset('image/' . $informasi->foto) : 'https://via.placeholder.com/200' }}" 
                    class="rounded-circle shadow mx-auto d-block" 
                    style="width: 200px; height: 200px; object-fit: cover;" 
                    alt="Foto Profil" 
                />
                <h1 class="display-10 fw-bold">{{ $informasi->nama ?? 'kosong' }}</h1>
                <p class="lead mb-1">{{ $informasi->pekerjaan ?? 'kosong' }}</p>
                <p class="mb-1">{{ $informasi->lokasi ?? 'kosong' }}</p>
                <p class="mb-0">Email: {{ $informasi->email ?? 'kosong' }}</p>
                <p class="mb-0">No. Telepon: {{ $informasi->no_telpon ?? 'kosong' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="container py-5" id="about">
    <div class="card" data-aos="fade-up">
        <div class="card-body">
            <h2 class="card-title">Tentang Saya</h2>
            <p class="card-text">{{ $informasi->deskripsi ?? 'Deskripsi kosong' }}</p>
        </div>
    </div>
</section>

<!-- Skill Section -->
<section class="container py-5" id="skills">
    <div class="card" data-aos="fade-up">
        <div class="card-body">
            <h2 class="mb-4">Skill Saya</h2>
            <div class="row">
                @forelse ($skills as $skill)
                    <div class="col-md-4 mb-4">
                        <div class="card text-center">
                            <img src="{{ asset('image/' . $skill->foto) }}" class="card-img-top p-3" alt="{{ $skill->nama }}" style="height:150px; object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $skill->nama }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($skill->deskripsi, 80) }}</p>
                                <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#skillDesc{{ $skill->id }}">
                                    Lihat Deskripsi Lengkap
                                </button>
                                <div class="collapse mt-2" id="skillDesc{{ $skill->id }}">
                                    <p class="text-start">{{ $skill->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">Belum ada skill ditambahkan.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Project Section -->
<section class="container py-5" id="projects">
    <div class="card" data-aos="fade-up">
        <div class="card-body">
            <h2 class="mb-4">Project Saya</h2>
            <div class="row">
                @forelse ($project as $item)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <img src="{{ asset('image/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama }}" style="height:200px; object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama_project }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($item->deskripsi, 100) }}</p>

                                @if (!empty($item->link_project))
                                    <a href="{{ $item->link_project }}" class="btn btn-outline-success btn-sm" target="_blank">Lihat Project</a>
                                @else
                                    <p class="text-muted">Link tidak tersedia</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">Belum ada proyek ditambahkan.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center py-4">
    <p data-aos="fade-in">© 2025 Teuku Syahril. Dibuat dengan Laravel & Bootstrap.</p>
    <div>
        <a href="https://github.com/username" target="_blank">GitHub</a> |
        <a href="https://wa.me/6281234567890" target="_blank">WhatsApp</a> |
        <a href="https://facebook.com/username" target="_blank">Facebook</a>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
