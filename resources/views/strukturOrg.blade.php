@extends('layouts.app')
@section('content')
    {{-- start section struktur organisasi --}}
    <section id="strukturOrganisasi" class="my-10 md:my-20">
        <div class="container">
        @foreach ($strukturorgs as $strukturorg)
            <div class="flex flex-col gap-4 md:gap-6">
                <h2 class="font-monserrat text-2xl md:text-[32px] text-primary font-bold">{{ $strukturorg->judul }}</h2>
                <iframe src="{{ asset('storage/' . $strukturorg->file) }}" frameborder="2" height="600"></iframe>

            </div>
        </div>
        @endforeach
        </div>
    </section>
    {{-- end section struktur organisasi --}}
@endsection
