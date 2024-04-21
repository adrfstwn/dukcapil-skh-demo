@extends('layouts.app')
@section('content')
    {{-- start section profile --}}
    <Section id="profile" class="my-10 md:my-20">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-20 justify-center items-start">
                <div class="flex flex-col gap-3 ">
                    <h2 class="font-monserrat font-bold text-2xl md:text-[32px] text-primary_teks"><span
                            class="text-primary">PROFIL</span> <br>
                        DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL
                        KABUPATEN SUKOHARJO</h2>
                    <p class="font-nunito text-primary_teks text-base">
                        Perbup Nomor 27 Tahun 2018 Tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi, Serta Tata Kerja
                        Dinas
                        Daerah Kabupaten Sukoharjo sebagaimana telah diubah dengan Perbup Nomor 74 Tahun 2022.
                        Pada Ketentuan Umum pasal 1 huruf j menyebutkan Dinas Kependudukan dan Pencatatan Sipil
                        menyelenggarakan
                        urusan pemerintahan bidang Administrasi Kependudukan dan Pencatatan Sipil.
                        SLOGAN DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL
                        <b>"PELAYANAN YANG MEMBAHAGIAKAN MASYARAKAT"</b>
                    </p>
                </div>
                <div class="flex">
                    <img src="dist/assets/image/Logo-KAB-SKH.png" alt="Logo Kab.Sukoharjo" class="w-80 ">
                </div>
            </div>
        </div>
    </Section>
    {{-- end section profile --}}
@endsection
