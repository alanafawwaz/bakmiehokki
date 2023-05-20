@extends('master')

@section('main')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Kehadiran</h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($hadirs as $hadir)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $hadir->pegawai->name }}</strong></td>
                            <td>{{ $hadir->tanggal }}</td>
                            <td>{{ $hadir->jam }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end px-3 py-3">
            {!! $hadirs->links() !!}
        </div>
    </div>
@endsection
