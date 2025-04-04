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
                                <h2 class="mb-0">Tambah Materi</h2>
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

                                            @if($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <form action="{{ route('materi.store') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="kursusid" class="form-label">Kursus</label>
                                                    <select name="kursusid" id="kursusid" class="form-control" required>
                                                        <option value="">Pilih Kursus</option>
                                                        @foreach($kursus as $k)
                                                            <option value="{{ $k->kursusid }}">{{ $k->nama }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama Materi</label>
                                                    <input type="text" name="nama" id="nama" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <textarea name="deskripsi" id="deskripsi" class="form-control"
                                                        required></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="durasi" class="form-label">Durasi</label>
                                                    <input type="text" name="durasi" id="durasi" class="form-control"
                                                        required>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <a href="{{ route('materi.index') }}" class="btn btn-secondary">Batal</a>
                                            </form>
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