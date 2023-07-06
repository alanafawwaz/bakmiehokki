@extends('master')

@section('main')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            @if (auth()->user()->role == 'pegawai')
                {{-- Satu paket --}}
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Hello, {{auth()->user()->name}}! 🎉</h5>
                                <p class="mb-4">
                                    Belum sempat <span class="fw-bold">absensi</span> hari ini ? Klik tombol dibawah untuk menuju absensi 👇
                                </p>

                                <a href="/pegawai/hadir" class="btn btn-sm btn-outline-danger">Halaman Absensi</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('template/assets/img/illustrations/man-with-laptop-light.jpg') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.jpg"
                                    data-app-light-img="illustrations/man-with-laptop-light.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Satu paket --}}
                <div class="card mt-3">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Jadwal Shift</h5>
                                <p class="mb-4">
                                    Cek Jadwal Shiftmu ! 👇
                                </p>

                                <a href="/pegawai/shift" class="btn btn-sm btn-outline-danger">Halaman Jadwal Shift</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('template/assets/img/illustrations/jadwalshift.jpg') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.jpg"
                                    data-app-light-img="illustrations/man-with-laptop-light.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Perizinan</h5>
                                <p class="mb-4">
                                    Silahkan isi perizinan bila berhalangan hadir ! 👇
                                </p>

                                <a href="/pegawai/izin" class="btn btn-sm btn-outline-danger">Halaman Perizinan</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('template/assets/img/illustrations/perizinan.png') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.jpg"
                                    data-app-light-img="illustrations/man-with-laptop-light.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Stock Bahan</h5>
                                <p class="mb-4">
                                    Silahkan rekap stock bahan hari ini ! 👇
                                </p>

                                <a href="/pegawai/stock" class="btn btn-sm btn-outline-danger">Halaman Stock Bahan</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('template/assets/img/illustrations/stockbahan.png') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.jpg"
                                    data-app-light-img="illustrations/man-with-laptop-light.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
            @endif
                {{-- admin --}}
            @if (auth()->user()->role == 'admin')
                <div class="card mt-3">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Hello, {{auth()->user()->name}}! 🎉</h5>
                                <p class="mb-4">
                                    Cek absensi pegawai <span class="fw-bold">hari ini</span> yuk ! Klik tombol dibawah untuk menuju absensi 👇
                                </p>

                                <a href="/admin/hadir" class="btn btn-sm btn-outline-danger">Halaman Absensi</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('template/assets/img/illustrations/man-with-laptop-light.jpg') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.jpg"
                                    data-app-light-img="illustrations/man-with-laptop-light.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Jadwal Shift</h5>
                                <p class="mb-4">
                                    Mari buat jadwal shift untuk pegawai 👇
                                </p>

                                <a href="/admin/shift" class="btn btn-sm btn-outline-danger">Halaman Jadwal Shift</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('template/assets/img/illustrations/jadwalshift.jpg') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.jpg"
                                    data-app-light-img="illustrations/man-with-laptop-light.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Perizinan</h5>
                                <p class="mb-4">
                                    Cek perizinan para pegawai yuk !👇
                                </p>

                                <a href="/admin/izin" class="btn btn-sm btn-outline-danger">Halaman Perizinan</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('template/assets/img/illustrations/perizinan.png') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.jpg"
                                    data-app-light-img="illustrations/man-with-laptop-light.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Stock Bahan</h5>
                                <p class="mb-4">
                                    Mari cek stock bahan hari ini ! 👇
                                </p>

                                <a href="/admin/stock" class="btn btn-sm btn-outline-danger">Halaman Stock Bahan</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('template/assets/img/illustrations/stockbahan.png') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.jpg"
                                    data-app-light-img="illustrations/man-with-laptop-light.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Data Pegawai</h5>
                                <p class="mb-4">
                                    Klik tombol dibawah untuk melihat data pegawai 👇
                                </p>

                                <a href="/admin/pegawai" class="btn btn-sm btn-outline-danger">Halaman Data Pegawai</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('template/assets/img/illustrations/datapegawai.png') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.jpg"
                                    data-app-light-img="illustrations/man-with-laptop-light.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
