@extends('layouts.app')
@section('content')
    {{-- start section tupoksi, visi & misis --}}
    <section id="tuvimsi" class="my-10 md:my-20">
        <div class="container">
            <div class="grid gap-10">
                <div class="grid grid-cols-1 gap-4 md:gap-0 md:grid-cols-2">
                    <div class="flex">
                        <h2 class="font-monserrat text-primary text-2xl font-bold md:text-[32px]">Tupoksi</h2>
                    </div>
                    <div class="flex flex-col gap-6">
                    @foreach ($tupoksis as $tupoksi)
                        <div class="flex flex-col gap-4">
                            <h3 class="font-monserrat text-primary_teks text-xl font-semibold md:text-2xl">Tugas Pokok</h3>
                            <hr class="w-7 border-b-[1.5px] border-primary rounded-sm">
                            <p class="font-nunito text-base text-primary_teks">{!! $tupoksi->deskripsi_tugaspokok !!}
                            </p>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h3 class="font-monserrat text-primary_teks text-xl font-semibold md:text-2xl">Fungsi</h3>
                            <hr class="w-7 border-b-[1.5px] border-primary rounded-sm">
                            <ul class="list-inside list-decimal ">
                                <ul class="font-nunito text-base text-primary_teks">{{ $tupoksi->deskripsi_fungsi }}</ul>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 md:gap-0 md:grid-cols-2">
                    <div class="flex">
                        <h2 class="font-monserrat text-primary text-2xl font-bold md:text-[32px]">Visi & Misi</h2>
                    </div>
                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col gap-4">
                            <h3 class="font-monserrat text-primary_teks text-xl font-semibold md:text-2xl">Visi</h3>
                            <hr class="w-7 border-b-[1.5px] border-primary rounded-sm">
                            <p class="font-nunito text-base text-primary_teks font-bold"><i>{{ $tupoksi->deskripsi_visi }}</i>
                            </p>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h3 class="font-monserrat text-primary_teks text-xl font-semibold md:text-2xl">Misi</h3>
                            <hr class="w-7 border-b-[1.5px] border-primary rounded-sm">
                                <li class="font-nunito text-base text-primary_teks">{{ $tupoksi->deskripsi_misi }}</li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- end section tupoksi, visi & misis --}}
@endsection
