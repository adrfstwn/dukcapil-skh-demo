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
                            <div class="flex flex-col md:flex-row items-center gap-2">
                                @if ($berita->gambar_berita)
                                    <div class="relative flex w-full">
                                        <img src="{{ asset('storage/' . $berita->gambar_berita) }}" alt="{{ $berita->judul }}"
                                            loading="lazy" class="w-64 md:max-w-72 h-auto rounded-md mr-4">
                                        <div class="absolute  top-4 right-[88px] md:right-4">
                                            <p
                                                class="text-sm rounded-sm text-background_light bg-primary px-2 py-1 uppercase font-semibold font-monserrat">
                                                Informasi</p>
                                        </div>
                                    </div>
                                    <!-- Adjusted width to w-2/5 and added margin-right -->
                                    <div class="flex flex-col gap-3"> <!-- Wrapped button in a div -->
                                        <div class="flex flex-col gap-1">
                                            <a href="{{ route('berita.detail', $berita->id) }}"
                                                class="font-bold font-nunito text-xl md:text-2xl text-primary_teks ">
                                                {{ $berita->judul }}
                                            </a>
                                            <p class="text-sm text-secondary_teks font-nunito">{{ $berita->waktu }}</p>
                                        </div>
                                        <p class="font-nunito text-base text-secondary_teks line-clamp-5 flex-grow">
                                            <!-- Added flex-grow to push the caption to the left -->
                                            {!! \Illuminate\Support\Str::limit($berita->deskripsi_berita, 600, '...') !!}
                                        </p>
                                        <a href="{{ route('berita.detail', $berita->id) }}"
                                            class="px-2 py-1 font-nunito text-base items-start justify-start text-center text-background_light bg-primary rounded-md mt-2 w-40">
                                            <!-- Adjusted padding and margin-top, and added inline styling to limit width -->
                                            Lihat Selengkapnya
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <hr class="border-b-[1px] border-gray-300 mt-6 md:mt-8 rounded-full">
                        </div>
                    @endforeach

                </div>
            </div>
            <aside class="md:block md:border-l-[2px] border-gray-200 md:pl-6">
                <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks pt-6 md:pt-0"><span
                        class="font-bold text-primary ">Persyaratan</span> Terbaru</h2>
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
        <div class="flex flex-row justify-center gap-3 mt-6"> <!-- Centered pagination links -->
            {{ $beritas->links() }}
        </div>
    </div>
</section>
{{-- end news section --}}
@endsection
