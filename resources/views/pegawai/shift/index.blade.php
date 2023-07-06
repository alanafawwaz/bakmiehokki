@extends('master')

@section('main')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Jadwal Shift</h5>
          </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Jobdesk</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($shifts as $shift)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $shift->pegawai->name }}</strong></td>
                            <td>{{ $shift->tanggal }}</td>
                            <td>{{ $shift->start }} - {{ $shift->end }}</td>
                            <td>{{ substr($shift->jobdesk, 0, 20) }}...</td>
                            <td>
                                <a href="/pegawai/shift/{{$shift->id}}" class="btn btn-sm btn-danger me-2">
                                    <i class="bx bx-info-circle"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end px-3 py-3">
            {!! $shifts->links() !!}
        </div>
    </div>
@endsection
