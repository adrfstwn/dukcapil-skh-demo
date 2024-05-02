@extends('layouts.app')
@section('content')
    {{-- start download section --}}
    <section id="download" class="my-10 md:my-20 -z-10">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="flex flex-col gap-6 md:gap-12">
                    <div class="flex flex-col gap-4">
                        <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks "><span
                                class="font-bold text-primary">Download</span> Terbaru</h2>
                    </div>
                    <div class="flex flex-col gap-4 max-w-screen-sm">
                        <div class="flex flex-col gap-2">
                            <div class="flex flex-col gap-3">
                                <a href="detail-download" class="font-bold font-nunito text-xl md:text-2xl text-primary_teks ">Forum
                                    Perangkat Daerah
                                    Dinas Dukcapil Kabupaten Sukoharjo Tahun 2024</a>
                                <p class="text-sm text-secondary_teks font-nunito">28 Februari 2024</p>

                                <p class="font-nunito text-base text-secondary_teks line-clamp-2">Kegiatan dipimpin oleh
                                    Kepala Dinas
                                    Dukcapil Kabupaten Sukoharjo Budi Susetyo, S.H., M.H dengan narasumber dari Bapperida
                                    (Burhan Surya
                                    Aji, S.IP., M.M. Kabid. PPE PD) dan BPKPAD (Tri Hastuti Lestari Handayani, S.E., M.M.
                                    Analis
                                    Keuangan Pusat dan Daerah Ahli Muda).</p>
                            </div>
                            <div class="flex flex-row items-center gap-2">
                                <a href="detail-download"
                                    class="px-2 py-[4px] font-nunito text-sm text-background_light bg-primary rounded-sm">
                                    Lihat Selengkapnya</a>
                            </div>
                            <hr class="border-b-[1px] border-gray-300 mt-6 md:mt-8 rounded-full">
                        </div>
                        @foreach ($downloads as $download)
                        <div class="flex flex-col gap-2">
                            <div class="flex flex-col gap-3">
                                <a href="detail-download" class="font-bold font-nunito text-xl md:text-2xl text-primary_teks ">
                                    {{$download->judul}}</a>
                                <p class="text-sm text-secondary_teks font-nunito">{{$download->created_at}}</p>

                                <p class="font-nunito text-base text-secondary_teks line-clamp-2">
                                    {{$download->deskripsi_download}}</p>
                            </div>
                            <div class="flex flex-row items-center gap-2">
                                <iframe src="{{ asset('storage/' . $download->file) }}" width="100%" height="500px"></iframe>
                            </div>
                            <hr class="border-b-[1px] border-gray-300 mt-6 md:mt-8 rounded-full">
                        </div>
                        @endforeach
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
    {{-- end download section --}}
@endsection
