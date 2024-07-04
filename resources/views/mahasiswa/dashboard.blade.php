@extends('mahasiswa/layout')

@section('title')
    <title>Dashboard | Absensi Magang</title>
@endsection

@section('content')
    <div class="row layout-top-spacing">
        <div class="col col-md-6 layout-spacing">
            <div class="widget-two">
                <div class="widget-content">
                    <div class="w-numeric-value">
                        <div class="w-content">
                            <span class="w-value">Total Kehadiran</span>
                            <span class="w-value mt-2">{{ $total_kehadiran }}</span>
                        </div>
                        <div class="w-icon bg-light-warning">
                            <div class="icon">
                                <i class="fa-solid fa-clock" style="font-size: 24px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col col-md-6 layout-spacing">
            <div class="widget-two">
                <div class="widget-content">
                    <div class="w-numeric-value">
                        <div class="w-content">
                            <span class="w-value">Total Ruangan</span>
                            <span class="w-value mt-2">{{ $total_ruangan }}</span>
                        </div>
                        <div class="w-icon bg-light-primary">
                            <div class="icon">
                                <i class="fa-solid fa-door-open" style="font-size: 24px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tableCustomBasic" class="col-lg-12 col-12 layout-spacing">
            <div class="widget-header">
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <div class="col d-flex justify-content-between align-items-center m-4">
                            <h4 style="font-weight: bold;">Riwayat Absensi</h4>
                        </div>
                        <table id="zero-config" class="table dt-table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Ruangan</th>
                                    <th class="text-center" scope="col">Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absensi as $absen)
                                    <tr>
                                        <td>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-calendar">
                                                <rect x="3" y="4" width="18" height="18" rx="2"
                                                    ry="2">
                                                </rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                            <span class="table-inner-text">{{ $absen->created_at }}</span>
                                        </td>
                                        <td>{{ $absen->room->name }}</td>
                                        <td class="text-center">{!! $absen->activity !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
