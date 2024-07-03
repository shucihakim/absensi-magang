@extends('admin/layout')

@section('content')
    <div id="tableCustomBasic" class="col-lg-12 col-12 layout-spacing">

        <div class="widget-header">

        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive m-4">
                <div class="col d-flex justify-content-between align-items-center ">
                    <h4 style="font-weight: bold;">Master Ruangan</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#tambahModal">Tambah</button>
                </div>
                <div class="col">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                                </svg></button>
                            <strong>Info!</strong> {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mt-3">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"><svg>
                                            ... </svg></button>
                                    <strong>Perhatian!</strong> {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <table id="zero-config" class="table dt-table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Dibuat pada</th>
                            <th class="text-center" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <input id="{{ $room->id }}" type="hidden" name="id">
                                <td>
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">{{ $room->name }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">{{ $room->created_at }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="action-btns">
                                        <a href="javascript:void(0);" data-id="{{ $room->id }}" data-name="{{ $room->name }}" class="btn-edit bs-tooltip me-2 text-warning"
                                            data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-edit-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0);" data-id="{{ $room->id }}"  data-name="{{ $room->name }}" class="btn-delete bs-tooltip" data-toggle="tooltip"
                                            data-placement="top" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel"
                    aria-hidden="true">
                    <form action="{{ route('admin.ruangan.tambah') }}" method="POST">\
                        @csrf
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahModalLabel">Tambah Ruangan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        X
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12">
                                        <label for="basic-url" class="form-label">Nama</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Masukan Nama Ruangan"
                                                name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn btn-light-dark" data-bs-dismiss="modal"><i
                                            class="flaticon-cancel-12"></i> Batal</button>
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <form action="{{ route('admin.ruangan.edit') }}" method="POST">\
                        @csrf
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Ruangan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        X
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12">
                                        <label for="basic-url" class="form-label">Nama</label>
                                        <div class="input-group mb-3">
                                            <input id="edit-id" type="hidden" name="id">
                                            <input id="edit-name" type="text" class="form-control" placeholder="Masukan Nama Ruangan"
                                                name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn btn-light-dark" data-bs-dismiss="modal"><i
                                            class="flaticon-cancel-12"></i> Batal</button>
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel"
                    aria-hidden="true">
                    <form action="{{ route('admin.ruangan.hapus') }}" method="POST">\
                        @csrf
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Hapus Ruangan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        X
                                    </button>
                                </div>
                                <input id="delete-id" type="hidden" name="id">
                                <div class="modal-body">
                                    Apakah anda ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn btn-light-dark" data-bs-dismiss="modal"><i
                                            class="flaticon-cancel-12"></i> Batal</button>
                                    <button class="btn btn-primary">Ya</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $('.btn-edit').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#edit-name').val(name);
                $('#edit-id').val(id);
                $('#editModal').modal('show');
            });

            $('.btn-delete').click(function() {
                var id = $(this).data('id');
                $('#delete-id').val(id);
                $('#hapusModal').modal('show');
            });
        });
    </script>
@endsection