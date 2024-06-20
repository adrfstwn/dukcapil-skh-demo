<footer class="pt-6 pb-6 bg-primary">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="w-full md:w-1/4">
                <img src="dist/assets/image/SKH-LOGO.png" alt="logo disdukcapil sukoharjo" width=""
                    class="w-28 md:w-48">
                <p class="mt-4 mb-10 text-base md:text-lg font-monserrat font-bold text-background_light ">
                    Dinas Kependudukan dan <br> Pencatatan Sipil Kabupaten Sukoharjo
                </p>
            </div>
            <div class="w-full md:w-1/4 md:pl-20">
                <h3 class="text-xl font-monserrat text-background_light font-bold pb-3">
                    Menu
                </h3>
                <hr class="w-8 border-b-[1.5px] rounded-sm mb-5">
                <ul>
                    <li><a href="/"
                            class="font-nunito inline-block pb-2 mb-4 md:mb-3 md:pb-1 text-sm text-background_light style-menu-footer">BERANDA</a>
                    </li>
                    <li><a href="profile"
                            class="font-nunito inline-block pb-2 mb-4 md:mb-3 md:pb-1 text-sm text-background_light style-menu-footer">PROFIL</a>
                    </li>
                    <li><a href="beritane"
                            class="font-nunito inline-block pb-2 mb-4 md:mb-3 md:pb-1 text-sm text-background_light style-menu-footer">BERITA</a>
                    </li>
                    <li><a href="download"
                            class="font-nunito inline-block pb-2 mb-4 md:mb-3 md:pb-1 text-sm text-background_light style-menu-footer">DOWNLOAD</a>
                    </li>
                    <li><a href="persyaratan"
                            class="font-nunito inline-block pb-2 mb-4 md:mb-3 md:pb-1 text-sm text-background_light style-menu-footer">PERSYARATAN</a>
                    </li>
                    <li><a href="kontak"
                            class="font-nunito inline-block pb-2 mb-4 md:mb-3 md:pb-1 text-sm text-background_light style-menu-footer">KONTAK</a>
                    </li>
                </ul>
            </div>
            <div class="w-full md:w-1/4">
                <h3 class="text-xl font-monserrat text-background_light font-bold pb-3">
                    Link Terkait
                </h3>
                <hr class="w-8 border-b-[1.5px] rounded-sm mb-5">

                @foreach ($layanan as $layanan )
                <ul>
                    <li><a href=" {{ $layanan->link_layanan }}"
                            class="font-nunito inline-block pb-2 text-sm mb-4 text-background_light style-menu-footer">
                              {{ $layanan->nama_layanan }}</a>
                    </li>

                </ul>
                @endforeach
            </div>
            <div class="w-full md:w-1/4">
                @foreach ($kontak as $kontak)
                    <h3 class="text-xl font-monserrat text-background_light font-bold pb-3">
                        Temukan Kami
                    </h3>
                    <hr class="w-8 border-b-[1.5px] rounded-sm mb-5">
                    <ul>
                        @foreach ($maps as $map )


                        <li><a href=""
                                class="font-nunito inline-block pb-3 mb-4 text-sm text-background_light style-menu-footer">{{ $map->alamat }}</a>
                        </li>
                        @endforeach
                        <li><a href=""
                                class="font-nunito inline-block pb-3 mb-4 text-sm text-background_light style-menu-footer">Telp:
                                {{ $kontak->telp }}
                                <br>
                                Fax: {{ $kontak->fax }}</a>
                        </li>
                        <li><a href=""
                                class="font-nunito inline-block pb-3 mb-4 text-sm text-background_light style-menu-footer">WA
                                Layanan Pengaduan: {{ $kontak->wa_layan }}</a>
                        </li>
                        <li><a href=""
                                class="font-nunito inline-block pb-3 mb-4 text-sm text-background_light style-menu-footer">Email:
                                {{ $kontak->email }}</a>
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>
        <div class="w-full mt-10 border-t-[2px] border-white rounded-sm">
            <div class="pt-6  flex flex-wrap items-center justify-between">
                <p class=" pb-3 text-sm text-background_light font-medium font-nunito md:text-base">
                    &copy; 2024 DISDUKCAPIL KABUPATEN SUKOHARJO
                </p>
                <div class="flex  gap-3">
                    @foreach ($linksos as $linksos)
                        <!-- youtube -->
                        <a href="{{ $linksos->yt }}" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                class="md:size-8" viewBox="0,0,256,256" style="fill:#000000;">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1"
                                    stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                    stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                    font-size="none" text-anchor="none" style="mix-blend-mode: normal">
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
                        <a href="{{ $linksos->instagram }}" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                class="md:size-7" viewBox="0,0,256,256" style="fill:#000000;">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1"
                                    stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                    stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                    font-size="none" text-anchor="none" style="mix-blend-mode: normal">
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
                        <a href="{{ $linksos->facebook }}" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                class="md:size-7" viewBox="0,0,256,256" style="fill:#000000;">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1"
                                    stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                    stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                    font-size="none" text-anchor="none" style="mix-blend-mode: normal">
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
                        <a href="{{ $linksos->x }}" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                class="md:size-7" viewBox="0,0,256,256" style="fill:#000000;">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1"
                                    stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                    stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                    font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                    <g transform="scale(5.12,5.12)">
                                        <title>twitter X</title>
                                        <path
                                            d="M11,4c-3.866,0 -7,3.134 -7,7v28c0,3.866 3.134,7 7,7h28c3.866,0 7,-3.134 7,-7v-28c0,-3.866 -3.134,-7 -7,-7zM13.08594,13h7.9375l5.63672,8.00977l6.83984,-8.00977h2.5l-8.21094,9.61328l10.125,14.38672h-7.93555l-6.54102,-9.29297l-7.9375,9.29297h-2.5l9.30859,-10.89648zM16.91406,15l14.10742,20h3.06445l-14.10742,-20z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Splide('#splide1', {
            type: 'loop',
            drag: 'free',
            autoStart: true,
            pauseOnHover: true,
            focus: 'center',
            pagination: false,
            arrows: false,
            perPage: 4,
            autoScroll: {
                speed: 4,
            },
        }).mount();

        new Splide('#splide2', {
            type: 'loop',
            drag: 'free',
            autoStart: true,
            pauseOnHover: true,
            focus: 'center',
            pagination: false,
            arrows: false,
            perPage: 7,
            autoScroll: {
                speed: 4,
            },
        }).mount();
    });
</script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
