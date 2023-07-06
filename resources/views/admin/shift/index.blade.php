@extends('master')

@section('main')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Jadwal Shift</h5>
            <a href="/admin/shift/create">
                <button type="button" class="btn btn-danger">Tambah Data</button>
            </a>
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
                                <a href="/admin/shift/{{ $shift->id }}/edit" class="btn btn-sm btn-warning me-2">
                                    <i class="bx bx-edit-alt"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus"
                                    onclick="hapus({{ $shift->id }})">
                                    <i class="bx bx-trash"></i>
                                </button>
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

    <div class="modal fade" id="hapus" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="hapusLink">
                    @csrf
                    @method('DELETE')

                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <p>Apakah anda yakin ingin menghapus data ini ?</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end py-3">
                            <div class="px-3">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary">Hapus</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function hapus(id) {
            $('#hapusLink').attr('action', `/admin/shift/${id}`);
        }
    </script>
@endpush
