@extends('master')

@push('head')
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/css/pages/page-auth.css') }}" />
    @endpush

@section('main')
    @php $date = \Carbon\Carbon::now()->locale('id_ID'); @endphp
    <div class="container-sm w-50" style="margin-top: -6rem">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="#" class="app-brand-link">
                                <span class="app-brand-text demo text-body fw-bolder mb-nt-5">Absensi</span>
                            </a>
                        </div>
                        <form id="formAuthentication" class="mb-3" action="/pegawai/hadir" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="text" class="form-control" id="tanggal"
                                    placeholder="Tanggal" value="{{
                                        $date->dayName
                                    }}, {{$date->format('d')}} {{$date->monthName}} {{$date->format('Y')}}"
                                    disabled />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="jam">Jam</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="jam" class="form-control"
                                        placeholder="Jam"
                                        value="{{$date->format('H:i')}}"
                                        disabled/>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-danger d-grid w-100" type="submit">Hadir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
