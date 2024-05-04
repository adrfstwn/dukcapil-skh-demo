@extends('layouts.app')
@section('content')
<section id="faq">
    <div class="container relative my-20">
        <div class="z-20 flex flex-col gap-6">
            <div class="flex flex-col mx-auto gap-3">
                <h2 class="font-monserrat font-bold text-2xl md:text-4xl text-primary_teks text-center">FAQ</h2>
                <p class="font-nunito text-base md:text-xl text-secondary_teks text-center">Bekerja sama dengan
                    berbagai
                    pihak
                    untuk memberikan pelayanan yang terbaik bagi masyarakat.</p>
            </div>
            <div class="flex flex-col gap-4">
                <div x-data="{
                    activeAccordion: '',
                    setActiveAccordion(id) {
                        this.activeAccordion = (this.activeAccordion == id) ? '' : id
                    }
                }" class="relative w-full max-w-[1024px] mx-auto text-xs">
                    @foreach ($faqs as $faq)
                        <div x-data="{ id: $id('accordion') }"
                            :class="{
                                'border-primary text-neutral-800 my-4': activeAccordion ==
                                    id,
                                'border-gray-200 text-neutral-600 hover:text-neutral-800 my-4': activeAccordion !=
                                    id
                            }"
                            class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
                            <button @click="setActiveAccordion(id)"
                                class="flex items-center justify-between w-full px-5 py-4 font-nunito md:text-xl text-base font-semibold text-left select-none">
                                <span>{{ $faq->pertanyaan }}</span>
                                <div :class="{ 'rotate-90': activeAccordion == id }"
                                    class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
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
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
