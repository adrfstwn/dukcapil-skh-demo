@extends('layouts.app')
@section('content')
    {{-- start section kontak --}}
    <section id="kontak" class="my-10 md:my-20 ">
        <div class="container">
            <div class=" flex flex-col gap-4 md:gap-6">
                <div class="flex flex-col gap-4">
                    <h2 class="font-monserrat text-2xl md:text-[32px] text-primary font-bold">Temukan Kami</h2>
                    <div class="max-w-screen-xl">
                        <div class="relative" style="padding-top: 56.25%;">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5022.40373016162!2d110.83258619380901!3d-7.66394725613525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a3c46cf40ab25%3A0x47b08fd85924a44f!2sDinas%20Kependudukan%20Dan%20Pencatatan%20Sipil%20Kabupaten%20Sukoharjo!5e0!3m2!1sen!2sid!4v1712552012206!5m2!1sen!2sid"
                                style="border:0; position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                class="w-full h-full rounded-lg md:rounded-2xl -z-10"></iframe>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="flex flex-col gap-2 md:gap-3">
                            <h3 class="font-nunito font-bold text-primary_teks text-xl md:text-2xl">Alamat</h3>
                            <p class="font-nunito text-base text-secondary_teks">Alamat : Jalan Kyai Mawardi No. 1
                                Sukoharjo Kode Pos. 57521</p>
                        </div>
                        @foreach($jam as $jam)
                        <div class="flex flex-col gap-2 md:gap-3">
                            <h3 class="font-nunito font-bold text-primary_teks text-xl md:text-2xl">Jam Operasional</h3>
                            <ul class="font-nunito text-base text-secondary_teks">
                                <li>Senin - Kamis ({{ $jam->weekday }})</li>
                                <li>Jum'at ({{ $jam->jumat }})</li>
                                <li>Sabtu ({{ $jam->sabtu }})</li>
                            </ul>
                        </div>
                        @endforeach
                        @foreach($kontak as $kontak)
                        <div class="flex flex-col gap-2 md:gap-3">
        <h3 class="font-nunito font-bold text-primary_teks text-xl md:text-2xl">Kontak</h3>
        <ul class="font-nunito text-base text-secondary_teks">
            <li>Telp: {{ $kontak->telp }} <br>
                Fax: {{ $kontak->fax }}</li>
            <li>WA Layanan Pengaduan: {{ $kontak->wa_layan }}</li>
            <li>Email: {{ $kontak->email }}</li>
        </ul>
    </div>
    @endforeach
                    </div>
                </div>
                <div class="flex h-80 md:h-64 flex-col md:flex-row gap-12 relative">
                    <div class="bg-gradient-to-r from-primary to-neutral-800 rounded-lg" style="width: 100%; height: 100%;">
                        <img src="{{ asset('dist/assets/image/Gedung.jpg') }}" alt="" class="rounded-lg object-cover opacity-15"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <div class="absolute p-6 md:p-12 w-full flex flex-col md:flex-row justify-between gap-4 md:gap-10">
                        <div class="flex flex-col">
                            <h4 class="font-monserrat text-base md:text-2xl text-background_light font-bold">Ikuti Kami</h4>
                            <p class="font-monserrat text-sm text-background_light">Temukan kami di media social anda</p>
                        </div>
                        <div class="flex flex-col gap-4 justify-end">
                            <!-- instagram -->
                            @foreach($linksos as $linksos)
                            <div class="flex flex-row gap-2 items-center">
                                <img src="dist/assets/icon/ri_instagram-fill.svg" alt="">
                                <a href="{{$linksos->instagram}}"
                                    class="font-nunito font-semibold text-background_light">{{$linksos->nama_instagram}}</a>
                            </div>
                            <!-- facebook -->
                            <div class="flex flex-row gap-2 items-center">
                                <img src="dist/assets/icon/facebook-fill.svg" alt="">
                                <a href="{{$linksos->facebook}}"
                                    class="font-nunito font-semibold text-background_light">{{$linksos->nama_facebook}}</a>
                            </div>
                            <!-- twitter -->
                            <div class="flex flex-row gap-2 items-center">
                                <img src="dist/assets/icon/formkit_twitter.svg" alt="">
                                <a href="{{$linksos->x}}"
                                    class="font-nunito font-semibold text-background_light">{{$linksos->nama_x}}</a>
                            </div>
                            <!-- youtube -->
                            <div class="flex flex-row gap-2 items-center">
                                <img src="dist/assets/icon/youtube-fill.svg" alt="">
                                <a href="{{$linksos->yt}}"
                                    class="font-nunito font-semibold text-background_light">{{$linksos->nama_yt}}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
    {{-- end section kontak --}}
@endsection
