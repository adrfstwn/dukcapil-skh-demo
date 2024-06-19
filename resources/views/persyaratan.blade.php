@extends('layouts.app')
@section('content')
    {{-- start section kontak --}}
    <section id="Persyaratan" class="my-10 md:my-20 -z-10">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="flex flex-col gap-6 md:gap-12">
                    <div class="flex flex-col gap-4">
                        <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks ">
                            <span class="font-bold text-primary">Persyaratan</span> Terbaru
                        </h2>
                    </div>
                    <div class="flex flex-col gap-4 max-w-screen-sm">
                    @foreach ($persyaratans as $persyaratan)
    <div class="flex flex-col gap-2">
        <div class="flex flex-col gap-3">
            <div class="flex flex-col gap-2">
                <a href="{{ route('persyaratan.detail', $persyaratan->id) }}" class="font-bold font-nunito text-xl md:text-2xl text-primary_teks">
                    {{ $persyaratan->judul }}
                </a>
                <div class="flex flex-col gap-2">
                    <span class="text-sm font-medium text-center text-white bg-primary px-2 py-1 max-w-max rounded-full">
                        {{ $persyaratan->kategori->nama_kategori }}
                    </span>
                </div>
            </div>
            <p class="text-sm text-secondary_teks font-nunito">{{ $persyaratan->created_at }}</p>
            <p class="font-nunito text-base text-secondary_teks line-clamp-2">
                {{ $persyaratan->deskripsi_persyaratan }}
            </p>
        </div>
        <div class="flex flex-row items-center gap-2">
            <a href="{{ route('persyaratan.detail', $persyaratan->id) }}" class="px-2 py-[4px] font-nunito text-sm text-background_light bg-primary rounded-sm">
                Lihat Selengkapnya
            </a>
        </div>
        <hr class="border-b-[1px] border-gray-300 mt-6 md:mt-8 rounded-full">
    </div>
@endforeach
                        {{-- Static content --}}
                        <div class="flex flex-col gap-2">
                            <div class="flex flex-col gap-3">
                                <div class="flex flex-col gap-2">
                                    <a href="{{ route('persyaratan.detail', 999) }}" {{-- Ganti dengan id persyaratan yang sesuai --}}
                                        class="font-bold font-nunito text-xl md:text-2xl text-primary_teks ">
                                        Forum Perangkat Daerah Dinas Dukcapil Kabupaten Sukoharjo Tahun 2024
                                    </a>
                                    <p class="text-sm font-medium text-center text-white bg-primary px-2 py-1 max-w-32 rounded-full">
                                        Kategori
                                    </p>
                                </div>
                                <p class="text-sm text-secondary_teks font-nunito">28 Februari 2024</p>
                                <p class="font-nunito text-base text-secondary_teks line-clamp-2">
                                    Kegiatan dipimpin oleh Kepala Dinas Dukcapil Kabupaten Sukoharjo Budi Susetyo, S.H., M.H dengan narasumber dari Bapperida (Burhan Surya Aji, S.IP., M.M. Kabid. PPE PD) dan BPKPAD (Tri Hastuti Lestari Handayani, S.E., M.M. Analis Keuangan Pusat dan Daerah Ahli Muda).
                                </p>
                            </div>
                            <div class="flex flex-row items-center gap-2">
                                <a href="{{ route('persyaratan.detail', 999) }}" {{-- Ganti dengan id persyaratan yang sesuai --}}
                                    class="px-2 py-[4px] font-nunito text-sm text-background_light bg-primary rounded-sm">
                                    Lihat Selengkapnya
                                </a>
                            </div>
                            <hr class="border-b-[1px] border-gray-300 mt-6 md:mt-8 rounded-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end section kontak --}}
@endsection
