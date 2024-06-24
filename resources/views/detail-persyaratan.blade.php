@extends('layouts.app')

@section('content')
    {{-- start section detail persyaratan --}}
    <section id="detail-persyaratan" class="my-10 md:my-20">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between gap-6">
                <div class="flex flex-col gap-12 w-full md:w-2/3">
                    <div class="flex flex-col gap-6 md:gap-12">
                        <div class="flex flex-col gap-2">
                            <p class="text-sm text-primary uppercase font-semibold font-monserrat">
                                {{ $persyaratans->kategori->nama_kategori }}
                            </p>
                            <h2 class="font-bold font-nunito text-xl md:text-3xl text-primary_teks">
                                {{ $persyaratans->judul }}
                            </h2>
                            <p class="text-sm text-secondary_teks font-nunito">{{ $persyaratans->waktu }}</p>
                            <div class="flex flex-col gap-6 max-w-screen-lg">
                                @if ($persyaratans->file)
                                    @php
                                        $extension = pathinfo($persyaratans->file, PATHINFO_EXTENSION);
                                    @endphp
                                    @if (in_array($extension, ['jpg', 'jpeg', 'png']))
                                        <img src="{{ asset('storage/' . $persyaratans->file) }}" loading="lazy"
                                            alt="{{ $persyaratans->judul }}"
                                            class="w-full h-full object-cover object-center rounded-lg">
                                        <div class="mt-4">
                                            <a href="{{ asset('storage/' . $persyaratans->file) }}" download
                                                class="text-base text-neutral-50 bg-primary px-2 py-1 rounded-md"
                                                target="_blank">Download Gambar</a>
                                        </div>
                                    @elseif ($extension == 'pdf')
                                        <iframe src="{{ asset('storage/' . $persyaratans->file) }}" width="100%"
                                            height="700px" frameborder="0" class="rounded-xl">Formulir</iframe>
                                        <div class="">
                                            <a href="{{ asset('storage/' . $persyaratans->file) }}" download
                                                class="text-base text-neutral-50 bg-primary px-2 py-1 rounded-md"
                                                target="_blank">Download File PDF</a>
                                        </div>
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
                        <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks pt-6 md:pt-0 border-b-2 pb-4">
                            <span class="font-bold text-primary">Berita</span> Terbaru
                        </h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($beritaTerbaru as $berita)
                                <div class="flex flex-col gap-y-3 p-4 border rounded-md">
                                    <img src="{{ asset('storage/' . $berita->gambar_berita) }}" loading="lazy" alt="{{ $berita->judul }}"
                                        class="w-full max-h-[450px] object-cover object-center rounded-lg">
                                    <div class="flex gap-1 md:gap-4 items-center justify-between md:justify-start">
                                        <p class="px-2 py-1 bg-primary rounded-sm text-background_light text-xs">Berita</p>
                                        <p class="text-xs text-secondary_teks font-nunito text-end">{{ $berita->waktu }}
                                        </p>
                                    </div>
                                    <a href="{{ route('berita.detail', $berita->id) }}"
                                        class="text-base font-bold font-nunito text-primary_teks line-clamp-2">{{ $berita->judul }}</a>
                                    <p class="text-sm text-secondary_teks line-clamp-3">
                                        {{ Str::limit($berita->deskripsi_berita, 100) }}</p>
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
                            class="font-bold text-primary">Persyaratan</span> Terbaru</h2>
                            @foreach ($latestPersyaratan as $persyaratanTerbaru)

<div class="flex flex-col py-3 gap-4">
    <div class="flex flex-col gap-2">
<a href="{{ route('persyaratan.detail', $persyaratanTerbaru->id) }}"
    class="font-nunito text-base font-semibold text-primary_teks line-clamp-2">{{$persyaratanTerbaru->judul}}</a>
<p class="font-nunito text-sm md:text-base text-secondary_teks ">{{$persyaratanTerbaru->created_at->format('Y-m-d')}}</p>
<hr class="border-[1.5px] border-gray-200 rounded-full my-3">
</div>
@endforeach
                    </div>
                </aside>
            </div>
        </div>
    </section>
    {{-- end section detail persyaratan --}}
@endsection
