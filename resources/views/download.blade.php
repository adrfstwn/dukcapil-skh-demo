@extends('layouts.app')
@section('content')
    {{-- start download section --}}
    <section id="download" class="my-10 md:my-20 -z-10">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between gap-6">
                <div class="flex flex-col gap-6 md:gap-12 w-full md:w-2/3">
                    <div class="flex flex-col gap-4">
                        <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks ">
                            <span class="font-bold text-primary">Download</span> Terbaru
                        </h2>
                    </div>
                    <div class="flex flex-col gap-4">
                        @foreach ($downloads as $download)
                            <div class="flex flex-col gap-2">
                                <a href="{{ route('download.detail', $download->id) }}"
                                    class="font-bold font-monserrat text-xl md:text-2xl text-primary_teks ">
                                    {{ $download->judul }}
                                </a>
                                <span class="text-sm font-medium text-center text-white bg-primary px-2 py-1 max-w-max rounded-full">
                        {{ $download->kategori->nama_kategori }}
                    </span>
                                <p class="text-sm text-secondary_teks font-nunito">{{ $download->created_at }}</p>
                                <p class="font-nunito text-base text-secondary_teks line-clamp-2">
                                    {{ $download->deskripsi_download }}
                                </p>
                                <div class="flex flex-row items-center gap-2">
                                    <a href="{{ route('download.detail', $download->id) }}"
                                        class="px-2 py-[4px] font-nunito text-sm text-background_light bg-primary rounded-sm">
                                        Lihat Selengkapnya
                                    </a>
                                </div>
                                <hr class="border-b-[1px] border-gray-300 mt-6 md:mt-8 rounded-full">
                            </div>
                        @endforeach
                    </div>
                </div>
                <aside class="w-full md:w-1/3 md:pl-6">
                    <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks pt-6 md:pt-0">
                        <span class="font-bold text-primary">Persyaratan</span> Terbaru
                    </h2>
                    <div class="flex flex-col py-3 gap-4">
                        <div class="flex flex-col gap-2">
                            <a href=""
                                class="font-nunito text-base font-semibold text-primary_teks line-clamp-2">Persyaratan
                                Pencatatan
                                Pengangkatan Anak</a>
                            <p class="font-nunito text-sm md:text-base text-secondary_teks ">13 Mei 2022</p>
                            <hr class="border-[1.5px] border-gray-200 rounded-full my-3">
                        </div>
                        <div class="flex flex-col gap-2">
                            <a href=""
                                class="font-nunito text-base font-semibold text-primary_teks line-clamp-2">Persyaratan
                                Pencatatan
                                Pengangkatan Anak</a>
                            <p class="font-nunito text-sm md:text-base text-secondary_teks ">13 Mei 2022</p>
                            <hr class="border-[1.5px] border-gray-200 rounded-full my-3">
                        </div>
                        <div class="flex flex-col gap-2">
                            <a href=""
                                class="font-nunito text-base font-semibold text-primary_teks line-clamp-2">Persyaratan
                                Pencatatan
                                Pengangkatan Anak</a>
                            <p class="font-nunito text-sm md:text-base text-secondary_teks ">13 Mei 2022</p>
                            <hr class="border-[1.5px] border-gray-200 rounded-full my-3">
                        </div>
                        <div class="flex flex-col gap-2">
                            <a href=""
                                class="font-nunito text-base font-semibold text-primary_teks line-clamp-2">Persyaratan
                                Pencatatan
                                Pengangkatan Anak</a>
                            <p class="font-nunito text-sm md:text-base text-secondary_teks ">13 Mei 2022</p>
                            <hr class="border-[1.5px] border-gray-200 rounded-full my-3">
                        </div>
                        <div class="flex flex-col gap-2">
                            <a href=""
                                class="font-nunito text-base font-semibold text-primary_teks line-clamp-2">Persyaratan
                                Pencatatan
                                Pengangkatan Anak</a>
                            <p class="font-nunito text-sm md:text-base text-secondary_teks ">13 Mei 2022</p>
                            <hr class="border-[1.5px] border-gray-200 rounded-full my-3">
                        </div>
                    </div>
                </aside>
            </div>
        </div>
        </div>
    </section>
    {{-- end download section --}}
@endsection
