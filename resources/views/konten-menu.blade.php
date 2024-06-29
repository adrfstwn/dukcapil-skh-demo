@extends('layouts.app')

@section('content')
    <section id="konten-menu" class="my-10 md:my-20">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between md:gap-6">
                <div class="flex flex-col gap-12">
                    <div class="flex flex-col gap-6 md:gap-12">
                        <h1 class="font-monserrat font-bold text-2xl md:text-[32px] text-primary">
                            {{ $menu->nama_menu }}
                        </h1>
                        @if ($kontenMenu->isEmpty())
                            <p class="font-semibold font-monserrat text-xl text-center text-secondary_teks">Detail halaman
                                ini belum tersedia</p>
                        @else
                            @foreach ($kontenMenu as $konten)
                                @if ($konten->status === 'PUBLISH')
                                    <div class="flex flex-col gap-6">
                                        <div class="flex flex-col gap-2">
                                            @if ($konten->judul !== $menu->nama_menu)
                                                <h2
                                                    class="font-monserrat font-bold text-2xl md:text-[32px] text-primary_teks">
                                                    {{ $konten->judul }}
                                                </h2>
                                            @endif
                                            <p class="font-nunito text-secondary_teks">Dibuat pada {{ $konten->tanggal }}
                                            </p>
                                        </div>
                                        <div class="flex flex-col gap-4 max-w-screen-lg">
                                            @if (!empty($konten->gambar) && !empty($konten->file))
                                                <img src="{{ $konten->gambar }}" loading="lazy" alt="{{ $konten->judul }}"
                                                    class="rounded-md w-full max-h-[450px] object-cover object-center">
                                                <a href="{{ Storage::url($konten->file) }}"
                                                    class="font-nunito text-base font-semibold text-background_light bg-primary px-3 py-[6px] rounded-md max-w-60">
                                                    Klik link file
                                                </a>
                                            @elseif (empty($konten->gambar) && !empty($konten->file))

                                                <a href="{{ Storage::url($konten->file) }}"
                                                    class="font-nunito text-base font-semibold text-background_light bg-primary px-3 py-[6px] rounded-md max-w-60">
                                                    Klik link file
                                                </a>
                                            @elseif (!empty($konten->gambar) && empty($konten->file))
                                                <img src="{{ $konten->gambar }}" loading="lazy" alt="{{ $konten->judul }}"
                                                    class="rounded-md w-full max-h-[450px] object-cover object-center">
                                            @endif

                                            <p class="font-nunito text-base text-primary_teks">
                                                {!! $konten->deskripsi_konten !!}
                                            </p>
                                        </div>


                                        @if (!$konten->urls->isEmpty())
                                            <h3 class="font-monserrat font-bold text-xl text-primary_teks">Link Terkait</h3>
                                            <ul class="list-disc list-inside">
                                                @foreach ($konten->urls as $url)
                                                    <li>
                                                        <a href="{{ $url->link_url }}" target="_blank"
                                                            class="font-nunito text-base text-primary underline">
                                                            {{ $url->nama_url }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="flex gap-3 items-center">
                                        <p class="font-nunito font-semibold text-primary_teks">BAGIKAN :</p>
                                        <div class="flex gap-3">
                                            <!-- Social Media Icons -->
                                            <a href="http://www.youtube.com/@disdukcapilkab.sukoharjo6228" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                                    height="24" class="md:size-8" viewBox="0,0,256,256"
                                                    style="fill:#000000;">
                                                    <g fill="#9E0000" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                        font-weight="none" font-size="none" text-anchor="none"
                                                        style="mix-blend-mode: normal">
                                                        <g transform="scale(5.12,5.12)">
                                                            <title>youtube</title>
                                                            <path
                                                                d="M44.89844,14.5c-0.39844,-2.19922 -2.29687,-3.80078 -4.5,-4.30078c-3.29687,-0.69922 -9.39844,-1.19922 -16,-1.19922c-6.59766,0 -12.79687,0.5 -16.09766,1.19922c-2.19922,0.5 -4.10156,2 -4.5,4.30078c-0.40234,2.5 -0.80078,6 -0.80078,10.5c0,4.5 0.39844,8 0.89844,10.5c0.40234,2.19922 2.30078,3.80078 4.5,4.30078c3.5,0.69922 9.5,1.19922 16.10156,1.19922c6.60156,0 12.60156,-0.5 16.10156,-1.19922c2.19922,-0.5 4.09766,-2 4.5,-4.30078c0.39844,-2.5 0.89844,-6.10156 1,-10.5c-0.20312,-4.5 -0.70312,-8 -1.20312,-10.5zM19,32v-14l12.19922,7z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </a>
                                            <a href="https://www.instagram.com/disdukcapilkabsukoharjo/" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                                    height="24" class="md:size-7" viewBox="0,0,256,256"
                                                    style="fill:#000000;">
                                                    <g fill="#9E0000" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                        font-weight="none" font-size="none" text-anchor="none"
                                                        style="mix-blend-mode: normal">
                                                        <g transform="scale(5.12,5.12)">
                                                            <title>instagram</title>
                                                            <path
                                                                d="M16,3c-7.17,0 -13,5.83 -13,13v18c0,7.17 5.83,13 13,13h18c7.17,0 13,-5.83 13,-13v-18c0,-7.17 -5.83,-13 -13,-13zM37,11c1.1,0 2,0.9 2,2c0,1.1 -0.9,2 -2,2c-1.1,0 -2,-0.9 -2,-2c0,-1.1 0.9,-2 2,-2zM25,14c6.07,0 11,4.93 11,11c0,6.07 -4.93,11 -11,11c-6.07,0 -11,-4.93 -11,-11c0,-6.07 4.93,-11 11,-11zM25,16c-4.96,0 -9,4.04 -9,9c0,4.96 4.04,9 9,9c4.96,0 9,-4.04 9,-9c0,-4.96 -4.04,-9 -9,-9z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </a>
                                            <a href="https://web.facebook.com/disdukcapil.sukoharjokab" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                                    height="24" class="md:size-7" viewBox="0,0,256,256"
                                                    style="fill:#000000;">
                                                    <g fill="#9E0000" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                        font-weight="none" font-size="none" text-anchor="none"
                                                        style="mix-blend-mode: normal">
                                                        <g transform="scale(5.12,5.12)">
                                                            <title>facebook</title>
                                                            <path
                                                                d="M41,4h-32c-2.76,0 -5,2.24 -5,5v32c0,2.76 2.24,5 5,5h32c2.76,0 5,-2.24 5,-5v-32c0,-2.76 -2.24,-5 -5,-5zM34.84961,13h-3.09961c-1.21313,0 -1.75,0.53688 -1.75,1.75v3.34961h4.75l-0.5,5h-4.25v17h-6v-17h-3v-5h3v-3.25c0,-3.52913 2.47087,-6 6,-6h3.75z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </a>
                                            <a href="https://twitter.com/disdukcapilskh" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                                    height="24" class="md:size-7" viewBox="0,0,256,256"
                                                    style="fill:#000000;">
                                                    <g fill="#9E0000" fill-rule="nonzero" stroke="none"
                                                        stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter"
                                                        stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                                        font-family="none" font-weight="none" font-size="none"
                                                        text-anchor="none" style="mix-blend-mode: normal">
                                                        <g transform="scale(5.12,5.12)">
                                                            <title>twitter</title>
                                                            <path
                                                                d="M40.72266,12.27539c-1.11523,0.5 -2.29297,0.83594 -3.50391,1c1.29492,-0.83594 2.24609,-2.16797 2.70703,-3.74805c-1.22363,0.76172 -2.58398,1.31641 -4.00391,1.5957c-1.13672,-1.21875 -2.75391,-1.92188 -4.50391,-1.92188c-3.58496,0 -6.22754,3.30567 -5.44531,6.82226c-5.42383,-0.27246 -10.32422,-2.87109 -13.55859,-7.19141c-1.66602,2.86133 -0.83594,6.625 2.00391,8.49609c-1.02148,-0.03125 -1.98145,-0.30567 -2.79688,-0.76367c-0.06641,2.73633 1.9209,5.29492 4.80078,5.85937c-0.87109,0.25 -1.88477,0.29101 -2.83984,0.10547c0.80078,2.49413 3.11816,4.31446 5.86133,4.36718c-2.63867,2.06641 -5.93164,2.93554 -9.18164,2.5293c2.75391,1.75781 6.03516,2.75684 9.54297,2.75684c11.77539,0 18.44727,-10.16894 18.0332,-19.24219c1.26563,-0.90332 2.293,-2.03515 3.125,-3.32617z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </a>
                                            <a href="https://t.me/disdukcapilkabsukoharjo" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                                    height="24" class="md:size-7" viewBox="0,0,256,256"
                                                    style="fill:#000000;">
                                                    <g fill="#9E0000" fill-rule="nonzero" stroke="none"
                                                        stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter"
                                                        stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                                        font-family="none" font-weight="none" font-size="none"
                                                        text-anchor="none" style="mix-blend-mode: normal">
                                                        <g transform="scale(5.12,5.12)">
                                                            <title>telegram</title>
                                                            <path
                                                                d="M45.51953,5.55664c-0.60645,-0.49902 -1.41699,-0.68359 -2.20117,-0.49023l-39.22656,10.33789c-0.79004,0.20898 -1.41797,0.77734 -1.66406,1.56055c-0.24512,0.78223 0.01465,1.62793 0.66602,2.15625c0.00195,0.00293 0.00195,0.00391 0.00391,0.00586l9.87891,7.45117c0.70898,0.53516 1.69043,0.51172 2.37305,-0.05664l18.19922,-14.68555c0.05566,0.14062 0.10547,0.29297 0.14062,0.43945c0.16895,0.72461 0.18066,1.43262 0.01367,2.10547c-0.02734,0.12109 -0.0625,0.23828 -0.10156,0.35742l-5.42383,17.41602c-0.23242,0.74414 -0.0498,1.55371 0.48145,2.13086c0.53125,0.57715 1.33496,0.86426 2.11719,0.74805c0.01172,-0.00195 0.02539,-0.00391 0.03711,-0.00586c0.03516,-0.00684 0.07129,-0.01367 0.10645,-0.02051l7.75,-1.43945c0.77344,-0.14453 1.4375,-0.65918 1.73828,-1.36426l9.61328,-22.06055c0.36523,-0.8418 0.12109,-1.81445 -0.55176,-2.39941z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks pt-6 md:pt-0 border-b-2 pb-4">
                    <span class="font-bold text-primary ">Berita</span> Terbaru
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($beritaTerbaru as $berita)
                        <div class="flex flex-col gap-y-3 p-4 border rounded-md">
                            <img src="{{ asset('storage/' . $berita->gambar_berita) }}" loading="lazy"
                                alt="{{ $berita->judul }}"
                                class="w-full max-h-[450px] object-cover object-center rounded-lg">
                            <div class="flex gap-1 md:gap-4 items-center justify-between md:justify-start">
                                <p class="px-2 py-1 bg-primary rounded-sm text-background_light text-xs">Berita</p>
                                <p class="text-xs text-secondary_teks font-nunito text-end">{{ $berita->waktu }}
                                </p>
                            </div>
                            <a href="{{ route('berita.detail', $berita->id) }}"
                                class="text-base font-bold font-nunito text-primary_teks line-clamp-2">{{ $berita->judul }}</a>
                            <p class="text-sm text-secondary_teks line-clamp-3">
                                {!! Str::limit($berita->deskripsi_berita, 100) !!}</p>
                            <a href="{{ route('berita.detail', $berita->id) }}"
                                class="mt-2 px-4 py-2 bg-primary text-background_light text-sm rounded-md text-center">Baca
                                Selengkapnya</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <aside class="md:block md:border-l-[2px] border-gray-200 md:pl-6">
            <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks pt-6 md:pt-0"><span
                    class="font-bold text-primary ">Persyaratan</span> Terbaru</h2>
            <div class="flex flex-col py-3 gap-4">
                @foreach ($latestPersyaratan as $persyaratanTerbaru)
                    <div class="flex flex-col py-3 gap-4">
                        <div class="flex flex-col gap-2">
                            <a href="{{ route('persyaratan.detail', $persyaratanTerbaru->id) }}"
                                class="font-nunito text-base font-semibold text-primary_teks line-clamp-2">{{ $persyaratanTerbaru->judul }}</a>
                            <p class="font-nunito text-sm md:text-base text-secondary_teks ">
                                {{ $persyaratanTerbaru->created_at->format('Y-m-d') }}</p>
                            <hr class="border-[1.5px] border-gray-200 rounded-full my-3">
                        </div>
                @endforeach
            </div>
        </aside>
        </div>
        </div>
    </section>
@endsection
