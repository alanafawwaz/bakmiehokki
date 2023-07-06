@extends('master')

@section('main')
    <div class="card mb-4">
        <h5 class="card-header">Stock</h5>
        <div class="card-body">
            <form action="/pegawai/stock/{{ $stock->id }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Bahan</label>
                    <input type="text" class="form-control" id="nama" name="name"
                        value="{{ old('name') ?? $stock->name }}" placeholder="Nama Bahan" />
                    @error('name')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ketersediaan" class="form-label">Ketersediaan</label>
                    <input type="text" class="form-control" id="ketersediaan" name="ketersediaan"
                        value="{{ old('ketersediaan') ?? $stock->ketersediaan }}" placeholder="Ketersediaan" />
                    @error('ketersediaan')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                        value="{{ old('tanggal') ?? $stock->tanggal }}" placeholder="{{ date('Y-m-d') }}" />
                    @error('tanggal')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-danger">Ubah Laporan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
