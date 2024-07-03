@extends('pembimbing/layout')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-4 layout-spacing">
            <div class="widget-two">
                <div class="widget-content">
                    <div class="w-numeric-value">
                        <div class="w-content">
                            <span class="w-value">Total Pengguna</span>
                            <span class="w-value">10</span>
                        </div>
                        <div class="w-icon">
                            <div class="icon">
                                <i class="bi bi-person"></i>

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
                            <span class="w-value">10</span>
                        </div>
                        <div class="w-icon">
                            <div class="icon">
                                <i class="bi bi-person"></i>

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
                            <span class="w-value">10</span>
                        </div>
                        <div class="w-icon">
                            <div class="icon">
                                <i class="bi bi-cow"></i>
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
                        <h5 style="font-weight: bold;">Absensi Minggu Ini</h5>
                        <div class="col-2">
                            <select class="form-control">
                                <option value="1" disabled selected>Pilih Ruangan</option>
                                <option value="2">Opsi 1</option>
                                <option value="3">Opsi 2</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="widget-content">
                    <div class="table-border">
                        <table id="zero-config" class="table dt-table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">Nama Peserta</div>
                                    </th>
                                    <th>
                                        <div class="th-content">Waktu</div>
                                    </th>
                                    <th>
                                        <div class="th-content th-heading">Ruangan</div>
                                    </th>
                                    <th>
                                        <div class="th-content">Status</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="td-content customer-name"><span>Luke Ivory</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-content product-invoice">#46894</div>
                                    </td>
                                    <td>
                                        <div class="td-content pricing"><span class="">$56.07</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-content"><span class="badge badge-success">Paid</span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="td-content customer-name"><span>Andy
                                                King</span></div>
                                    </td>
                                    <td>
                                        <div class="td-content product-invoice">#76894</div>
                                    </td>
                                    <td>
                                        <div class="td-content pricing"><span class="">$88.00</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-content"><span class="badge badge-primary">Shipped</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="td-content customer-name"><span>Laurie Fox</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-content product-invoice">#66894</div>
                                    </td>
                                    <td>
                                        <div class="td-content pricing"><span class="">$126.04</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-content"><span class="badge badge-success">Paid</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="td-content customer-name"><span>Ryan Collins</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-content product-invoice">#89891</div>
                                    </td>
                                    <td>
                                        <div class="td-content pricing"><span class="">$108.09</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-content"><span class="badge badge-primary">Shipped</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="td-content customer-name"><span>Irene
                                                Collins</span></div>
                                    </td>
                                    <td>
                                        <div class="td-content product-invoice">#75844</div>
                                    </td>
                                    <td>
                                        <div class="td-content pricing"><span class="">$84.00</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-content"><span class="badge badge-danger">Pending</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="td-content customer-name"><span>Sonia Shaw</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-content product-invoice">#76844</div>
                                    </td>
                                    <td>
                                        <div class="td-content pricing"><span class="">$110.00</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td-content"><span class="badge badge-success">Paid</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
