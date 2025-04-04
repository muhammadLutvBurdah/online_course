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
                                <h2 class="mb-0">Daftar Kursus</h2>
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
                                <table class="table" id="pc-dt-simple">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Poto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kursus as $key => $k)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td>{{ $k->nama }}</td>
                                                <td>{{ $k->deskripsi ?? '-' }}</td>
                                                <td>Rp{{ number_format($k->harga, 2) }}</td>
                                                <td>
                                                    @if($k->poto)
                                                        <img src="{{ asset($k->poto) }}" alt="Foto Kursus" width="100">
                                                    @else
                                                        Tidak ada gambar
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('kursus.edit', $k->kursusid) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('kursus.destroy', $k->kursusid) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Hapus kursus ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        <a href="{{ route('kursus.create') }}" class="btn btn-primary">Tambah Kursus</a>
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