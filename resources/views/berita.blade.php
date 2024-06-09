@extends('layouts.app')
@section('content')
    {{-- start news section --}}
    <section id="news" class="my-10 md:my-20 -z-10">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between gap-6">
                <div class="flex flex-col gap-6 md:gap-12 w-full md:w-2/3">
                    <div class="flex flex-col gap-4">
                        <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks ">
                            <span class="font-bold text-primary">Berita</span> Terbaru
                        </h2>
                    </div>
                    <div class="flex flex-col gap-4">
                        @foreach ($beritas as $berita)

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
                                            <p class="font-nunito text-base text-secondary_teks line-clamp-5 flex-grow"> <!-- Added flex-grow to push the caption to the left -->
                                                {{ \Illuminate\Support\Str::limit($berita->deskripsi_berita, 600, '...') }}
                                            </p>
                                            <a href="{{ route('berita.detail', $berita->id) }}"
                                                class="px-2 py-1 font-nunito text-xs text-background_light bg-primary rounded-sm mt-2" style="max-width: 150px;"> <!-- Adjusted padding and margin-top, and added inline styling to limit width -->
                                                Lihat Selengkapnya
                                            </a>
                                        </div>
                                        @endif
                                        </div>
                                        <hr class="border-b-[1px] border-gray-300 mt-6 md:mt-8 rounded-full">
                                        </div>

                                        @endforeach
                                        <div class="flex justify-center mt-6"> <!-- Centered pagination links -->
                                            {{ $beritas->links() }}
                                        </div>
                        <!-- Pagination links for main news section -->

                    </div>
                </div>
                <aside class="w-full md:w-1/3 md:pl-6">
                    <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks pt-6 md:pt-0">
                        <span class="font-bold text-primary">Berita</span> Lainnya
                    </h2>
                    <div class="flex flex-col py-3 gap-4">
                        @foreach ($latestBeritas as $latestBerita)

                            <div class="flex flex-col gap-2">
                                <a href=""
                                    class="font-bold font-nunito text-xl md:text-2xl text-primary_teks ">
                                    {{ $latestBerita->judul }}
                                </a>
                                <p class="text-sm text-secondary_teks font-nunito">{{ $latestBerita->waktu }}</p>
                                <p class="font-nunito text-base text-secondary_teks line-clamp-2">
                                    {{ \Illuminate\Support\Str::limit($latestBerita->deskripsi_berita, 150, '...') }}
                                </p>
                                <a href="{{ route('berita.detail', $latestBerita->id) }}"
                                    class="px-2 py-1 font-nunito text-xs text-background_light bg-primary rounded-sm mt-2" style="max-width: 150px;">
                                    Lihat Selengkapnya
                                </a>
                                <hr class="border-b-[1px] border-gray-300 mt-6 md:mt-8 rounded-full">
                            </div>

                        @endforeach
                    </div>

                </aside>

            </div>
        </div>

    </section>
    {{-- end news section --}}
@endsection
