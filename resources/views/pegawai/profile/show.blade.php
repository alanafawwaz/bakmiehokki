@extends('master')

@section('main')
    <div class="card mb-4">
        <h5 class="card-header">Data Pegawai</h5>
        <div class="card-body">
            <form action="{{route('postProfile')}}" method="post">
                @csrf
                @foreach ($profile as $pegawai)
                <div class="row">
                    <div class="col mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama Pegawai"
                            value="{{$pegawai->name}}" name="name">
                        @error('name')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="telp" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" id="telp" placeholder="Nomor Telepon Pegawai"
                            value="{{$pegawai->telp}}" name="telp">
                        @error('telp')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="gender">
                            <option value="L" @if (old('gender') ?? $pegawai->gender == 'L') selected @endif>
                                Laki - Laki
                            </option>
                            <option value="P" @if (old('gender') ?? $pegawai->gender == 'P') selected @endif>
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
                            value="{{$pegawai->domisili}}" name="domisili">
                        @error('domisili')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="tipe" class="form-label">Tipe Kerja</label>
                        <select class="form-select" name="type" id="tipe" disabled>
                            <option value="full" @if (old('type') ?? $pegawai->type == 'full') selected @endif>
                                Full Time
                            </option>
                            <option value="part" @if (old('type') ?? $pegawai->type == 'part') selected @endif>
                                Part Time
                            </option>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="posisi" class="form-label">Posisi</label>
                        <select class="form-select" name="posisi" id="posisi" disabled>
                            <option value="kitchen" @if (old('posisi') ?? $pegawai->posisi == 'kitchen') selected @endif>
                                Kitchen
                            </option>
                            <option value="dishwash" @if (old('posisi') ?? $pegawai->posisi == 'dishwash') selected @endif>
                                Dishwash
                            </option>
                            <option value="gudang" @if (old('posisi') ?? $pegawai->posisi == 'gudang') selected @endif>
                                Gudang
                            </option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Username <span class="text-danger">*Jika diperlukan</span></label>
                    <input type="text" class="form-control" id="email" placeholder="Username Pegawai"
                        value="" name="username">
                    @error('username')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*Jika diperlukan</span></label>
                    <input type="text" class="form-control" id="email" placeholder="Email Pegawai"
                        value="" name="email">
                    @error('email')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password <span class="text-danger">*Jika diperlukan</span></label>
                    <input type="text" class="form-control" id="password" placeholder="Password"
                        value="" name="password">
                    @error('password')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-danger">Update</button>
                </div>
                @endforeach
            </form>
        </div>
    </div>
@endsection
