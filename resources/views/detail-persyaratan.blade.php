@extends('layouts.app')

@section('content')
    {{-- start section detail persyaratan --}}
    <section id="detail-persyaratan" class="my-10 md:my-20">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between md:gap-6">
                <div class="flex flex-col gap-12">
                    <div class="flex flex-col gap-6 md:gap-12">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        </div>
                        <div class="flex flex-col gap-2">
                            <h2 class="font-bold font-nunito text-xl md:text-3xl text-primary_teks ">
                                {{ $persyaratans->judul }}
                            </h2>
                            <p class="text-xs text-gray-500 uppercase font-semibold tracking-wide">
                                Kategori: {{ $persyaratans->kategori->nama_kategori }}
                            </p>
                            <p class="text-sm text-secondary_teks font-nunito">{{ $persyaratans->waktu }}</p>
                            <div class="flex flex-col items-center gap-6 max-w-screen-lg">
                                @if ($persyaratans->file)
                                    @php
                                        $extension = pathinfo($persyaratans->file, PATHINFO_EXTENSION);
                                    @endphp

                                    @if (in_array($extension, ['jpg', 'jpeg', 'png']))
                                        <img src="{{ asset('storage/' . $persyaratans->file) }}" loading="lazy" alt="{{ $persyaratans->judul }}"
                                            class="w-full max-h-[450px] object-cover object-center rounded-lg">
                                        <div class="mt-4">
                                            <a href="{{ asset('storage/' . $persyaratans->file) }}" download class="text-sm text-primary underline">Download File</a>
                                        </div>
                                    @elseif ($extension == 'pdf')
                                        <p class="text-base md:text-lg text-secondary_teks">
                                            <a href="{{ asset('storage/' . $persyaratans->file) }}" target="_blank" class="text-primary underline">Download File</a>
                                        </p>
                                    @endif
                                @endif
                                <p class="text-base md:text-lg text-secondary_teks">
                                    {{ $persyaratans->deskripsi_persyaratan }}
                                </p>
                            </div>
                        </div>
                        <hr class="border-b-[1px] border-gray-300 mt-6 md:mt-8 rounded-full">
                    </div>
                    <div class="flex flex-col gap-4">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
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
    </section>
    {{-- end section detail persyaratan --}}
@endsection
