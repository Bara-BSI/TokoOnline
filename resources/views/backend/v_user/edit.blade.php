@extends('backend.v_layouts.app')
@section('content')
    {{-- contentAwal --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('backend.user.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="card-body">
                            <h4 class="card-title">{{ $judul }}</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        {{-- view image --}}
                                        @if ($edit->foto)
                                            <img src="{{ asset('storage/img-user/' . $edit->foto) }}" class="foto-preview" width="100%">
                                            <p></p>
                                        @else
                                            <img src="{{ asset('storage/img-user/img-default.jpg') }}" class="foto-preview" width="100%">
                                            <p></p>
                                        @endif
                                        {{-- file foto --}}
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
                                            <option value="" {{ old('role', $edit->role) == '' ? 'selected' : '' }}>
                                                - Pilih Hak Akses -
                                            </option>
                                            <option value="1" {{ old('role', $edit->role) == '1' ? 'selected' : '' }}>
                                                Super Admin
                                            </option>
                                            <option value="0" {{ old('role', $edit->role) == '0' ? 'selected' : '' }}>
                                                Admin
                                            </option>
                                            <option value="2" {{ old('role', $edit->role) == '2' ? 'selected' : '' }}>
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
                                        <label for="status">Status</label>
                                        <select id="status" class="form-control @error('status')
                                            is-invalid
                                        @enderror" name="status">
                                            <option value="" {{ old('status', $edit->status) == '' ? 'selected' : '' }}>
                                                - Pilih Status -
                                            </option>
                                            <option value="1" {{ old('status', $edit->status) == '1' ? 'selected' : '' }}>
                                                Aktif
                                            </option>
                                            <option value="0" {{ old('status', $edit->status) == '0' ? 'selected' : '' }}>
                                                NonAktif
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback alert-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" value="{{ old('nama', $edit->nama) }}" class="form-control @error('nama')
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
                                        <input type="text" name="email" id="email" value="{{ old('email', $edit->email) }}" class="form-control @error('email')
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
                                        <input type="text" name="hp" id="hp" onkeypress="return hanyaAngka(event)" value="{{ old('hp', $edit->hp) }}" class="form-control @error('hp')
                                            is-invalid
                                        @enderror" placeholder="Masukkan Nomor HP">
                                        @error('hp')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-top">
                            <div class="card-body">
                                <button class="btn btn-primary">Perbarui</button>
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