@extends('backend.v_layouts.app')
@section('content')
    {{-- template --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('backend.laporan.cetakuser') }}" method="post"
                class="form-horizontal" target="_blank">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">{{ $judul }}</h4>
                        <div class="form-group">
                            <label for="tanggal_awal">Tanggal Awal</label>
                            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control @error('tanggal_awal')
                                is-invalid
                            @enderror" onkeypress="return hanyaAngka(event)" value="{{ old('tanggal_awal') }}" placeholder="Masukkan Jumlah Pinjam">
                            @error('tanggal_awal')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control @error('tanggal_akhir')
                                is-invalid
                            @enderror" onkeypress="return hanyaAngka(event)" value="{{ old('tanggal_akhir') }}" placeholder="Masukkan Jumlah Pinjam">
                            @error('tanggal_akhir')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end template --}}
@endsection