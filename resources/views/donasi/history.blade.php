@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col">
            <h1>Riwayat Donasi Lengkap</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Riwayat Donasi</li>
                </ol>
            </nav>
        </div>
        <div class="col-auto">
            <a href="{{ route('donasi.create') }}" class="btn btn-primary">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Donasi Baru
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>#</th>
                            <th>Nama Donatur</th>
                            <th>Email</th>
                            <th>Kategori</th>
                            <th class="text-end">Nominal</th>
                            <th>Tanggal</th>
                            <th>Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataDonasi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $item->donatur->nama_donatur }}</strong>
                                </td>
                                <td>{{ $item->donatur->email }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $item->kategori->nama_kategori }}</span>
                                </td>
                                <td class="text-end">
                                    <strong class="text-success">Rp {{ number_format($item->nominal, 0, ',', '.') }}</strong>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_donasi)->translatedFormat('d F Y') }}</td>
                                <td>{{ $item->pesan ?: '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <svg width="60" height="60" viewBox="0 0 24 24" fill="#6c757d" class="mb-3">
                                        <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM11 16H13V18H11V16ZM12 6C9.79 6 8 7.79 8 10H10C10 8.9 10.9 8 12 8C13.1 8 14 8.9 14 10C14 12 11 11.75 11 15H13C13 12.75 16 12.5 16 10C16 7.79 14.21 6 12 6Z"/>
                                    </svg>
                                    <p class="text-muted">Belum ada data donasi.</p>
                                    <a href="{{ route('donasi.create') }}" class="btn btn-primary">Mulai Donasi</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($dataDonasi->count() > 0)
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted">
                    Menampilkan {{ $dataDonasi->count() }} data donasi
                </div>
                <a href="{{ route('home') }}" class="btn btn-outline-primary">
                    Kembali ke Beranda
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection