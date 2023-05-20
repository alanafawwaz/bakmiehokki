@extends('master')

@push('head')
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
@endpush

@section('main')
    <div class="card mb-4">
        <h5 class="card-header">Tambah Shift</h5>
        <div class="card-body">
            <form action="/admin/shift" method="post">
                @csrf

                <div class="mb-3">
                    <label for="dselect-example" class="form-label">Nama Pegawai</label>
                    <select class="form-select" id="dselect-example" name="pegawai_id">
                        @foreach ($pegawai as $p)
                            @if (old('pegawai_id') == $p->id)
                                <option value="{{ $p->id }}" selected>{{ $p->name }}</option>
                            @endif
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                    @error('pegawai_id')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                        placeholder="{{ date('Y-m-d') }}" value="{{ old('tanggal') ?? '' }}" />
                    @error('tanggal')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="start" class="form-label">Jam Awal</label>
                        <input type="time" class="form-control" id="start" name="start"placeholder="Jam Awal"
                            value="{{ old('start') ?? '' }}" />
                        @error('start')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="end" class="form-label">Jam Akhir</label>
                        <input type="time" class="form-control" id="end" name="end"placeholder="Jam Akhir"
                            value="{{ old('end') ?? '' }}" />
                        @error('end')
                            <div class="text-danger">*{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jobdesk" class="form-label">Jobdesk</label>
                    <textarea class="form-control" id="jobdesk" name="jobdesk" placeholder="Jobdesk">{{ old('jobdesk') ?? '' }}</textarea>
                    @error('jobdesk')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-danger">Buat Shift</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
    <script>
        const config = {
            search: true, // Toggle search feature. Default: false
            creatable: true, // Creatable selection. Default: false
            clearable: true, // Clearable selection. Default: false
            maxHeight: '0px', // Max height for showing scrollbar. Default: 360px
            size: '', // Can be "sm" or "lg". Default ''
        }
        dselect(document.querySelector('#dselect-example'), config)
    </script>
@endpush
