@extends('pembimbing/layout')

@section('title')
    <title>Dashboard | Absensi Magang</title>
@endsection

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-4 layout-spacing">
            <div class="widget-two">
                <div class="widget-content">
                    <div class="w-numeric-value">
                        <div class="w-content">
                            <span class="w-value">Total Peserta</span>
                            <span class="w-value mt-2">{{ $total_peserta }}</span>
                        </div>
                        <div class="w-icon bg-light-success">
                            <div class="icon">
                                <i class="fa-solid fa-user text-success" style="font-size: 24px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 layout-spacing">
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
        <div class="col-4 layout-spacing">
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
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">
                <div class="widget-heading">
                    <div class="col d-flex justify-content-between align-items-center m-4">
                        <h5 style="font-weight: bold;">Absensi Peserta</h5>
                    </div>
                </div>
                <div class="widget-content">
                    <div class="table-border">
                        <table id="zero-config" class="table dt-table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">Nama</div>
                                    </th>
                                    <th>
                                        <div class="th-content">Waktu</div>
                                    </th>
                                    <th>
                                        <div class="th-content th-heading">Ruangan</div>
                                    </th>
                                    <th>
                                        <div class="th-content">Kegiatan</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absensi as $absen)
                                    <tr>
                                        <td>
                                            <div class="td-content"><span>{{ $absen->user->name }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-content">
                                                <span>{{ $absen->created_at }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-content">
                                                <span class="">
                                                    {{ $absen->room->name }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-content"><span>{!! $absen->activity !!}</span>
                                            </div>
                                        </td>
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
