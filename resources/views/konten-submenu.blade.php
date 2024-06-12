@extends('layouts.app')

@section('content')
    {{-- start konten-submenu section --}}
    <section id="konten-submenu" class="my-10 md:my-20 -z-10">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between md:gap-6">
                <div class="flex flex-col gap-12">
                    <div class="flex flex-col gap-6 md:gap-12">
                        <h1 class="font-monserrat font-bold text-2xl md:text-[32px] text-primary">
                            {{ $submenu->nama_submenu }}
                        </h1>
                        @if ($kontenSubMenu->isEmpty())
                            <p class="font-semibold font-monserrat text-xl text-center text-secondary_teks">Detail halalaman ini belum tersedia</p>
                        @else
                            @foreach ($kontenSubMenu as $konten)
                                <div class="flex flex-col gap-6 ">
                                    <div class="flex flex-col gap-2">
                                        <h2 class="font-monserrat font-bold text-2xl md:text-[32px] text-primary_teks ">
                                            {{ $konten->judul }}</h2>
                                        <p class="font-nunito text-secondary_teks">Dibuat pada {{ $konten->tanggal }}</p>
                                    </div>
                                    <div class="flex flex-col gap-4 max-w-screen-lg">
                                        @if ($konten->gambar)
                                            <img src="{{ $konten->gambar }}" alt="{{ $konten->judul }}" class="rounded-md w-full max-h-96">
                                            <p class="font-nunito text-base text-primary_teks">
                                                {{ $konten->judul }}
                                            </p>

                                        @endif
                                        <p class="font-nunito text-base text-primary_teks">
                                            {{ $konten->deskripsi_konten }}</p>
                                        @if ($konten->file)
                                            <a href="{{ Storage::url($konten->file) }}"
                                                class="font-nunito text-base font-semibold text-background_light bg-primary px-3 py-[6px] rounded-md max-w-60">Klik
                                                link file</a>
                                        @endif
                                    </div>
                                    <p class="text-base text-secondary_teks"></p>
                                    <div class="flex gap-3 items-center">
                                        <p class="font-nunito font-semibold text-primary_teks">BAGIKAN :</p>
                                        <div class="flex">
                                            <div class="flex  gap-3">
                                                <!-- youtube -->
                                                <a href="http://www.youtube.com/@disdukcapilkab.sukoharjo6228"
                                                    class="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                                        height="24" class="md:size-8" viewBox="0,0,256,256"
                                                        style="fill:#000000;">
                                                        <g fill="#9E0000" fill-rule="nonzero" stroke="none"
                                                            stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter"
                                                            stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                                            font-family="none" font-weight="none" font-size="none"
                                                            text-anchor="none" style="mix-blend-mode: normal">
                                                            <g transform="scale(5.12,5.12)">
                                                                <title>youtube</title>
                                                                <path
                                                                    d="M44.89844,14.5c-0.39844,-2.19922 -2.29687,-3.80078 -4.5,-4.30078c-3.29687,-0.69922 -9.39844,-1.19922 -16,-1.19922c-6.59766,0 -12.79687,0.5 -16.09766,1.19922c-2.19922,0.5 -4.10156,2 -4.5,4.30078c-0.40234,2.5 -0.80078,6 -0.80078,10.5c0,4.5 0.39844,8 0.89844,10.5c0.40234,2.19922 2.30078,3.80078 4.5,4.30078c3.5,0.69922 9.5,1.19922 16.10156,1.19922c6.60156,0 12.60156,-0.5 16.10156,-1.19922c2.19922,-0.5 4.09766,-2 4.5,-4.30078c0.39844,-2.5 0.89844,-6.10156 1,-10.5c-0.20312,-4.5 -0.70312,-8 -1.20312,-10.5zM19,32v-14l12.19922,7z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                                <!-- instagram -->
                                                <a href="https://www.instagram.com/disdukcapilkabsukoharjo/" class="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                                        height="24" class="md:size-7" viewBox="0,0,256,256"
                                                        style="fill:#000000;">
                                                        <g fill="#9E0000" fill-rule="nonzero" stroke="none"
                                                            stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter"
                                                            stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                                            font-family="none" font-weight="none" font-size="none"
                                                            text-anchor="none" style="mix-blend-mode: normal">
                                                            <g transform="scale(5.12,5.12)">
                                                                <title>instagram</title>
                                                                <path
                                                                    d="M16,3c-7.17,0 -13,5.83 -13,13v18c0,7.17 5.83,13 13,13h18c7.17,0 13,-5.83 13,-13v-18c0,-7.17 -5.83,-13 -13,-13zM37,11c1.1,0 2,0.9 2,2c0,1.1 -0.9,2 -2,2c-1.1,0 -2,-0.9 -2,-2c0,-1.1 0.9,-2 2,-2zM25,14c6.07,0 11,4.93 11,11c0,6.07 -4.93,11 -11,11c-6.07,0 -11,-4.93 -11,-11c0,-6.07 4.93,-11 11,-11zM25,16c-4.96,0 -9,4.04 -9,9c0,4.96 4.04,9 9,9c4.96,0 9,-4.04 9,-9c0,-4.96 -4.04,-9 -9,-9z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                                <!-- facebook -->
                                                <a href="https://web.facebook.com/disdukcapil.sukoharjokab" class="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                                        height="24" class="md:size-7" viewBox="0,0,256,256"
                                                        style="fill:#000000;">
                                                        <g fill="#9E0000" fill-rule="nonzero" stroke="none"
                                                            stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter"
                                                            stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                                            font-family="none" font-weight="none" font-size="none"
                                                            text-anchor="none" style="mix-blend-mode: normal">
                                                            <g transform="scale(5.12,5.12)">
                                                                <title>facebook</title>
                                                                <path
                                                                    d="M41,4h-32c-2.76,0 -5,2.24 -5,5v32c0,2.76 2.24,5 5,5h32c2.76,0 5,-2.24 5,-5v-32c0,-2.76 -2.24,-5 -5,-5zM37,19h-2c-2.14,0 -3,0.5 -3,2v3h5l-1,5h-4v15h-5v-15h-4v-5h4v-3c0,-4 2,-7 6,-7c2.9,0 4,1 4,1z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                                <!-- twitter X -->
                                                <a href="https://twitter.com/disdukcapilskh" class="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                                        height="24" class="md:size-7" viewBox="0,0,256,256"
                                                        style="fill:#000000;">
                                                        <g fill="#9E0000" fill-rule="nonzero" stroke="none"
                                                            stroke-width="1" stroke-linecap="butt"
                                                            stroke-linejoin="miter" stroke-miterlimit="10"
                                                            stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                            font-weight="none" font-size="none" text-anchor="none"
                                                            style="mix-blend-mode: normal">
                                                            <g transform="scale(5.12,5.12)">
                                                                <title>twitter X</title>
                                                                <path
                                                                    d="M11,4c-3.866,0 -7,3.134 -7,7v28c0,3.866 3.134,7 7,7h28c3.866,0 7,-3.134 7,-7v-28c0,-3.866 -3.134,-7 -7,-7zM13.08594,13h7.9375l5.63672,8.00977l6.83984,-8.00977h2.5l-8.21094,9.61328l10.125,14.38672h-7.93555l-6.54102,-9.29297l-7.9375,9.29297h-2.5l9.30859,-10.89648zM16.91406,15l14.10742,20h3.06445l-14.10742,-20z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="flex flex-col gap-4">
                        <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks pt-6 md:pt-0 border-b-2 pb-4">
                            <span class="font-bold text-primary ">Berita</span> Terbaru
                        </h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($beritaTerbaru as $berita)
                    <div class="flex flex-col gap-y-3 p-4 border rounded-md">
                        <div class="flex gap-1 md:gap-4 items-center justify-between md:justify-start">
                            <p class="px-2 py-1 bg-primary rounded-sm text-background_light text-xs">Berita</p>
                            <p class="text-xs text-secondary_teks font-nunito text-end">{{ $berita->waktu }}</p>
                        </div>
                        <a href="{{ route('berita.detail', $berita->id) }}" class="text-base font-bold font-nunito text-primary_teks line-clamp-2">{{ $berita->judul }}</a>
                        <p class="text-sm text-secondary_teks line-clamp-3">{{ Str::limit($berita->deskripsi_berita, 100) }}</p>
                        <a href="{{ route('berita.detail', $berita->id) }}" class="mt-2 px-4 py-2 bg-primary text-background_light text-sm rounded-md text-center">Baca Selengkapnya</a>
                    </div>
                @endforeach
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
@endsection
