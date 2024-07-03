@extends('mahasiswa/layout')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-4 layout-spacing">
            <div class="widget-two">
                <div class="widget-content">
                    <div class="w-numeric-value">
                        <div class="w-content">
                            <span class="w-value">Total Kehadiran</span>
                            <span class="w-value mt-2">10</span>
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

        <div class="col-4 layout-spacing">
            <div class="widget-two">
                <div class="widget-content">
                    <div class="w-numeric-value">
                        <div class="w-content">
                            <span class="w-value">Total Ruangan</span>
                            <span class="w-value mt-2">10</span>
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
                            <h4 style="font-weight: bold;">Riwayat Absensi dan Kegiatan</h4>
                        </div>
                        <table id="zero-config" class="table dt-table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Nama Peserta</th>
                                    <th class="text-center" scope="col">Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2">
                                            </rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        <span class="table-inner-text">25 Apr</span>
                                    </td>
                                    <td>Ruangan 1</td>
                                    <td class="text-center">320</td>
                                </tr>
                                <tr>

                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2">
                                            </rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        <span class="table-inner-text">26 Apr</span>
                                    </td>
                                    <td>Ruangan 2</td>
                                    <td class="text-center">110</td>
                                </tr>
                                <tr>

                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                            <rect x="3" y="4" width="18" height="18" rx="2"
                                                ry="2">
                                            </rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        <span class="table-inner-text">05 May</span>
                                    </td>
                                    <td>Ruangan 3</td>
                                    <td class="text-center">210</td>
                                </tr>
                                <tr>

                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-calendar">
                                            <rect x="3" y="4" width="18" height="18" rx="2"
                                                ry="2">
                                            </rect>
                                            <line x1="16" y1="2" x2="16" y2="6">
                                            </line>
                                            <line x1="8" y1="2" x2="8" y2="6">
                                            </line>
                                            <line x1="3" y1="10" x2="21" y2="10">
                                            </line>
                                        </svg>
                                        <span class="table-inner-text">18 May</span>
                                    </td>
                                    <td>Xavier</td>
                                    <td class="text-center">784</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
