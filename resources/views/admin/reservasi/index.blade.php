@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <h1 class="page-title">Data Tamu Reservasi</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">List Data Tamu Reservasi</div>
                <div class="btn-group m-b-10">
                    {{-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addRowModal"><i
                            class="fa fa-plus"></i> Tambah</button> --}}
                    <a href="{{ route('cetak.reservasi') }}" class="btn btn-danger btn-sm"><i
                            class="fa fa-solid fa-download"></i> Download PDF</a>
                    <a href="{{ route('export.exell.reservasi') }}" class="btn btn-success btn-sm"><i
                            class="fa fa-solid fa-download"></i> Download Excel</a>
                </div>
            </div>
            <div class="ibox-body">
                <div style="display: flex; align-items: center; gap: 5px;">
                    <input class="form-control" style="width: fit-content;" type="date" id="date1">
                    -
                    <input class="form-control" style="width: fit-content;" type="date" id="date2">
                </div>
                <table class="table table-striped table-bordered table-hover" id="table-row" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Instansi</th>
                            <th scope="col">Keperluan</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Whatsapp</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Hari/Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    {{-- <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <span>Tambah Data Tamu Reservasi</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" id="form-devisi" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nama Tamu</label>
                            <input class="form-control" type="text" name="nama" placeholder="Nama Tamu" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat Tamu</label>
                            <textarea placeholder="alamat" class="form-control" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Instansi Tamu</label>
                            <input class="form-control" type="text" name="instansi" placeholder="Instansi Tamu" required>
                        </div>
                        <div class="form-group">
                            <label>Keperluan</label>
                            <select class="form-control" name="keperluan">
                                <option selected disabled>--Pilih Keperluan---</option>
                                <option value="Permintaan Data">Permintaan Data</option>
                                <option value="Konsultasi Data Statistik">Konsultasi Data Statistik</option>
                                <option value="Konsultasi Lainnya">Konsultasi Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tujuan</label>
                            <select class="form-control" name="tujuan">
                                <option selected disabled>--Pilih Tujuan---</option>
                                @foreach ($pegawai as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }} - {{ $data->jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Konsultasi</label>
                            <select class="form-control" name="jenis">
                                <option selected disabled>--Pilih Jenis---</option>
                                <option value="Berkunjung">Berkunjung</option>
                                <option value="Zoom">Zoom</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jadwal</label>
                            <input class="form-control" type="date" name="jadwal" placeholder="Jadwal" required>
                        </div>
                        <div class="form-group">
                            <label>Whatsapp</label>
                            <input class="form-control" type="text" name="whatsapp" placeholder="Whatsapp" required>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" id="addRowButton"id="btn" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- Edit Modal --}}
    <div class="modal fade editRowModal" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <span>Edit Data Tamu Reservasi</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- Form Edit Reservasi --}}
                    <form action="#" id="edit_form_devisi" method="post">
                        @csrf
                        <input type="hidden" name="emp_id" id="emp_id">
                        <div class="form-group">
                            <label>Nama Tamu</label>
                            <input class="form-control" type="text" name="nama" id="nama"
                                placeholder="Nama Tamu" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat Tamu</label>
                            <textarea placeholder="alamat" class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Instansi Tamu</label>
                            <input class="form-control" type="text" name="instansi" placeholder="Instansi Tamu"
                                id="instansi" required>
                        </div>
                        <div class="form-group">
                            <label>Keperluan</label>
                            <select class="form-control" name="keperluan" id="keperluan">
                                <option selected disabled>--Pilih Keperluan---</option>
                                <option value="Permintaan Data">Permintaan Data</option>
                                <option value="Konsultasi Data Statistik">Konsultasi Data Statistik</option>
                                <option value="Konsultasi Lainnya">Konsultasi Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tujuan</label>
                            <select class="form-control" name="tujuan" id="tujuan">
                                <option selected disabled>--Pilih Tujuan---</option>
                                @foreach ($pegawai as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }} - {{ $data->jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Konsultasi</label>
                            <select class="form-control" name="jenis" id="jenis">
                                <option selected disabled>--Pilih Jenis---</option>
                                <option value="Berkunjung">Berkunjung</option>
                                <option value="Zoom">Zoom</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jadwal</label>
                            <input class="form-control" type="date" name="jadwal" placeholder="Jadwal"
                                id="jadwal" required>
                        </div>
                        <div class="form-group">
                            <label>Whatsapp</label>
                            <input class="form-control" type="text" name="whatsapp" placeholder="Whatsapp"
                                id="whatsapp" required>
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
                    url: '{{ route('adminreservasi.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nama_tamu_reservasi'
                    },
                    {
                        data: 'alamat_tamu_reservasi'
                    },
                    {
                        data: 'instansi_tamu_reservasi'
                    },
                    {
                        data: 'keperluan_tamu_reservasi'
                    },
                    {
                        data: 'nama_pegawai'
                    },
                    {
                        data: 'whatsapp_tamu_reservasi'
                    },
                    {
                        data: 'jenis_konsultasi_tamu_reservasi'
                    },
                    {
                        data: 'jadwal_tamu_reservasi'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });
        });
        // Handle perubahan date1
        $(document).on('change', '#date1', function(e) {
            $('#table-row').DataTable().destroy()
            $('#table-row').DataTable({
                pageLength: 5,
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                bPaginate: false,
                ajax: {
                    url: '{{ route('adminreservasi.data') }}' + "?date1=" + $('#date1').val() + "&date2=" +
                        $('#date2').val(),
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nama_tamu_reservasi'
                    },
                    {
                        data: 'alamat_tamu_reservasi'
                    },
                    {
                        data: 'instansi_tamu_reservasi'
                    },
                    {
                        data: 'keperluan_tamu_reservasi'
                    },
                    {
                        data: 'nama_pegawai'
                    },
                    {
                        data: 'whatsapp_tamu_reservasi'
                    },
                    {
                        data: 'jenis_konsultasi_tamu_reservasi'
                    },
                    {
                        data: 'jadwal_tamu_reservasi'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });
        });
        // Handle perubahan date2
        $(document).on('change', '#date2', function(e) {
            $('#table-row').DataTable().destroy()
            $('#table-row').DataTable({
                pageLength: 5,
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                bPaginate: false,
                ajax: {
                    url: '{{ route('adminreservasi.data') }}' + "?date1=" + $('#date1').val() + "&date2=" +
                        $('#date2').val(),
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nama_tamu_reservasi'
                    },
                    {
                        data: 'alamat_tamu_reservasi'
                    },
                    {
                        data: 'instansi_tamu_reservasi'
                    },
                    {
                        data: 'keperluan_tamu_reservasi'
                    },
                    {
                        data: 'nama_pegawai'
                    },
                    {
                        data: 'whatsapp_tamu_reservasi'
                    },
                    {
                        data: 'jenis_konsultasi_tamu_reservasi'
                    },
                    {
                        data: 'jadwal_tamu_reservasi'
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
            // Fungsi untuk menambahkan reservasi
            $.ajax({
                url: '{{ route('adminreservasi.store') }}',
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
                        message: 'Data Tamu Berhasil Ditambahkan.',
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
                    $("#btn").text('Simpan');
                    $("#form-devisi")[0].reset();
                    $("#addRowModal").modal('hide');
                },
                error: function(result) {
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Gagal!',
                        message: 'Data Tamu Gagal Ditambahkan.',
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
            // Tampilkan data untuk diedit
            $.ajax({
                url: '{{ route('adminreservasi.edit') }}',
                method: 'GET',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                    $("#nama").val(response.nama_tamu_reservasi);
                    $("#alamat").val(response.alamat_tamu_reservasi);
                    $("#instansi").val(response.instansi_tamu_reservasi);
                    $("#jenis").val(response.jenis_konsultasi_tamu_reservasi);
                    $("#jadwal").val(response.jadwal_tamu_reservasi);
                    $("#keperluan").val(response.keperluan_tamu_reservasi);
                    $("#tujuan").val(response.tujuan_tamu_reservasi);
                    $("#whatsapp").val(response.whatsapp_tamu_reservasi);
                    $("#emp_id").val(response.id_reservasi);
                    console.log(response);
                }
            });
        });


        $("#edit_form_devisi").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#edit_btn").text('Perbarui');
            // Panggil fungsi untuk update data reservasi
            $.ajax({
                url: '{{ route('adminreservasi.update') }}',
                method: 'POST',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(result) {
                    if (result.errors) {

                    } else {
                        console.log(result);
                        $.notify({
                            icon: 'flaticon-alarm-1',
                            title: 'Mantap!',
                            message: 'Data Tamu Berhasil Diperbarui.',
                        }, {
                            type: 'success',
                            placement: {
                                from: "bottom",
                                align: "center"
                            },
                            time: 1000,
                        });

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
                        url: '{{ route('adminreservasi.destroy') }}',
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
                                message: 'Data Tamu Berhasil Dihapus.',
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
