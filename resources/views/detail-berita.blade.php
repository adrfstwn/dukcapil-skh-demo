@extends('layouts.app')
@section('content')
    {{-- start news section --}}
    <section id="news" class="my-10 md:my-20 -z-10">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between gap-6">
                <div class="flex flex-col gap-6 md:gap-12 w-full md:w-2/3">
                    <div class="flex flex-col gap-4">
                        <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks ">
                            <span class="font-bold text-primary">Berita</span>
                        </h2>
                    </div>
                    <div class="flex flex-col gap-4">

                            <div class="flex flex-col gap-2">
                                <a href=""
                                    class="font-bold font-nunito text-xl md:text-2xl text-primary_teks ">
                                    {{ $berita->judul }}
                                </a>
                                <p class="text-sm text-secondary_teks font-nunito">{{ $berita->waktu }}</p>
                                <div class="flex flex-row items-center gap-2">
                                    @if ($berita->gambar_berita)
                                        <img src="{{ asset('storage/' . $berita->gambar_berita) }}" alt="{{ $berita->judul }}" class="w-2/5 md:w-1/3 h-auto rounded-sm mr-4"> <!-- Adjusted width to w-2/5 and added margin-right -->
                                        <div class="flex flex-col"> <!-- Wrapped button in a div -->
                                            <p > <!-- Added flex-grow to push the caption to the left -->
                                                {{ $berita->deskripsi_berita }}
                                            </p>

                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr class="border-b-[1px] border-gray-300 mt-6 md:mt-8 rounded-full">

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end news section --}}
@endsection
