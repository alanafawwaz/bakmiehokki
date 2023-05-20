@extends('master')

@section('main')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Stock</h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bahan</th>
                        <th>Ketersediaan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($stocks as $stock)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $stock->name }}</strong></td>
                            <td>{{ $stock->ketersediaan }}</td>
                            <td>{{ $stock->tanggal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end px-3 py-3">
            {!! $stocks->links() !!}
        </div>
    </div>
@endsection
