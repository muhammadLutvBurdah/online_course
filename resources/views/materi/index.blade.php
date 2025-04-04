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
                                <li class="breadcrumb-item" aria-current="page">Materi</li>
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

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ basic-table ] start -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="pc-dt-simple">

                                    <body>
                                        <div class="container mt-4">
                                            <a href="{{ route('materi.create') }}" class="btn btn-primary mb-3">Tambah
                                                Materi</a>

                                            @if(session('success'))
                                                <div class="alert alert-success">{{ session('success') }}</div>
                                            @endif

                                            <table class="table table-bordered">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Materi</th>
                                                        <th>Kursus</th>
                                                        <th>Deskripsi</th>
                                                        <th>Durasi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($materi as $key => $m)
                                                        <tr>
                                                            <td class="text-center">{{ $key + 1 }}</td>
                                                            <td>{{ $m->nama }}</td>
                                                            <td>{{ $m->kursus->nama ?? '-' }}</td>
                                                            <td>{{ $m->deskripsi }}</td>
                                                            <td>{{ $m->durasi }}</td>
                                                            <td>
                                                                <a href="{{ route('materi.edit', $m->materiid) }}"
                                                                    class="btn btn-warning btn-sm">Edit</a>

                                                                <form action="{{ route('materi.destroy', $m->materiid) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('Hapus materi ini?')">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </body>
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