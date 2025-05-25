@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <h1 class="page-title">Data Pegawai</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">List Data Pegawai</div>
                <div class="btn-group m-b-10">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addRowModal"><i
                            class="fa fa-plus"></i> Tambah</button>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="table-row" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 1%">#</th>
                            <th>Nama Pegawai</th>
                            <th>Devisi</th>
                            <th>Jobdesk</th>
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
                        <span>Tambah Data Pegawai</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- Form pegawai --}}
                    <form action="#" id="form-devisi" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input class="form-control" type="text" name="nama" placeholder="Nama Pegawai" required>
                        </div>
                        <div class="form-group">
                            <label>Devisi Pegawai</label>
                            <input class="form-control" type="text" name="jabatan" placeholder="Devisi Pegawai" required>
                        </div>
                        <div class="form-group">
                            <label>Jobdesc Pegawai</label>
                            <textarea placeholder="Jobdesc" class="form-control" name="jobdesc" rows="3" required></textarea>
                        </div>
                        {{-- Button action untuk kirim atau batalkan --}}
                        <div class="modal-footer border-0">
                            <button type="submit" id="addRowButton"id="btn" class="btn btn-success">Kirim</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                        <span>Edit Data Tamu</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- Form edit pegawai --}}
                    <form action="#" id="edit_form_devisi" method="post">
                        @csrf
                        <input type="hidden" name="emp_id" id="emp_id">
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input class="form-control" type="text" id="nama" name="nama"
                                placeholder="Nama Pegawai" required>
                        </div>
                        <div class="form-group">
                            <label>Devisi Pegawai</label>
                            <input class="form-control" type="text" name="jabatan" id="jabatan"
                                placeholder="Devisi Pegawai" required>
                        </div>
                        <div class="form-group">
                            <label>Jobdesc Pegawai</label>
                            <textarea placeholder="Jobdesc" class="form-control" id="jobdesc" name="jobdesc" rows="3" required></textarea>
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
                    url: '{{ route('pegawai.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nama_pegawai'
                    },
                    {
                        data: 'devisi_pegawai'
                    },
                    {
                        data: 'jobdesk_pegawai'
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
            // Panggil fungsi untuk menambah pegawai
            $.ajax({
                url: '{{ route('pegawai.store') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(result) {
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Mantap!',
                        message: 'Data Pegawai Berhasil Ditambahkan.',
                    }, {
                        type: 'success',
                        placement: {
                            from: "bottom",
                            align: "center"
                        },
                        time: 1000,
                    });
                    // Load tabel
                    table.ajax.reload();
                    $("#btn").text('Simpan');
                    $("#form-devisi")[0].reset();
                    $("#addRowModal").modal('hide');
                },
                error: function(result) {
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Gagal!',
                        message: 'Data Pegawai Gagal Ditambahkan.',
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
            // Tampilkan data untuk edit
            $.ajax({
                url: '{{ route('pegawai.edit') }}',
                method: 'GET',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $("#nip").val(response.nip);
                    $("#nama").val(response.nama_pegawai);
                    $("#jk").val(response.jk);
                    $("#alamat").val(response.alamat);
                    $("#devisi").val(response.devisi_pegawai);
                    $("#jabatan").val(response.devisi_pegawai);
                    $("#jobdesc").val(response.jobdesk_pegawai);
                    $("#emp_id").val(response.id_pegawai);
                }
            });
        });


        $("#edit_form_devisi").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#edit_btn").text('Perbarui');
            // Panggil fungsi untuk update pegawai
            $.ajax({
                url: '{{ route('pegawai.update') }}',
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
                            message: 'Data Pegawai Berhasil Diperbarui.',
                        }, {
                            type: 'success',
                            placement: {
                                from: "bottom",
                                align: "center"
                            },
                            time: 1000,
                        });
                        // Load data table
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
                    // Panggil fungsi untuk hapus data
                    $.ajax({
                        url: '{{ route('pegawai.destroy') }}',
                        method: 'delete',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function(response) {
                            console.log(response);

                            $.notify({
                                icon: 'flaticon-alarm-1',
                                title: 'Mantap!',
                                message: 'Data Pegawai Berhasil Dihapus.',
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
