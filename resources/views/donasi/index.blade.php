@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-4 fw-bold">Bantu Sesama, Ubah Dunia</h1>
                <p class="lead mb-4">Platform donasi digital yang aman, transparan, dan terpercaya untuk menyalurkan kebaikan Anda.</p>
                <a href="{{ route('donasi.create') }}" class="btn btn-light btn-lg px-4">
                    <strong>Donasi Sekarang</strong>
                </a>
            </div>
            <div class="col-md-4">
                <!-- Optional: Tambahkan gambar ilustrasi -->
                <div class="text-center">
                    <svg width="200" height="200" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="100" cy="100" r="90" fill="#ffffff" fill-opacity="0.2"/>
                        <path d="M70 120V80C70 75.5817 73.5817 72 78 72H122C126.418 72 130 75.5817 130 80V120C130 124.418 126.418 128 122 128H78C73.5817 128 70 124.418 70 120Z" fill="white"/>
                        <path d="M85 92H115V108H85V92Z" fill="#0d6efd"/>
                        <circle cx="100" cy="70" r="10" fill="white"/>
                        <path d="M95 145H105V155H95V145Z" fill="white"/>
                        <path d="M75 160H125V165H75V160Z" fill="white"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fitur Section -->
<section class="features py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="feature-icon mb-3">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="#0d6efd" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 16.17L4.83 12L3.41 13.41L9 19L21 7L19.59 5.59L9 16.17Z"/>
                            </svg>
                        </div>
                        <h3 class="h4 mb-3">Mudah</h3>
                        <p class="text-muted">Isi data singkat, pilih kategori, dan kirim donasi Anda dalam hitungan menit.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="feature-icon mb-3">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="#0d6efd" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM11 7H13V9H11V7ZM11 11H13V17H11V11Z"/>
                            </svg>
                        </div>
                        <h3 class="h4 mb-3">Transparan</h3>
                        <p class="text-muted">Setiap donasi yang masuk tercatat secara sistematis dalam laporan riwayat donasi.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="feature-icon mb-3">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="#0d6efd" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 21.35L10.55 20.03C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3C9.24 3 10.91 3.81 12 5.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5C22 12.28 18.6 15.36 13.45 20.04L12 21.35Z"/>
                            </svg>
                        </div>
                        <h3 class="h4 mb-3">Bermanfaat</h3>
                        <p class="text-muted">Pilih kategori yang tepat untuk memastikan donasi Anda sampai ke pihak yang membutuhkan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Riwayat Donasi Terbaru -->
<section class="latest-donations py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h2 class="text-center">Riwayat Donasi Terbaru</h2>
                <p class="text-center text-muted">Lihat donasi yang baru saja masuk</p>
            </div>
        </div>
        
        @if($dataDonasi->count() > 0)
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>Nama Donatur</th>
                                        <th>Kategori</th>
                                        <th class="text-end">Nominal</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataDonasi->take(5) as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                    {{ strtoupper(substr($item->donatur->nama_donatur, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <strong>{{ $item->donatur->nama_donatur }}</strong><br>
                                                    <small class="text-muted">{{ $item->donatur->email }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">{{ $item->kategori->nama_kategori }}</span>
                                        </td>
                                        <td class="text-end">
                                            <strong class="text-success">Rp {{ number_format($item->nominal, 0, ',', '.') }}</strong>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_donasi)->translatedFormat('d M Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        @if($dataDonasi->count() > 5)
                        <div class="text-center mt-3">
                            <a href="{{ route('donasi.history') }}" class="btn btn-outline-primary">Lihat Semua Donasi</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-4">
            <svg width="80" height="80" viewBox="0 0 24 24" fill="#6c757d" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM11 16H13V18H11V16ZM12 6C9.79 6 8 7.79 8 10H10C10 8.9 10.9 8 12 8C13.1 8 14 8.9 14 10C14 12 11 11.75 11 15H13C13 12.75 16 12.5 16 10C16 7.79 14.21 6 12 6Z"/>
            </svg>
            <p class="text-muted mt-3">Belum ada donasi yang masuk. Jadilah yang pertama!</p>
            <a href="{{ route('donasi.create') }}" class="btn btn-primary">Donasi Sekarang</a>
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="cta py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h2>Siap Membuat Perubahan?</h2>
                <p class="lead mb-4">Bergabunglah dengan ribuan orang baik lainnya yang telah memberikan dampak positif melalui donasi mereka.</p>
                <a href="{{ route('donasi.create') }}" class="btn btn-primary btn-lg px-5">
                    <strong>Mulai Donasi</strong>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Donasi Web</h5>
                <p>Platform donasi digital yang aman dan transparan.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0">&copy; {{ date('Y') }} Donasi Web. All rights reserved.</p>
                <p class="small text-muted">Activate Windows • Go to Settings to activate Windows</p>
            </div>
        </div>
    </div>
</footer>

<style>
    .hero {
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
        border-radius: 0 0 20px 20px;
    }
    
    .feature-icon {
        width: 80px;
        height: 80px;
        background-color: rgba(13, 110, 253, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }
    
    .card {
        transition: transform 0.3s;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .avatar {
        font-weight: bold;
        font-size: 18px;
    }
    
    .cta {
        background-color: #f8f9fa;
        border-radius: 20px;
    }
</style>
@endsection