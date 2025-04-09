{{-- @extends('partial.template')

@section('content')
<div class="pc-container">
    <div class="pc-content">
        <div class="card">
            <div class="card-header">
                <h5>Pembayaran untuk Kursus: {{ $kursus->nama }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('pembayaran.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="kursusid" value="{{ $kursus->kursusid }}">

                    <div class="form-group mb-3">
                        <label>Tujuan Transfer (Bank / e-Wallet)</label>
                        <input type="text" name="tujuan_tf" class="form-control" placeholder="Contoh: BCA - 123456789 a.n Lutv" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Tanggal Transfer</label>
                        <input type="date" name="tanggal_tf" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Jumlah Pembayaran</label>
                        <input type="number" name="jumlah_pembayaran" class="form-control" value="{{ $kursus->harga }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">Kirim Pembayaran</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection --}}
