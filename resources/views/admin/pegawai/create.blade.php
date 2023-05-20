@extends('master')

@section('main')
    <div class="card mb-4">
        <h5 class="card-header">Tambah Pegawai</h5>
        <div class="card-body">
            <form action="/admin/pegawai" method="post">
                @csrf

                <div class="row">
                    <div class="col mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama Pegawai"
                            value="{{ old('name') }}" name="name" />
                        @error('name')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Username Pegawai"
                            value="{{ old('username') }}" name="username" />
                        @error('username')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="gender">
                            <option value="L" @if (old('gender') == 'L') selected @endif>
                                Laki - Laki
                            </option>
                            <option value="P" @if (old('gender') == 'P') selected @endif>
                                Perempuan
                            </option>
                        </select>
                        @error('gender')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="domisili" class="form-label">Domisili</label>
                        <input type="text" class="form-control" id="domisili" placeholder="Domisili Pegawai"
                            value="{{ old('domisili') }}" name="domisili" />
                        @error('domisili')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="tipe" class="form-label">Tipe Kerja</label>
                        <select class="form-select" name="type" id="tipe">
                            <option value="full" @if (old('type') == 'full') selected @endif>
                                Full Time
                            </option>
                            <option value="part" @if (old('type') == 'part') selected @endif>
                                Part Time
                            </option>
                        </select>
                        @error('type')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="posisi" class="form-label">Posisi</label>
                        <select class="form-select" name="posisi" id="posisi">
                            <option value="kitchen" @if (old('posisi') == 'kitchen') selected @endif>
                                Kitchen
                            </option>
                            <option value="dishwash" @if (old('posisi') == 'dishwash') selected @endif>
                                Dishwash
                            </option>
                            <option value="gudang" @if (old('posisi') == 'gudang') selected @endif>
                                Gudang
                            </option>
                        </select>
                        @error('posisi')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="telp" class="form-label">Nomor Telepon</label>
                    <input type="number" class="form-control" id="telp" placeholder="Nomor Telepon Pegawai"
                        value="{{ old('telp') }}" name="telp" />
                    @error('telp')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">
                            Password
                        </label>
                    </div>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control" name="password"
                            placeholder="password"
                            value="{{ old('password') }}" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('password')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-danger">Tambah pegawai</button>
                </div>
            </form>
        </div>
    </div>
@endsection
