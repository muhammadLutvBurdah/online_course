@extends('partial.template')

@section('content')

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body text-center">
                <img src="path/to/user-icon.png" alt="Total Pengguna" class="img-fluid mb-3" style="max-width: 60px;">
                <h6 class="mb-2 f-w-400 text-muted">Total Pengguna</h6>
                <h4 class="mb-3">0</h4>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body text-center">
                <img src="path/to/course-icon.png" alt="Total Kursus" class="img-fluid mb-3" style="max-width: 60px;">
                <h6 class="mb-2 f-w-400 text-muted">Total Kursus</h6>
                <h4 class="mb-3">{{ number_format($totalKursus) }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body text-center">
                <img src="path/to/material-icon.png" alt="Total Materi" class="img-fluid mb-3" style="max-width: 60px;">
                <h6 class="mb-2 f-w-400 text-muted">Total Materi</h6>
                <h4 class="mb-3">{{ number_format($totalMateri) }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body text-center">
                <img src="path/to/payment-icon.png" alt="Total Pembayaran" class="img-fluid mb-3" style="max-width: 60px;">
                <h6 class="mb-2 f-w-400 text-muted">Total Pembayaran</h6>
                <h4 class="mb-3">{{ number_format($totalPembayaran) }}</h4>
            </div>
        </div>
    </div>
</div>


@endsection