@extends('layouts.app')
@section('content')
    <!-- start hero section -->
    <section id="hero" class="my-8 md:my-10 p-3 relative -z-10">
        <div class="container ">
            <div class="slick-slider" id="slick-slider">
                @foreach ($homeSliders as $index => $homeSlider)
                    <div class="slide slide1">
                        <div class="max-w-80 md:max-w-6xl mx-auto relative shadow-lg">
                            <div class="h-64 p-6 md:p-14 md:h-[560px] flex items-end text-white rounded-3xl ">
                                <img src="{{ asset($homeSlider->gambar_slider) }}" alt=""
                                    class="absolute inset-0 object-cover object-center w-full h-full rounded-3xl filter brightness-50">
                                <div class="hidden md:block w-[400px] md:p-6 p-4 bg-primary opacity-75 rounded-xl z-10">
                                    <h2 class="font-bold text-base md:text-xl">{{ $homeSlider->judul }}</h2>
                                    <p class="text-xs line-clamp-2">{{ $homeSlider->deskripsi }}</p>
                                </div>
                                <div class="md:hidden w-[400px] z-10">
                                    <h2 class="font-bold font-monserrat text-center text-2xl text-slate-50 contrast-150">
                                        {{ $homeSlider->judul }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
    <!-- end hero section -->

    <!-- start service section -->
    <section id="service" class="md:my-24 my-10">
        <div class="container">
            <div class="flex flex-col gap-6 justify-center">
                <div class="flex flex-col mx-auto justify-center items-center md:max-w-4xl gap-2">
                    <h2 class="font-monserrat font-bold text-2xl md:text-4xl text-primary_teks text-center">Layanan Kami
                    </h2>
                    <p class="font-nunito text-base md:text-xl text-secondary_teks text-center">Menyediakan berbagai layanan
                        administrasi kependudukan bagi masyarakat. Layanan tersebut meliputi:</p>
                </div>
                <div class="flex flex-col md:flex-row gap-6 mx-auto">
                    <div x-data="{
                        currentIndex: 0,
                        cardsPerSlide: window.innerWidth >= 768 ? 4 : 1,
                        isMobile: window.innerWidth < 768
                    }" class="relative">
                        <div class="">
                            <div id="carousel" :class="{ 'grid-cols-1': isMobile, 'grid-cols-2': !isMobile }"
                                class="grid gap-3 md:gap-4">
                                @foreach ($layanans as $index => $layanan)
                                    <div x-show="currentIndex <= {{ $index }} && {{ $index }} < currentIndex + cardsPerSlide"
                                        class="">
                                        <a href="{{ $layanan->link_layanan }}"
                                            class="h-full w-full md:w-52 border-2 flex flex-col gap-1 pb-4 border-primary rounded-lg">
                                            <div class="">
                                                <img src="{{ $layanan->gambar }}" alt=""
                                                    class="w-full h-28 object-cover object-center rounded-t-lg ">
                                            </div>
                                            <h3 class="text-xl font-nunito font-bold px-2 text-primary line-clamp-2">
                                                {{ $layanan->nama_layanan }}</h3>
                                            <p
                                                class="text-base font-nunito  text-secondary_teks px-2 contrast-50 line-clamp-2">
                                                {{ $layanan->deskripsi_layanan }}</p>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex justify-end items-center my-4">
                            <button @click="currentIndex = Math.max(currentIndex - cardsPerSlide, 0)"
                                class="text-primary opacity-35 hover:text-primary hover:opacity-100 md:mr-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="44px" height="44px" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M256 48C141.13 48 48 141.13 48 256s93.13 208 208 208s208-93.13 208-208S370.87 48 256 48m35.31 292.69a16 16 0 1 1-22.62 22.62l-96-96a16 16 0 0 1 0-22.62l96-96a16 16 0 0 1 22.62 22.62L206.63 256Z" />
                                </svg>
                            </button>
                            <button
                                @click="currentIndex = Math.min(currentIndex + cardsPerSlide, {{ count($layanans) }} - cardsPerSlide)"
                                class="text-primary opacity-35 hover:text-primary hover:opacity-100 rotate-180 md:mr-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="44px" height="44px" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M256 48C141.13 48 48 141.13 48 256s93.13 208 208 208s208-93.13 208-208S370.87 48 256 48m35.31 292.69a16 16 0 1 1-22.62 22.62l-96-96a16 16 0 0 1 0-22.62l96-96a16 16 0 0 1 22.62 22.62L206.63 256Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="max-w-md h-full">
                        <a href="#">
                            <img src="dist/assets/image/BannerPelayanan.jpg" alt="" class="rounded-lg h-full">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end service section -->

    <!-- start section news -->
    <section id="news" class="bg-primary rounded-t-[40px] md:py-20 md:my-24 my-10 py-8">
        <div class="container ">
            <div class="flex flex-col gap-6 md:gap-10 ">
                <div class="flex flex-col mx-auto">
                    <h2 class="font-monserrat font-bold text-2xl md:text-4xl text-background_light text-center">Berita
                        Terbaru
                    </h2>
                    <p class="font-nunito text-base md:text-xl text-background_light text-center">Bekerja sama dengan
                        berbagai
                        pihak
                        untuk memberikan pelayanan yang terbaik bagi masyarakat.</p>
                </div>
                <div class="flex flex-col md:flex-row gap-8">

                    <div class="grid grid-cols-1 md:grid-cols-4 md:gap-10 gap-6">

                        @foreach ($beritas->sortByDesc('id')->take(4) as $berita)
                            <a href="{{ route('berita.show', $berita->id) }}">
                                <div class="flex flex-col bg-background_light rounded-lg md:max-w-80 h-full">
                                    <img src="{{ $berita->gambar_berita }}" alt=""
                                        class="w-full object-cover object-center rounded-t-lg">
                                    <div class="flex flex-col gap-1 p-4">
                                        <h3 class="text-xl md:text-2xl font-nunito font-bold text-primary_teks">
                                            {{ $berita->judul }}
                                        </h3>
                                        <p class="text-sm font-nunito text-secondary_teks font-medium contrast-75">
                                            {{ $berita->waktu }}
                                        </p>
                                        <p class="text-base font-nunito text-primary_teks contrast-50 line-clamp-2">
                                            {{ Illuminate\Support\Str::limit($berita->deskripsi_berita, 150) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
                <button onclick="window.location.href='{{ route('berita.show') }}'"
                    class="font-nunito font-semibold text-base md:text-lg text-primary bg-background_light rounded-md px-3 py-3 md:w-56 mt-6 mx-auto ">Lihat
                    Selengkapnya</button>
            </div>
        </div>
    </section>
    <!-- end section news -->

    <!-- start section partner-->
    <section id="partner" class="md:my-24 my-8" aria-labelledby="carousel-heading">
        <div class="container">
            <div class="flex flex-col gap-4 md:gap-6">
                <div class="flex flex-col mx-auto">
                    <h2 class="font-monserrat font-bold text-2xl md:text-4xl text-primary_teks text-center">Mitra Kami</h2>
                    <p class="font-nunito text-base md:text-xl text-secondary_teks text-center">Bekerja sama dengan
                        berbagai
                        pihak untuk memberikan pelayanan yang terbaik bagi masyarakat.</p>
                </div>
                <div class="flex flex-col gap-6 md:gap-10 md:px-6">
                    <div class="slick-slider-m" id="slick-slider-m">
                        <div class="slide">
                            <ul class="slick-slider2 flex flex-row gap-4 md:gap-0">
                                @foreach ($mitras as $mitra)
                                    <li class="slick-slide mx-2 md:mx-0">
                                        <img src="{{ asset($mitra->logo_mitra) }}"
                                            class="size-24 md:size-40  rounded-md object-center " alt="">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end section partner --}}

    <!-- start section faq -->
    <section id="faq">
        <div class="container relative md:my-24 my-20">
            <div class="z-20 flex flex-col gap-6">
                <div class="flex flex-col gap-3 mx-auto">
                    <h2 class="font-monserrat font-bold text-2xl md:text-4xl text-primary_teks text-center">FAQ</h2>
                    <p class="font-nunito text-base md:text-xl text-secondary_teks text-center">Bekerja sama dengan
                        berbagai
                        pihak
                        untuk memberikan pelayanan yang terbaik bagi masyarakat.</p>
                </div>
                <div class="flex flex-col md:gap-6 gap-4">
                    <div x-data="{
                        activeAccordion: '',
                        setActiveAccordion(id) {
                            this.activeAccordion = (this.activeAccordion == id) ? '' : id
                        }
                    }" class="relative w-full max-w-[1024px] mx-auto text-xs">
                        @foreach ($faqs as $index => $faq)
                            @if ($loop->index < 5)
                                <div x-data="{ id: $id('accordion') }"
                                    :class="{
                                        'border-primary text-neutral-800 my-4': activeAccordion ==
                                            id,
                                        'border-gray-200 text-neutral-600 hover:text-neutral-800 my-4': activeAccordion !=
                                            id
                                    }"
                                    class="duration-300 ease-in-out bg-white border rounded-md cursor-pointer group"
                                    x-cloak>
                                    <button @click="setActiveAccordion(id)"
                                        class="flex items-center justify-between w-full px-5 py-4 font-nunito md:text-xl text-base font-semibold text-left select-none">
                                        <span>{{ $faq->pertanyaan }}</span>
                                        <div :class="{ 'rotate-90': activeAccordion == id }"
                                            class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-in-out">
                                            <div
                                                class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                                            </div>
                                            <div :class="{ 'rotate-90': activeAccordion == id }"
                                                class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                                            </div>
                                        </div>
                                    </button>
                                    <div x-show="activeAccordion==id" x-collapse x-cloak>
                                        <div class="p-5 pt-0 opacity-70">
                                            <p class="font-nunito text-sm  md:text-base ">
                                                {{ $faq->jawaban }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
                <a href="{{ route('faq.show') }}"
                    class="font-nunito font-semibold text-center text-base md:text-lg text-background_light bg-primary rounded-md px-3 py-3 md:w-56 mt-6 mx-auto">Lihat
                    Selengkapnya</a>

            </div>
        </div>
    </section>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.slick-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
            });
            $('.slick-slider2').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                responsive: [{
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        autoplay: true,
                        autoplaySpeed: 2000,
                    }
                }]
            });

        });

        function slickPrev() {
            $('#slick-slider').slick('slickPrev');
        }

        function slickNext() {
            $('#slick-slider').slick('slickNext');
        }
    </script>
@endsection
