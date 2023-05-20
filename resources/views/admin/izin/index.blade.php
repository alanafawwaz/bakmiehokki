@extends('master')

@section('main')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Perizinan</h5>
          </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Surat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($izins as $izin)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $izin->pegawai->name }}</strong></td>
                            <td>{{ $izin->tanggal }}</td>
                            <td>{{ $izin->surat }}</td>
                            <td>
                                <a href="/admin/izin/{{$izin->id}}" class="btn btn-sm btn-danger me-2">
                                    <i class="bx bx-info-circle"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end px-3 py-3">
            {!! $izins->links() !!}
        </div>
    </div>
@endsection
