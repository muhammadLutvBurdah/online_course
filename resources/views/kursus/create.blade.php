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
                                <h2 class="mb-0">Tambah Kursus</h2>
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

                                            <form action="{{ route('kursus.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama Kursus</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" id="deskripsi"
                                                        name="deskripsi"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="number" class="form-control" id="harga" name="harga"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="poto" class="form-label">Foto</label>
                                                    <input type="file" class="form-control" id="poto" name="poto" required>
                                                </div>
                                                <a href="{{ route('kursus.index') }}" class="btn btn-secondary me-2">Kembali</a>
                                                <button type="submit" class="btn btn-success">Simpan</button>
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