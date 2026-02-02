@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Form Donasi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('donasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_donatur" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('nama_donatur') is-invalid @enderror" 
                   id="nama_donatur" name="nama_donatur" value="{{ old('nama_donatur') }}" required>
            @error('nama_donatur')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                   id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" 
                   id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
            @error('no_hp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori Donasi</label>
            <select class="form-select @error('kategori_id') is-invalid @enderror" 
                    id="kategori_id" name="kategori_id" required>
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal (Rp)</label>
            <input type="number" class="form-control @error('nominal') is-invalid @enderror" 
                   id="nominal" name="nominal" value="{{ old('nominal') }}" min="1" required>
            @error('nominal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan (Opsional)</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="3">{{ old('pesan') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Donasi</button>
    </form>
@endsection