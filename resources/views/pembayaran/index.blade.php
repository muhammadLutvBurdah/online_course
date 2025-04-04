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
                                <li class="breadcrumb-item" aria-current="page">Kursus</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Daftar Pembayaran</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ basic-table ] start -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <!-- <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">Tambah pembayaran</a> -->

                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <table class="table" id="pc-dt-simple">

                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kursus</th>
                                            <th>Tujuan Transfer</th>
                                            <th>Tanggal Transfer</th>
                                            <th>Jumlah Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pembayaran as $key => $m)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td>{{ $m->kursus->nama ?? 'Tidak Ada Data' }}</td>
                                                <td>{{ $m->tujuan_tf }}</td>
                                                <td>{{ $m->tanggal_tf }}</td>
                                                <td>Rp {{ number_format($m->jumlah_pembayaran, 0, ',', '.') }}</td>
                                                <td>
                                                    <!-- <a href="{{ route('pembayaran.edit', $m->pembayaranid) }}"class="btn btn-warning btn-sm">Edit</a> -->

                                                    <form action="{{ route('pembayaran.destroy', $m->pembayaranid) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Hapus pembayaran ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ basic-table ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>

@endsection