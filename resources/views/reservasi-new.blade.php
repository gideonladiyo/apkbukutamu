<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Lakoni | Reservasi</title>
    <!-- Favicons -->
    <link href="/assets/img/logo-lakoni.png" rel="icon">
    <link href="/assets/img/logo-lakoni.png" rel="apple-touch-icon">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<!-- Bar Menu -->
<header class="flex bg-[#043277] w-full justify-center shadow-md">
    <div class="max-w-[1200px] w-full flex justify-between items-center py-5 px-5">
        <!-- Logo BPS dan Nama -->
        <div class="flex items-center gap-3">
            <img src="{{ asset('assets/img/BerAKHLAK.png') }}" alt="Logo BerAKHLAK" class="w-auto h-[40px]">
            <img src="{{ asset('tamu/img/Logo_BPS.png') }}" alt="Logo BPS" class="w-auto h-[40px] mx-2">
            <span class="text-white font-bold text-lg ml-2">
                BPS Kabupaten Pamekasan
            </span>
        </div>
        <!-- Navigation Menu -->
        <nav class="bg-[#1E2A47] p-2 rounded-lg">
            <ul class="flex gap-5">
                <li>
                    <a href="https://s.bps.go.id/kepuasan3528" class="text-white text-sm hover:underline">
                        <span class="relative nav-underline underline-offset-8 decoration-2 decoration-amber-300">Survei Kepuasan Masyarakat</span>
                    </a>
                </li>
                <li>
                    <a href="https://ppid.bps.go.id/?mfd=3528" class="text-white text-sm hover:underline">
                        <span
                            class="relative nav-underline underline-offset-8 decoration-2 decoration-amber-300">Informasi Publik</span>
                    </a>
                </li>
                <li>
                    <a href="http://s.bps.go.id/layanan3528" class="text-white text-sm hover:underline">
                        <span
                            class="relative nav-underline underline-offset-8 decoration-2 decoration-amber-300">Layanan</span>
                    </a>
                </li>
                <li>
                    <a href="http://s.bps.go.id/pengaduan3528" class="text-white text-sm hover:underline">
                        <span
                            class="relative nav-underline underline-offset-8 decoration-2 decoration-amber-300">Pengaduan</span>
                    </a>
                </li>
                <li>
                    <a href="http://s.bps.go.id/elakoni3528" class="text-white text-sm hover:underline">
                        <span
                            class="relative nav-underline underline-offset-8 decoration-2 decoration-amber-300">Manual</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<body>

    <main class="w-full">
        <section class="w-full flex justify-center">
            <div class="w-full max-w-[1200px] flex justify-between items-center py-5 px-5">
                <div class="w-1/2 flex flex-col gap-5">
                    <h1 class="text-[#043277] font-bold text-4xl font-sans">
                        Selamat Datang <br><span
                            class="relative underline underline-offset-8 decoration-2 decoration-amber-300">di Aplikasi
                            E-Lakoni</span>
                    </h1>
                    <p class="text-[#043277] text-xl font-medium font-sans">
                        Layanan bagi instansi pemerintah di lingkup OPD Pemerintah Kabupaten Pamekasan dalam rangka
                        pendampingan penyelenggaraan statistik sektoral oleh Badan Pusat Statistik Kab. Pamekasan.
                    </p>
                    <a class="text-white text-xl py-3 px-5 bg-[#043277] w-fit font-bold rounded-full"
                        href="#formReservasi">Reservasi</a>
                </div>
                <img class="w-5/12 h-auto" src="{{ asset('assets/img/e-lakoni.png') }}" alt="Illustration">
            </div>
        </section>
        <section class="w-full flex justify-center bg-[#043277]">
            <div class="w-full max-w-[1200px] py-10 px-5 flex flex-col gap-5">
                <p class="text-center text-white text-5xl font-medium">Maklumat Pelayanan</p>
                <p class="text-white italic font-medium text-center">Dengan ini kami menyatakan sanggup menyelenggarakan
                    pelayanan sesuai dengan standar pelayanan yang telah ditetapkan dan apabila kami tidak menepati
                    janji, kami siap menerima sanksi sesuai dengan peraturan yang berlaku.</p>
            </div>
        </section>
        <section class="w-full flex justify-center">
            <div class="w-full max-w-[1200px] py-5 px-5 flex flex-col gap-5">
                <div>
                    <p class="text-gray-400 font-medium flex items-center gap-5">
                        STANDAR PELAYANAN
                        <span class="block h-[3px] w-[200px] bg-amber-300"></span>
                    </p>
                    <p class="text-2xl font-bold text-[#043277]">MEKANISME LAYANAN RESERVASI</p>
                </div>
                <div class="w-full flex">
                    <div class="w-1/2 flex flex-col gap-5">
                        <div class="group flex gap-5">
                            <div
                                class="p-2 h-fit w-fit border border-amber-300 group-hover:bg-amber-300 rounded-full duration-700">
                                <span
                                    class="flex justify-center items-center w-[40px] h-[40px] text-white bg-amber-300 group-hover:bg-white group-hover:text-amber-300 text-2xl rounded-full duration-700">
                                    1
                                </span>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p class="text-xl font-bold group-hover:text-amber-300">Pengajuan</p>
                                <p>Penggunan layanan mengisi form reservasi.</p>
                            </div>
                        </div>
                        <div class="group flex gap-5">
                            <div
                                class="p-2 h-fit w-fit flex justify-center items-center border border-amber-300 group-hover:bg-amber-300 rounded-full duration-700">
                                <span
                                    class="flex justify-center items-center w-[40px] h-[40px] text-white bg-amber-300 group-hover:bg-white group-hover:text-amber-300 text-2xl rounded-full duration-700">
                                    2
                                </span>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p class="text-xl font-bold group-hover:text-amber-300">Pemeriksaan</p>
                                <p>Petugas melakukan pemeriksaan atas pengajuan reservasi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 flex flex-col gap-5">
                        <div class="group flex gap-5">
                            <div
                                class="p-2 h-fit w-fit border border-amber-300 group-hover:bg-amber-300 rounded-full duration-700">
                                <span
                                    class="flex justify-center items-center w-[40px] h-[40px] text-white bg-amber-300 group-hover:bg-white group-hover:text-amber-300 text-2xl rounded-full duration-700">
                                    3
                                </span>
                            </div>
                            <div class="flex flex-col gap-2">
                                <p class="text-xl font-bold group-hover:text-amber-300">Konfirmasi</p>
                                <p>Pengguna layanan akan mendapatkan konfirmasi dari petugas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="w-full flex justify-center bg-[#043277]" id="formReservasi">
            <form class="w-full max-w-[1200px] py-10 px-5 flex flex-col gap-5" action="{{ route('reservasi.store') }}">
                @csrf
                <h2 class="text-center text-2xl font-bold text-white">Form Reservasi</h2>
                <div class="w-full ">
                    <input type="text" class="w-full border-2 border-white rounded px-2 py-2"
                        placeholder="Nama sesuai KTP" name="nama">
                </div>
                <div class="w-full ">
                    <textarea class="w-full border-2 border-white rounded px-2 py-2" placeholder="Alamat" name="alamat"></textarea>
                </div>
                <div class="w-full ">
                    <input type="text" class="w-full border-2 border-white rounded px-2 py-2" placeholder="Instansi"
                        name="instansi">
                </div>
                <div class="w-full ">
                    <select class="w-full border-2 border-white rounded px-2 py-2" placeholder="Keperluan"
                        name="keperluan">
                        <option value="Keperluan" selected default>Keperluan Reservasi</option>
                        <option value="Permintaan Data">Permintaan Data</option>
                        <option value="Konsultasi Data Statistik">Konsultasi Data Statistik</option>
                        <option value="Konsultasi Lainnya">Konsultasi Lainnya</option>
                    </select>
                </div>
                <div class="w-full ">
                    <select class="w-full border-2 border-white rounded px-2 py-2" placeholder="Tujuan"
                        name="tujuan">
                        <option value="Tujuan" selected default>Tujuan</option>
                        @foreach ($pegawai as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }} - {{ $data->jabatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full ">
                    <select class="w-full border-2 border-white rounded px-2 py-2" placeholder="Jenis"
                        name="jenis">
                        <option value="Jenis" selected default>Jenis Konsultasi</option>
                        <option value="Berkunjung">Berkunjung</option>
                        <option value="Zoom">Zoom</option>
                    </select>
                </div>
                <div class="w-full ">
                    <input type="date" class="w-full border-2 border-white rounded px-2 py-2"
                        placeholder="Jadwal Reservasi" name="jadwal">
                </div>
                <div class="w-full ">
                    <input type="text" class="w-full border-2 border-white rounded px-2 py-2"
                        placeholder="Nomor Whatsapp" name="whatsapp">
                </div>
                <p>*Link konsultasi akan dikirimkan melalui nomer whatsapp yang terdaftar</p>
                <button class="bg-white text-[#043277] font-bold py-2 px-5 rounded w-fit" type="submit">
                    Simpan
                </button>
            </form>
        </section>
        <section class="w-full flex justify-center">
            <div class="w-full max-w-[1200px] py-10 px-5 flex flex-col gap-5">
                <h2 class="text-center text-2xl font-bold text-[#043277]">Daftar Tujuan</h2>
                <div class="text-lg grid grid-cols-1 md:grid-cols-2 gap-5">
                    @foreach ($pegawai as $index => $data)
                        <div>
                            <p><b>{{ $data->nama }}</b> ({{ $data->jabatan }})</p>
                            <p>{{ $data->jobdesc }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>
    <footer class="w-full flex justify-center bg-[#043277]">
        <div class="w-full max-w-[1200px] py-10 px-5 flex flex-col gap-5">
            <div class="text-white w-full max-w-[500px] flex flex-col gap-1">
                <p>HUBUNGI KAMI</p>
                <div class="flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                            clip-rule="evenodd" />
                    </svg>
                    <p>Jl. Bonorogo No.34A, Tebana, Lawangan Daya, Kec. Pademawu, Kabupaten Pamekasan, Jawa Timur 69323
                    </p>
                </div>
                <div class="flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd"
                            d="M17.834 6.166a8.25 8.25 0 1 0 0 11.668.75.75 0 0 1 1.06 1.06c-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788 3.807-3.808 9.98-3.808 13.788 0A9.722 9.722 0 0 1 21.75 12c0 .975-.296 1.887-.809 2.571-.514.685-1.28 1.179-2.191 1.179-.904 0-1.666-.487-2.18-1.164a5.25 5.25 0 1 1-.82-6.26V8.25a.75.75 0 0 1 1.5 0V12c0 .682.208 1.27.509 1.671.3.401.659.579.991.579.332 0 .69-.178.991-.579.3-.4.509-.99.509-1.671a8.222 8.222 0 0 0-2.416-5.834ZM15.75 12a3.75 3.75 0 1 0-7.5 0 3.75 3.75 0 0 0 7.5 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <p>pamekasan@bps.go.id</p>
                </div>
                <div class="flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd"
                            d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <p>Telp (0324)328834</p>
                </div>
            </div>
            <hr>
            <div class="col-md-8 col-sm-6 col-xs-12 flex justify-between items-center">
                <p class="copyright-text text-white footer-link" data-asw-orgfontsize="15" style="font-size: 15px;">
                    "©
                    <a class href="https://pamekasankab.bps.go.id/id" data-asw-orgfontsize="15"
                        style="font-size: 15px;">Badan Pusat Statistik Kabupaten Pamekasan</a>
                    | 2024"
                </p>
                <div class="flex gap-5">
                    <a class="social-icon text-white" href="https://youtube.com/@bpspamekasankab?si=1B-0H4kyAFJPkw9X"
                        target="_blank" aria-label="YouTube">
                        <svg class="svg-inline--fa fa-youtube w-6 h-6" aria-hidden="true" focusable="false"
                            data-prefix="fab" data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512" data-fa-i2svg>
                            <path fill="currentColor"
                                d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                            </path>
                        </svg>
                    </a>
                    <a class="social-icon text-white" target="_blank"
                        href="https://www.instagram.com/bpspamekasankab/">
                        <svg class="svg-inline--fa fa-instagram w-6 h-6" aria-hidden="true" focusable="false"
                            data-prefix="fab" data-icon="instagram" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg>
                            <path fill="currentColor"
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                            </path>
                        </svg>
                    </a>
                    <a class="social-icon text-white" target="_blank"
                        href="https://www.facebook.com/p/bpspamekasankab-100078271385161/">
                        <svg class="svg-inline--fa fa-facebook w-6 h-6" aria-hidden="true" focusable="false"
                            data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512" data-fa-i2svg>
                            <path fill="currentColor"
                                d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    @include('sweetalert::alert')
</body>

</html>
