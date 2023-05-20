@extends('master')

@section('main')
    <div class="card mb-4">
        <h5 class="card-header">Buat Surat Izin</h5>
        <div class="card-body">
            <form action="/pegawai/izin/{{ $izin->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" value="{{ auth()->user()->name }}"
                        placeholder="Nama" disabled />
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" value="{{ $izin->tanggal }}" disabled />
                </div>
                <div class="mb-3">
                    <label for="alasan" class="form-label">Alasan</label>
                    <textarea class="form-control" id="alasan" name="alasan" placeholder="alasan">{{ old('alasan') ?? $izin->alasan }}</textarea>
                    @error('alasan')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="surat" class="form-label">Upload Surat</label>
                    <span class="text-danger">*apabila perlu diedit</span>
                    <input class="form-control" type="file" id="surat" name="surat" value="{{ $izin->surat }}" />
                    @error('surat')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection
