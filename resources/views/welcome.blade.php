<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>E-Lakoni</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/logo-lakoni.png" rel="icon">
    <link href="/assets/img/logo-lakoni.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="tamu/vendor/aos/aos.css" rel="stylesheet">
    <link href="tamu/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="tamu/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="tamu/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="tamu/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="tamu/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="tamu/css/style.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top  header-transparent ">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a class="flex gap-2 items-center font-bold text-xl" href="/">
                        <img src="/assets/img/logo-lakoni.png" alt="">
                        E-Lakoni
                    </a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#tamu">List Tamu</a></li>
                    <li class="text-[#043277]">
                        <a class="text-[#043277]">
                            <div class="flex gap-1 items-center justify-start">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                </svg>
                                <span class="reservation-count">
                                    {{ count($reservasi) }}
                                </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="getstarted scrollto">Log Out</button>
                        </form>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up">
                    <div>
                        <h1>Selamat Datang</h1>
                        <h2>Di Aplikasi Buku Tamu, Silahkan klik tombol dibawah untuk menambahkan Tamu</h2>
                        {{-- <button type="button" href="#" class="download-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Tamu Baru</button> --}}
                        <a href="#addtamu" class="download-btn py-2 px-5">Tambah Tamu Baru</a>
                    </div>
                </div>
                <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img"
                    data-aos="fade-up">
                    <img src="tamu/img/Logo_BPS.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Tampil data tamu Section ======= -->
        <section id="tamu" class="gallery">
            <div class="gallery" data-aos="fade-up">
                <div class="section-title">
                    <h2>List Data Tamu Berkunjung</h2>
                    <p>
                        Menampilkan Data Tamu Sesuai data yang sudah di inputkan, jika terdapat kesalahan data silahkan
                        hubungi Admin.
                    </p>
                </div>
            </div>
            <div class="container-fluid" data-aos="fade-up">
                <div class="card">
                    <div class="card-body px-sm-1">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="table-row" cellspacing="0"
                                width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Instansi</th>
                                        <th scope="col">Keperluan</th>
                                        <th scope="col">Tujuan</th>
                                        <th scope="col">Kontak</th>
                                        <th scope="col">Hari/Tanggal</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Gallery Section -->
        <!-- ======= Tampil data tamu Section ======= -->
        <section id="tamu" class="gallery">
            <div class="gallery" data-aos="fade-up">
                <div class="section-title">
                    <h2>List Data Tamu Reservasi</h2>
                    <p>
                        Menampilkan Data Tamu Sesuai data yang sudah di inputkan, jika terdapat kesalahan data silahkan
                        hubungi Admin.
                    </p>
                </div>
            </div>
            <div class="container-fluid" data-aos="fade-up">
                <div class="card">
                    <div class="card-body px-sm-1">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="table-row-reservasi"
                                cellspacing="0" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Instansi</th>
                                        <th scope="col">Keperluan</th>
                                        <th scope="col">Tujuan</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Whatsapp</th>
                                        <th scope="col">Hari/Tanggal</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Gallery Section -->

        <!-- ======= Details Section ======= -->
        <section id="details" class="details">
            <div class="container">
                <div class="row content">
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="tamu/img/details-1.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-8 pt-4" data-aos="fade-up">
                        <h3>Visi & Misi Instansi</h3>
                        <p class="fst-italic">
                            Visi
                        </p>
                        <p>
                            1. Visi penyedia data statistik berkualitas untuk indonesia maju. Dengan visi baru ini,
                            eksistensi BPS
                            sebagai penyedia data dan informasi statistik menjadi semakin penting, karena memegang peran
                            dan pengaruh
                            sentral dalam penyediaan statistik berkualitas tidak hanya di Indonesia, melainkan juga di
                            tingkat dunia.
                            Dengan visi tersebut juga, semakin menguatkan peran BPS sebagai pembina data statistik.
                        </p>
                        <p class="fst-italic">
                            Misi
                        </p>
                        <p>
                            Misi BPS dirumuskan dengan memperhatikan fungsi dan kewenangan BPS, visi BPS serta
                            melaksanakan Misi
                            Presiden dan Wakil Presiden yang Ke-1 (Peningkatan Kualitas Manusia Indonesia), Ke-2
                            (Struktur Ekonomi
                            yang Produktif, Mandiri, dan Berdaya Saing) dan yang Ke-3 Pembangunan yang Merata dan
                            Berkeadilan, dengan
                            uraian sebagai berikut:<br>
                            1. Menyediakan statistik berkualitas yang berstandar nasional dan internasional<br>
                            2. Membina K/L/D/I melalui Sistem Statistik Nasional yang berkesinambungan<br>
                            3. Mewujudkan pelayanan prima di bidang statistik untuk terwujudnya Sistem Statistik
                            Nasional

                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Details Section -->


        <!-- ======= Tambah Tamu Section ======= -->
        <section id="addtamu" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Tambah Tamu Baru</h2>
                    <p>
                        Silahkan input data tamu dengan benar !
                    </p>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6 info">
                                <i class="bx bx-map"></i>
                                <h4>Alamat</h4>
                                <p>Jl. Bonorogo No.34A,<br>Tebana, Lawangan Daya, Kec. Pademawu, Kabupaten Pamekasan,
                                    Jawa Timur 69323</p>
                            </div>
                            <div class="col-lg-6 info">
                                <i class="bx bx-phone"></i>
                                <h4>Hubungi Kami</h4>
                                <p>(0324) 328834</p>
                            </div>
                            <div class="col-lg-6 info">
                                <i class="bx bx-envelope"></i>
                                <h4>Email Kami</h4>
                                <p>https://pamekasankab.bps.go.id</p>
                            </div>
                            <div class="col-lg-6 info">
                                <i class="bx bx-time-five"></i>
                                <h4>Jam Kerja</h4>
                                <p>Senin - Kamis : <br>08:00 AM - 16:00 PM<br>Jum'at : <br>08:00 AM - 16:30 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <form action="{{ route('tamu.store') }}" method="post" role="form"
                            class="php-email-form" data-aos="fade-up">
                            @csrf
                            <div class="form-group">
                                <input placeholder="Nama Tamu" type="text" name="nama" class="form-control"
                                    id="name" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea placeholder="Alamat" class="form-control" name="alamat" rows="5" required></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <input placeholder="Instansi" type="text" name="instansi"
                                    class="form-control" id="instansi" required>
                            </div>
                            <div class="form-group mt-3">
                                <select class="form-select" name="keperluan" aria-label="Default select example">
                                    <option selected disabled>--Pilih Keperluan---</option>
                                    <option value="Permintaan Data">Permintaan Data</option>
                                    <option value="Konsultasi Data Statistik">Konsultasi Data Statistik</option>
                                    <option value="Konsultasi Lainnya">Konsultasi Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <select class="form-select" name="tujuan" aria-label="Default select example">
                                    <option selected disabled>--Pilih Tujuan---</option>
                                    @foreach ($pegawai as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }} - {{ $data->jabatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <input placeholder="Kontak" type="text" class="form-control" name="kontak"
                                    id="subject" required>
                            </div>
                            <div class="text-center">
                                <button type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container py-4">
            <div class="copyright">
                &copy; Badan Pusat Statistik Kabupaten Pamekasan | 2024
            </div>
            <div class="credits">
                Website : <a href="https://pamekasankab.bps.go.id">BPS Pamekasan</a>
            </div>
        </div>
    </footer><!-- End Footer -->
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="tamu/vendor/aos/aos.js"></script>
    <script src="tamu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="tamu/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="tamu/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/vendors/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    {{-- <script src="tamu/vendor/php-email-form/validate.js"></script> --}}
    <script src="./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <!-- Template Main JS File -->
    <script src="tamu/js/main.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>

    <script>
        let reservasiTable;
        let table;

        function formatDate(inputDate) {
            // Parse the input string as a Date object
            const dateParts = inputDate.split("-");
            const year = parseInt(dateParts[0], 10);
            const month = parseInt(dateParts[1], 10) - 1; // Months are 0-based in JavaScript Date objects
            const day = parseInt(dateParts[2], 10);

            const date = new Date(year, month, day);

            // Add 1 day
            date.setMonth(date.getMonth() - 1);
            // date.setDate(date.getDate() + 1);

            // Format the date into "dd-mm-yyyy"
            const formattedDate = ("0" + date.getDate()).slice(-2) + "-" +
                ("0" + (date.getMonth() + 1)).slice(-2) + "-" + // Months are 0-based
                date.getFullYear();

            return formattedDate;
        }
        $(document).ready(function() {
            // Load table tamu

            table = $('#table-row').DataTable({
                pageLength: 7,
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                bPaginate: false,
                ajax: {
                    url: '{{ route('tamu.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nama_tamu_berkunjung'
                    },
                    {
                        data: 'alamat_tamu_berkunjung'
                    },
                    {
                        data: 'instansi_tamu_berkunjung'
                    },
                    {
                        data: 'keperluan_tamu_berkunjung'
                    },
                    {
                        data: 'nama_devisi'
                    },
                    {
                        data: 'kontak_tamu_berkunjung'
                    },
                    {
                        data: 'hari'
                    },
                ]
            });
        });
        $(document).ready(function() {
            // Function to fetch data from the server
            reservasiTable = $('#table-row-reservasi').DataTable({
                pageLength: 7,
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                bPaginate: false,
                ajax: {
                    url: '{{ route('reservasi.data') }}',
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
                        data: 'jenis_konsultasi_tamu_reservasi'
                    },
                    {
                        data: 'whatsapp_tamu_reservasi'
                    },
                    {
                        data: 'jadwal'
                    },
                    {
                        data: 'aksi'
                    },
                ]
            });
        });
        $(document).ready(function() {
            // Function to fetch data from the server
            let fetchCount = 0;
            let lastDataLength = 0;

            let fetchTamuCount = 0;
            let lastDataTamuLength = 0;

            // Responsive table reservasi
            function fetchData() {
                $.ajax({
                    url: '{{ route('reservasi.data') }}', // URL to your controller method
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);

                        // Assuming response.data contains the array of reservations
                        const data = response.data;

                        if (fetchCount >= 1) {
                            // Check if the length of new data is different from the last length
                            if (lastDataLength < data.length) {
                                // If new data has been added, show a notification
                                const newReservation = data[
                                    0]; // Assuming the new reservation is the last one in the array
                                $.notify({
                                    icon: 'flaticon-alarm-1',
                                    title: 'Reservasi Baru',
                                    message: `
                                        <br>Catatan: Silakan periksa list data tamu reservasi untuk lebih lengkapnya.
                                    `,
                                }, {
                                    type: 'success',
                                    placement: {
                                        from: "top",
                                        align: "center"
                                    },
                                    time: 5000,
                                });
                            }
                            if (lastDataLength != data.length) {

                                // Update reservation count display
                                let filteredData = data.filter(item => !item.is_accepted);
                                const reservationCountElement = document.querySelector(
                                    '.reservation-count');
                                if (reservationCountElement) {
                                    reservationCountElement.textContent = filteredData.length;
                                }

                                // Reload the DataTable
                                reservasiTable.ajax.reload();
                            }
                        }

                        // Increment fetchCount after first run
                        if (fetchCount == 0) {
                            fetchCount += 1;
                        }

                        // Update lastDataLength
                        lastDataLength = data.length;
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            function formatDate(dateString) {
                // Implement your date formatting logic here
                return new Date(dateString).toLocaleDateString();
            }

            // Tabel tamu responsive
            function fetchDataTamu() {
                $.ajax({
                    url: '{{ route('tamu.rawdata') }}', // URL to your controller method
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (fetchTamuCount >= 1 && lastDataTamuLength != data.length) {
                            table.ajax.reload();
                        }
                        if (fetchTamuCount == 0) {
                            fetchTamuCount += 1
                        }
                        lastDataTamuLength = data.length
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Fetch data every second (1000 milliseconds)
            setInterval(fetchData, 1000);
            setInterval(fetchDataTamu, 1000);
        });
        $(document).on('click', '.acceptIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let csrf = '{{ csrf_token() }}';
            // Tampilkan alert konfirmasi accept reservasi
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "Data Tidak Dapat Dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#716aca',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Accept'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim fungsi untuk accept reservasi
                    $.ajax({
                        url: '{{ route('adminreservasi.accept') }}',
                        method: 'post',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function(response) {
                            // Trigger Jumlah Notifikasi
                            let currentCount = parseInt(document.querySelector(
                                '.reservation-count').textContent) || 0;
                            const reservationCountElement = document.querySelector(
                                '.reservation-count');
                            if (reservationCountElement) {
                                currentCount -= 1; // Decrement current count by 1
                                reservationCountElement.textContent = currentCount;
                            }
                            reservasiTable.ajax.reload();
                        }
                    });
                }
            })
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
                            reservasiTable.ajax.reload();
                        }
                    });
                }
            })
        });
        $(document).on('click', '.editIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id'); // Get the ID of the reservation
            let csrf = '{{ csrf_token() }}'; // Get CSRF token for Laravel

            Swal.fire({
                title: "Pilih Jadwal",
                input: "date",
                inputAttributes: {
                    name: "jadwal"
                },
                showCancelButton: true,
                confirmButtonText: "Simpan",
                showLoaderOnConfirm: true,
                preConfirm: async (jadwal) => {
                    if (!jadwal) {
                        return Swal.showValidationMessage("Please choose a date");
                    }

                    // Return jadwal for further use in the then block
                    return {
                        jadwal: jadwal
                    };
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform AJAX request to update jadwal using the route adminReservasi.updateJadwal
                    $.ajax({
                        url: '{{ route('adminreservasi.updateJadwal') }}', // Route for updating jadwal
                        method: 'PUT', // Use PUT method
                        data: {
                            id: id, // Reservation ID
                            jadwal: result.value.jadwal, // Selected jadwal
                            _token: csrf // CSRF token for security
                        },
                        success: function(response) {
                            // Handle successful response
                            Swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: 'success'
                            });
                            // Reload the datatable if necessary
                            reservasiTable.ajax
                                .reload(); // Refresh the datatable to reflect the changes
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to update jadwal.',
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>
