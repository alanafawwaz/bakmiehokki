@extends('master')

@section('main')
    <div class="card mb-4">
        <h5 class="card-header">Surat Izin</h5>
        <div class="card-body">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" value="{{ $izin->pegawai->name }}" placeholder="Nama"
                    disabled />
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" value="{{ $izin->tanggal }}" disabled />
            </div>
            <div class="mb-3">
                <label for="alasan" class="form-label">Alasan</label>
                <textarea class="form-control" id="alasan" name="alasan" placeholder="alasan" disabled>{{ $izin->alasan }}</textarea>
            </div>
            <div class="d-flex justify-content-end">
                <a href="/admin/izin">
                    <button type="button" class="btn btn-danger">Kembali</button>
                </a>
            </div>
        </div>
    </div>
@endsection
