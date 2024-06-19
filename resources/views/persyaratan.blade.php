@extends('layouts.app')
@section('content')
    {{-- start section kontak --}}
    <section id="Persyaratan" class="my-10 md:my-20 -z-10">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between gap-6 ">
                <div class="flex flex-col gap-6 md:gap-12 w-full md:w-2/3">
                    <div class="flex flex-col gap-4">
                        <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks ">
                            <span class="font-bold text-primary">Persyaratan</span> Terbaru
                        </h2>
                    </div>
                    <div class="flex flex-col gap-4 max-w-screen-lg">
                        @foreach ($persyaratans as $persyaratan)
                            <div class="flex flex-col gap-2">
                                <div class="flex flex-col gap-3">
                                    <div class="flex flex-col gap-2">
                                        <a href="{{ route('persyaratan.detail', $persyaratan->id) }}"
                                            class="font-bold font-nunito text-xl md:text-2xl text-primary_teks">
                                            {{ $persyaratan->judul }}
                                        </a>
                                        <div class="flex flex-row items-center gap-2">
                                            <p class="ttext-sm font-bold text-primary">
                                                {{ $persyaratan->kategori->nama_kategori }}
                                            </p>
                                            <span class="text-neutral-500">•</span>
                                            <p class="text-sm text-secondary_teks font-nunito">
                                                {{ $persyaratan->created_at }}</p>

                                        </div>
                                    </div>
                                    <p class="font-nunito text-base text-secondary_teks line-clamp-3">
                                        {{ $persyaratan->deskripsi_persyaratan }}
                                    </p>
                                </div>
                                <div class="flex flex-row items-center gap-2">
                                    <a href="{{ route('persyaratan.detail', $persyaratan->id) }}"
                                        class="flex gap-1 justify-center px-3 py-[6px] font-nunito text-sm text-background_light bg-primary rounded-full">
                                        Lihat Selengkapnya
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px"
                                                viewBox="0 0 24 24" class="rotate-90 text-background_light text-xs">
                                                <path fill="currentColor"
                                                    d="M8 8.4V16q0 .425-.288.713T7 17t-.712-.288T6 16V6q0-.425.288-.712T7 5h10q.425 0 .713.288T18 6t-.288.713T17 7H9.4l8.9 8.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <hr class="border-b-[1px] border-gray-300 mt-6 md:mt-8 rounded-full">
                            </div>
                        @endforeach
                    </div>
                </div>
                <aside class="md:block md:border-l-[2px] border-gray-200 md:pl-6">
                    <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks pt-6 md:pt-0"><span
                            class="font-bold text-primary ">Persyaratan</span> Terbaru</h2>
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
            <div class="flex flex-row justify-center gap-3 mt-6"> <!-- Centered pagination links -->
            </div>
        </div>
    </section>
    {{-- end news section --}}
@endsection
