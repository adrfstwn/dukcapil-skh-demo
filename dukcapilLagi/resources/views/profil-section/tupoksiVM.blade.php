@extends('layouts.app')
@section('content')
    {{-- start section tupoksi, visi & misis --}}
    <section id="tuvimsi" class="my-10 md:my-20">
        <div class="container">
            <div class="grid gap-10">
                <div class="grid grid-cols-1 gap-4 md:gap-0 md:grid-cols-2">
                    <div class="flex">
                        <h2 class="font-monserrat text-primary text-2xl font-bold md:text-[32px]">Tupoksi</h2>
                    </div>
                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col gap-4">
                            <h3 class="font-monserrat text-primary_teks text-xl font-semibold md:text-2xl">Tugas Pokok</h3>
                            <hr class="w-7 border-b-[1.5px] border-primary rounded-sm">
                            <p class="font-nunito text-base text-primary_teks">Membantu Bupati dalam melaksanakan urusan
                                pemerintah
                                dalam
                                bidang Administrasi Kependudukan yang menjadi
                                kewenangan daerah dan tugas pembantuan yang diberikan kepada daerah di bidang administrasi
                                kependudukan
                            </p>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h3 class="font-monserrat text-primary_teks text-xl font-semibold md:text-2xl">Fungsi</h3>
                            <hr class="w-7 border-b-[1.5px] border-primary rounded-sm">
                            <ul class="list-inside list-decimal ">
                                <li class="font-nunito text-base text-primary_teks">Perumusan kebijakan teknis dibidang
                                    administrasi
                                    kependudukan dan pencatatan sipil</li>
                                <li class="font-nunito text-base text-primary_teks">Penyelenggaraan urusan pemerintahan dan
                                    pelayanan
                                    umum
                                    dibidang administrasi kependudukan dan pencatatan sipil</li>
                                <li class="font-nunito text-base text-primary_teks">Pelaksanaan kebijakan dibidang
                                    administrasi
                                    kependudukan dan pencatatan sipil</li>
                                <li class="font-nunito text-base text-primary_teks">Pelaksanaan evaluasi dan pelaporan di
                                    bidang
                                    administrasi kependudukan dan pencatatan sipil</li>
                                <li class="font-nunito text-base text-primary_teks">Pelaksanaan fungsi administrasi Dinas
                                    Kependudukan
                                    Dan
                                    Pencatatan Sipil</li>
                                <li class="font-nunito text-base text-primary_teks">Pengendalian penyelenggaraan tugas UPTD
                                </li>
                                <li class="font-nunito text-base text-primary_teks">Pelaksanaan fungsi lain yang diberikan
                                    oleh bupati
                                    terkait dengan tugas dan fungsinya</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 md:gap-0 md:grid-cols-2">
                    <div class="flex">
                        <h2 class="font-monserrat text-primary text-2xl font-bold md:text-[32px]">Visi & Misi</h2>
                    </div>
                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col gap-4">
                            <h3 class="font-monserrat text-primary_teks text-xl font-semibold md:text-2xl">Visi</h3>
                            <hr class="w-7 border-b-[1.5px] border-primary rounded-sm">
                            <p class="font-nunito text-base text-primary_teks font-bold"><i>“ Mewujudkan Layanan
                                    Administrasi
                                    Kependudukan yang
                                    Membahagiakan Masyarakat “</i>
                            </p>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h3 class="font-monserrat text-primary_teks text-xl font-semibold md:text-2xl">Misi</h3>
                            <hr class="w-7 border-b-[1.5px] border-primary rounded-sm">
                            <ul class="list-inside list-decimal ">
                                <li class="font-nunito text-base text-primary_teks">Memberikan Pelayanan Administrasi
                                    Kependudukan yang
                                    Cepat, Mudah, dan Akurat</li>
                                <li class="font-nunito text-base text-primary_teks">Memberikan Pelayanan Secara Online dan
                                    Offline untuk
                                    Dokumen Kependudukan</li>
                                <li class="font-nunito text-base text-primary_teks">Memberikan Pelayanan Administrasi
                                    Kependudukan yang
                                    bebas dari Korupsi, Kolusi dan Nepotisme ( KKN).</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end section tupoksi, visi & misis --}}
@endsection
