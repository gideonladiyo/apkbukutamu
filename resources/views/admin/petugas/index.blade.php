@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <h1 class="page-title">Data Petugas</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">List Data Petugas</div>
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addRowModal"> <i
                        class="fa fa-plus"></i> Tambah</button>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="table-row" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 1%">#</th>
                            <th>Nama</th>
                            <th>Username Login</th>
                            <th>Email</th>
                            <th style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <span>Tambah Data Petugas</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- Form Tambah Petugas --}}
                    <form action="#" id="form-devisi" method="post">
                        @csrf
                        <input type="hidden" name="role" value="PETUGAS">
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" type="text" name="name" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" placeholder=" Email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" placeholder=" Password" required>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required placeholder="Ketik Ulang Password" autocomplete="new-password">
                        </div>
                        {{-- Button untuk action submit dan cancel --}}
                        <div class="modal-footer border-0">
                            <button type="submit" id="addRowButton"id="btn" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Edit Modal --}}
    <div class="modal fade editRowModal" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <span>Edit Data Petugas</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- Form edit petugas --}}
                    <form action="#" id="edit_form_devisi" method="post">
                        @csrf
                        <input type="hidden" name="emp_id" id="emp_id">
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Nama"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" id="username"
                                placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" id="email"
                                placeholder=" E-mail" required>
                        </div>
                        {{-- Button untuk action submit dan cancel --}}
                        <div class="modal-footer border-0">
                            <button type="submit" id="addRowButton"id="edit_btn" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
@endpush
@push('js')
    <script src="./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        let table;
        $(document).ready(function() {
            // Load data table
            table = $('#table-row').DataTable({
                pageLength: 5,
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                bPaginate: false,
                ajax: {
                    url: '{{ route('user.data.petugas') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'username'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });
        });

        $("#form-devisi").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#btn").text('Menyimpan...');
            // Panggil fungsi untuk simpan petugas
            $.ajax({
                url: '{{ route('user.store') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    // Tampilkan notifikasi berhasil
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Mantap!',
                        message: 'Data User Berhasil Ditambahkan.',
                    }, {
                        type: 'success',
                        placement: {
                            from: "bottom",
                            align: "center"
                        },
                        time: 1000,
                    });
                    // Load data tabel
                    table.ajax.reload();
                    $("#btn").text('Simpan');
                    $("#form-devisi")[0].reset();
                    $("#addRowModal").modal('hide');
                },
                errors: function(response) {
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Gagal!',
                        message: 'Data Devisi Gagal Ditambahkan.',
                    }, {
                        type: 'danger',
                        placement: {
                            from: "bottom",
                            align: "center"
                        },
                        time: 1000,
                    });
                }
            });
        });

        $(document).on('click', '.editIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            // Panggil fungsi untuk edit data
            $.ajax({
                url: '{{ route('user.edit') }}',
                method: 'GET',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $("#name").val(response.name);
                    $("#username").val(response.username);
                    $("#email").val(response.email);
                    $("#password").val(response.password);
                    $("#emp_id").val(response.id);
                }
            });
        });


        $("#edit_form_devisi").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#edit_btn").text('Perbarui');
            // Panggil fungsi untuk update data
            $.ajax({
                url: '{{ route('user.update') }}',
                method: 'POST',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(result) {
                    if (result.errors) {

                    } else {
                        // Tampilkan notifikasi berhasil
                        $.notify({
                            icon: 'flaticon-alarm-1',
                            title: 'Mantap!',
                            message: 'Data Devisi Berhasil Diperbarui.',
                        }, {
                            type: 'success',
                            placement: {
                                from: "bottom",
                                align: "center"
                            },
                            time: 1000,
                        });
                        // Reload data table
                        table.ajax.reload();
                        $("#edit_btn").text('Perbarui');
                        $("#edit_form_devisi")[0].reset();
                        $("#editRowModal").modal('hide');
                    }
                }
            });
        });

        $(document).on('click', '.deleteIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let csrf = '{{ csrf_token() }}';
            // Tampilkan alert konfirmasi hapus
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "Data Tidak Dapat Dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#716aca',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('user.destroy') }}',
                        method: 'delete',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function(response) {
                            console.log(response);
                            // Kirim notifikasi berhasil
                            $.notify({
                                icon: 'flaticon-alarm-1',
                                title: 'Mantap!',
                                message: 'Data User Berhasil Dihapus.',
                            }, {
                                type: 'success',
                                placement: {
                                    from: "bottom",
                                    align: "center"
                                },
                                time: 1000,
                            });
                            table.ajax.reload();
                        }
                    });
                }
            })
        });
    </script>
@endpush
