@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Daftar Donasi</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Donatur</th>
                <th>Email</th>
                <th>Kategori</th>
                <th>Nominal</th>
                <th>Tanggal</th>
                <th>Pesan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataDonasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->donatur->nama_donatur }}</td>
                    <td>{{ $item->donatur->email }}</td>
                    <td>{{ $item->kategori->nama_kategori }}</td>
                    <td>Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_donasi)->translatedFormat('d F Y') }}</td>
                    <td>{{ $item->pesan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data donasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection