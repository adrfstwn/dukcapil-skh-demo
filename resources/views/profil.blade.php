@extends('layouts.app')
@section('content')
    {{-- start section profile --}}
    <Section id="profile" class="my-10 md:my-20">
    @foreach ($profils as $profil)
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-20 justify-center items-start">
                <div class="flex flex-col gap-3 ">
                    <h2 class="font-monserrat font-bold text-2xl md:text-[32px] text-primary_teks"><span
                            class="text-primary text-2xl font-monserrat font-medium">PROFIL</span> <br>
                            {{ $profil->nama }}</h2>
                    <p class="font-nunito text-primary_teks text-base">
                    {{ $profil->deskripsi_profil }}
                    </p>
                </div>
                <div class="flex">
                    <img src="{{ asset('storage/' . $profil->gambar_profil) }}" loading="lazy" alt="Logo Kab.Sukoharjo" class="w-80 ">
                </div>
            </div>
        </div>
    @endforeach
    </Section>
    {{-- end section profile --}}
@endsection
