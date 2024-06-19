@extends('layouts.app')

@section('content')
    <section id="Persyaratan" class="my-10 md:my-20">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="flex flex-col gap-6 md:gap-12">
                    <div class="flex flex-col gap-4">
                    @foreach ($persyaratans as $persyaratan)
                        <h2 class="font-monserrat text-2xl md:text-[32px] text-primary_teks">
                            <span class="font-bold text-primary">Detail Persyaratan</span>
                        </h2>
                    </div>
                    <div class="flex flex-col gap-4 max-w-screen-sm">
                        <div class="flex flex-col gap-2">
                            <div class="flex flex-col gap-3">
                                <div class="flex flex-col gap-2">
                                    <h2 class="font-bold font-nunito text-xl md:text-2xl text-primary_teks">
                                        {{ $persyaratan->judul }}
                                    </h2>
                                    <p class="text-sm font-medium text-center text-white bg-primary px-2 py-1 max-w-32 rounded-full">
                                        {{ $persyaratan->kategori->nama_kategori }}
                                    </p>
                                </div>
                                <p class="text-sm text-secondary_teks font-nunito">
                                    {{ $persyaratan->created_at->format('d F Y') }}
                                </p>
                                <p class="font-nunito text-base text-secondary_teks">
                                    {{ $persyaratan->deskripsi_persyaratan }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                        <hr class="border-b-[1px] border-gray-300 mt-6 md:mt-8 rounded-full">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
