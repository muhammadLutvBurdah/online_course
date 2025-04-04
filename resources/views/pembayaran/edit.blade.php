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
                                <li class="breadcrumb-item"><a href="#">Tabel</a></li>
                                <li class="breadcrumb-item" aria-current="page">Edit Pembayaran</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Edit Pembayaran</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <div class="container mt-4">
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('pembayaran.update', $pembayaran->pembayaranid) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="kursusid" class="form-label">Kursus</label>
                                            <select name="kursusid" id="kursusid" class="form-control" required>
                                                <option value="">Pilih Kursus</option>
                                                @foreach($kursus as $k)
                                                    <option value="{{ $k->kursusid }}" {{ $pembayaran->kursusid == $k->kursusid ? 'selected' : '' }}>
                                                        {{ $k->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tujuan_tf" class="form-label">Tujuan Transfer</label>
                                            <input type="text" name="tujuan_tf" id="tujuan_tf" class="form-control"
                                                value="{{ $pembayaran->tujuan_tf }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tanggal_tf" class="form-label">Tanggal Transfer</label>
                                            <input type="date" name="tanggal_tf" id="tanggal_tf" class="form-control"
                                                value="{{ $pembayaran->tanggal_tf }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran</label>
                                            <input type="number" name="jumlah_pembayaran" id="jumlah_pembayaran"
                                                class="form-control" value="{{ $pembayaran->jumlah_pembayaran }}" required>
                                        </div>

                                        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary me-2">Kembali</a>
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>

@endsection