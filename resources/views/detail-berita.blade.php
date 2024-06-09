@extends('layouts.app')
@section('content')
    {{-- start section detail persyaratan --}}
    <section id="detail-berita" class="my-10 md:my-20 -z-10">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between md:gap-6">
                <div class="flex flex-col gap-12">
                    <div class="flex flex-col gap-6 md:gap-12">
                        <div class="flex flex-col gap-2">
                            <h2 href="" class="font-bold font-nunito text-xl md:text-3xl text-primary_teks ">
                                {{ $berita->judul }}
                            </h2>
                            <p class="text-sm text-secondary_teks font-nunito">{{ $berita->waktu }}</p>
                            <div class="flex flex-col items-center gap-6 max-w-screen-lg">
                                @if ($berita->gambar_berita)
                                    <img src="{{ asset('storage/' . $berita->gambar_berita) }}" alt="{{ $berita->judul }}"
                                        class="w-full h-auto rounded-lg">
                                    <p class="text-base md:text-lg text-secondary_teks">
                                        {{ $berita->deskripsi_berita }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <hr class="border-b-[1px] border-gray-300 mt-6 md:mt-8 rounded-full">
                    </div>
                    <div class="flex flex-col gap-4">
                        <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks pt-6 md:pt-0 border-b-2 pb-4">
                            <span class="font-bold text-primary ">Berita</span> Terbaru
                        </h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            {{-- @foreach ($beritas as $berita)
                                @if ($berita->status === 'PUBLISH')
                                    <div class="flex flex-col gap-y-3">
                                        <a href="{{ route('berita.detail', $berita->id) }}">
                                            <img src="{{ $berita->gambar_berita }}" alt=""
                                                class="max-w-80 max-h-80 object-cover object-center rounded-md">
                                            <div class="flex gap-1 md:gap-4 items-center justify-between md:justify-start">
                                                <p class="px-2 py-1 bg-primary rounded-sm text-background_light text-xs">
                                                    Berita</p>
                                                <p class="text-xs text-secondary_teks font-nunito text-end">
                                                    {{ $berita->waktu }}</p>
                                            </div>
                                            <a href=""
                                                class="text-base font-bold font-nunito text-primary_teks line-clamp-2">{{ $berita->deskripsi_berita }}</a>
                                        </a>
                                    </div>
                                @endif
                            @endforeach --}}
                        </div>
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
        </div>
        </div>
        </div>
    </section>
    {{-- end section detail persyaratan --}}
@endsection
