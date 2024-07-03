@extends('pembimbing/layout')

@section('content')
    <div id="tableCustomBasic" class="col-lg-12 col-12 layout-spacing">
        <div class="widget-header">
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <div class="col d-flex justify-content-between align-items-center m-4">
                        <h4 style="font-weight: bold;">Laporan Kehadiran</h4>
                        <button type="button" class="btn btn-primary">Print</button>
                    </div>
                    <table id="zero-config" class="table dt-table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Waktu</th>
                                <th class="text-center" scope="col">Ruangan</th>
                                <th class="text-center" scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Shaun Park</td>
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
                                <td class="text-center">320</td>
                                <td class="text-center">
                                    <span class="badge badge-light-success">Approved</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Alma Clarke</td>
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
                                <td class="text-center">110</td>
                                <td class="text-center">
                                    <span class="badge badge-light-secondary">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Vincent Carpenter</td>
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
                                    <span class="table-inner-text">05 May</span>
                                </td>
                                <td class="text-center">210</td>
                                <td class="text-center">
                                    <span class="badge badge-light-danger">Rejected</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Xavier</td>
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
                                    <span class="table-inner-text">18 May</span>
                                </td>
                                <td class="text-center">784</td>
                                <td class="text-center">
                                    <span class="badge badge-light-info">In Progress</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
