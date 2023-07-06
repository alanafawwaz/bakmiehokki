@extends('master')

@section('main')
    <div class="card mb-4">
        <h5 class="card-header">Edit Shift</h5>
        <div class="card-body">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control" id="nama" placeholder="Nama Pegawai"
                    value="{{ $shift->pegawai->name }}" disabled />
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="{{ date('Y-m-d') }}"
                    value="{{ $shift->tanggal }}" disabled />
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="start" class="form-label">Jam Awal</label>
                    <input type="time" class="form-control" id="start" name="start"placeholder="Jam Awal"
                        value="{{ $shift->start }}" disabled />
                </div>
                <div class="col mb-3">
                    <label for="end" class="form-label">Jam Akhir</label>
                    <input type="time" class="form-control" id="end" name="end"placeholder="Jam Akhir"
                        value="{{ $shift->end }}" disabled />
                </div>
            </div>
            <div class="mb-3">
                <label for="jobdesk" class="form-label">Jobdesk</label>
                <textarea class="form-control" id="jobdesk" name="jobdesk" disabled placeholder="Jobdesk">{{ old('jobdesk') ?? $shift->jobdesk }}</textarea>
            </div>
            <div class="d-flex justify-content-end">
                <a href="/pegawai/shift">
                    <button type="button" class="btn btn-danger">Kembali</button>
                </a>
            </div>
        </div>
    </div>
@endsection
