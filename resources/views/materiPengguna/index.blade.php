@extends('partial.template')

@section('content')

    <section class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                                <li class="breadcrumb-item"><a href="#">Materi</a></li>
                                <li class="breadcrumb-item" aria-current="page">Daftar</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Daftar Materi</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <form action="{{ route('materiPengguna.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <select name="kursusid" class="form-control">
                        <option value="">-- Pilih Kategori Kursus --</option>
                        @foreach($kursusPengguna as $kursus)
                            <option value="{{ $kursus->kursusid }}" {{ request('kursusid') == $kursus->kursusid ? 'selected' : '' }}>
                                {{ $kursus->nama }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>

            <!-- [ Main Content ] start -->
            <div class="container mt-4">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="row">
                    @foreach($materiPengguna as $m)
                        <div class="col-md-3 mb-4">
                            <div class="card h-100 d-flex flex-column">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $m->nama }}</h5>
                                    <p class="card-text"><strong>Kursus:</strong> {{ $m->kursus->nama ?? '-' }}</p>
                                    <p class="card-text flex-grow-1">{{ $m->deskripsi }}</p>
                                    <p class="card-text"><strong>Durasi:</strong> {{ $m->durasi }}</p>
                                    <div class="mt-auto">
                                        <a href="{{ route('pembayaran.create', $m->pembayaranid) }}"
                                            class="btn btn-success btn-sm">Bayar</a>
                                        <a href="{{ route('kursusPengguna.index', $m->kursusid) }}"
                                            class="btn btn-secondary btn-sm">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>

@endsection