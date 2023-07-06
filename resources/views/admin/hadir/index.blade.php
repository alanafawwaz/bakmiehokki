@extends('master')

@push('head')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .dt-buttons{display: none}
      .dataTables_length{display: contents;}
    </style>
@endpush

@section('main')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Kehadiran</h5>
            <div class="btn-group ml-auto" role="group">
                <button class="btn btn-danger px-2" onclick="dataexport('copy')">Copy</button>
                <button class="btn btn-danger px-2" onclick="dataexport('pdf')">PDF</button>
                <button class="btn btn-danger px-2" onclick="dataexport('print')">Print</button>
            </div>
        </div>
        {{-- <div class="table-responsive text-nowrap">
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
        </div> --}}

        <div class="table-responsive m-3">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($hadirs as $hadir)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $hadir->pegawai->name }}</strong></td>
                            <td>{{ $hadir->tanggal }}</td>
                            <td>{{ $hadir->jam }}</td>
                            @php
                                $shift = \App\Models\Shift::where('tanggal', $hadir->tanggal)->first()->start ??
                                        Carbon\Carbon::now()->locale('id_ID')->format('Y-m-d') . ' 10:00';
                                $parse = Carbon\Carbon::parse($shift)->locale('id_ID');
                                $jam   = $parse->diffInHours($hadir->date_full);
                                $menit = $parse->diffInMinutes($hadir->date_full) % 60;
                                $cek   = $parse->gte($hadir->date_full);
                            @endphp
                            <td>
                                @if ($cek)
                                    Tepat waktu
                                @else
                                    Terlambat {{ $jam }} Jam {{ $menit }} Menit
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>Data Kosong</td>
                            <td>Data Kosong</td>
                            <td>Data Kosong</td>
                            <td>Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <!-- Datatables Buttons -->
    <script src="{{ asset('js/dataexport.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
          $('#myTable').DataTable({
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All Pages"]],
            "pageLength": 10,
            "order": [[0, 'asc']],
            "language": {
              "paginate": {
                "previous": "<",
                "next": ">"
              }
            },
            "dom": 'Bfrtip',
            "buttons": ['copy', 'pdf', 'print']
          });
        });
    </script>
@endpush
