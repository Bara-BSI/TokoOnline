@extends('backend.v_layouts.app')
@section('content')
    {{-- contentAwal --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('backend.user.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">{{ $judul }}</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <img class="foto-preview">
                                        <input type="file" name="foto" id="foto" class="form-control @error('foto')
                                            is-invalid
                                        @enderror" onchange="previewFoto()">
                                        @error('foto')
                                            <div class="invalid-feedback alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="role">Hak Akses</label>
                                        <select name="role" id="role" class="form-control @error('role')
                                            is-invalid
                                        @enderror">
                                            <option value="" {{ old('role') == '' ? 'selected' : '' }}>
                                                - Pilih Hak Akses -
                                            </option>
                                            <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>
                                                Super Admin
                                            </option>
                                            <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>
                                                Admin
                                            </option>
                                            <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>
                                                Customer
                                            </option>
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="form-control @error('nama')
                                            is-invalid
                                        @enderror" placeholder="Masukkan Nama">
                                        @error('nama')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email')
                                            is-invalid
                                        @enderror" placeholder="Masukkan Email">
                                        @error('email')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="hp">HP</label>
                                        <input type="text" name="hp" id="hp" onkeypress="return hanyaAngka(event)" value="{{ old('hp') }}" class="form-control @error('hp')
                                            is-invalid
                                        @enderror" placeholder="Masukkan Nomor HP">
                                        @error('hp')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control @error('password')
                                            is-invalid
                                        @enderror" placeholder="Masukkan Password">
                                        @error('password')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button class="btn btn-primary">Simpan</button>
                                <a href="{{ route('backend.user.index') }}">
                                    <button type="button" class="btn btn-secondary">Kembali</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- contentAkhir --}}
@endsection