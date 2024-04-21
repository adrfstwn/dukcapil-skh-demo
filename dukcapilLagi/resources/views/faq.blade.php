@extends('layouts.app')
@section('content')
<Section id="faq" class="my-10 md:my-20">
    <div class="container">
      <div class="flex flex-col gap-4">
        <div class="flex flex-col gap-3">
          <h2 class="text-2xl md:text-[32px] font-bold font-monserrat text-primary">FAQ</h2>
          <p class="font-nunito text-base text-primary_teks">Frequently Asked Questions</p>
        </div>
        <div class="flex flex-col gap-4">
          <div x-data="{ 
            activeAccordion: '', 
            setActiveAccordion(id) { 
                this.activeAccordion = (this.activeAccordion == id) ? '' : id 
            } 
        }" class="relative w-full max-w-[1024px] mx-auto text-xs">      
            <div x-data="{ id: $id('accordion') }"
              :class="{ 'border-neutral-200/60 text-neutral-800' : activeAccordion==id, 'border-transparent bg-primary text-background_light hover:text-slate-50' : activeAccordion!=id }"
              class="duration-200 ease-out  border rounded-md cursor-pointer group my-4" x-cloak>
              <button @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full px-5 py-4 font-nunito md:text-xl text-base font-semibold text-left select-none">
                <span>Apa itu disdukcapil?</span>
                <div :class="{ 'rotate-90': activeAccordion==id }"
                  class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                  <div class="absolute w-0.5 h-full bg-background_light group-hover:bg-slate-50 rounded-full"></div>
                  <div :class="{ 'rotate-90': activeAccordion==id }"
                    class="absolute w-full h-0.5 ease duration-500 bg-background_light group-hover:bg-slate-50 rounded-full">
                  </div>
                </div>
              </button>
              <div x-show="activeAccordion==id" x-collapse x-cloak>
                <div class="p-5 pt-0 opacity-70">
                  <p class="font-nunito text-sm  md:text-base ">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor magnam quam iure laborum accusamus
                    repellendus neque obcaecati inventore.
                  </p>
                </div>
              </div>
            </div>
            <div x-data="{ id: $id('accordion') }"
              :class="{ 'border-neutral-200/60 text-neutral-800' : activeAccordion==id, 'border-transparent bg-primary text-background_light hover:text-slate-50' : activeAccordion!=id }"
              class="duration-200 ease-out  border rounded-md cursor-pointer group my-4" x-cloak>
              <button @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full px-5 py-4 font-nunito md:text-xl text-base font-semibold text-left select-none">
                <span>Apa itu disdukcapil?</span>
                <div :class="{ 'rotate-90': activeAccordion==id }"
                  class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                  <div class="absolute w-0.5 h-full bg-background_light group-hover:bg-slate-50 rounded-full"></div>
                  <div :class="{ 'rotate-90': activeAccordion==id }"
                    class="absolute w-full h-0.5 ease duration-500 bg-background_light group-hover:bg-slate-50 rounded-full">
                  </div>
                </div>
              </button>
              <div x-show="activeAccordion==id" x-collapse x-cloak>
                <div class="p-5 pt-0 opacity-70">
                  <p class="font-nunito text-sm  md:text-base ">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor magnam quam iure laborum accusamus
                    repellendus neque obcaecati inventore.
                  </p>
                </div>
              </div>
            </div>
            <div x-data="{ id: $id('accordion') }"
              :class="{ 'border-neutral-200/60 text-neutral-800' : activeAccordion==id, 'border-transparent bg-primary text-background_light hover:text-slate-50' : activeAccordion!=id }"
              class="duration-200 ease-out  border rounded-md cursor-pointer group my-4" x-cloak>
              <button @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full px-5 py-4 font-nunito md:text-xl text-base font-semibold text-left select-none">
                <span>Apa itu disdukcapil?</span>
                <div :class="{ 'rotate-90': activeAccordion==id }"
                  class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                  <div class="absolute w-0.5 h-full bg-background_light group-hover:bg-slate-50 rounded-full"></div>
                  <div :class="{ 'rotate-90': activeAccordion==id }"
                    class="absolute w-full h-0.5 ease duration-500 bg-background_light group-hover:bg-slate-50 rounded-full">
                  </div>
                </div>
              </button>
              <div x-show="activeAccordion==id" x-collapse x-cloak>
                <div class="p-5 pt-0 opacity-70">
                  <p class="font-nunito text-sm  md:text-base ">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor magnam quam iure laborum accusamus
                    repellendus neque obcaecati inventore.
                  </p>
                </div>
              </div>
            </div>
            <div x-data="{ id: $id('accordion') }"
              :class="{ 'border-neutral-200/60 text-neutral-800' : activeAccordion==id, 'border-transparent bg-primary text-background_light hover:text-slate-50' : activeAccordion!=id }"
              class="duration-200 ease-out  border rounded-md cursor-pointer group my-4" x-cloak>
              <button @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full px-5 py-4 font-nunito md:text-xl text-base font-semibold text-left select-none">
                <span>Apa itu disdukcapil?</span>
                <div :class="{ 'rotate-90': activeAccordion==id }"
                  class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                  <div class="absolute w-0.5 h-full bg-background_light group-hover:bg-slate-50 rounded-full"></div>
                  <div :class="{ 'rotate-90': activeAccordion==id }"
                    class="absolute w-full h-0.5 ease duration-500 bg-background_light group-hover:bg-slate-50 rounded-full">
                  </div>
                </div>
              </button>
              <div x-show="activeAccordion==id" x-collapse x-cloak>
                <div class="p-5 pt-0 opacity-70">
                  <p class="font-nunito text-sm  md:text-base ">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor magnam quam iure laborum accusamus
                    repellendus neque obcaecati inventore.
                  </p>
                </div>
              </div>
            </div>
            <div x-data="{ id: $id('accordion') }"
              :class="{ 'border-neutral-200/60 text-neutral-800' : activeAccordion==id, 'border-transparent bg-primary text-background_light hover:text-slate-50' : activeAccordion!=id }"
              class="duration-200 ease-out  border rounded-md cursor-pointer group my-4" x-cloak>
              <button @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full px-5 py-4 font-nunito md:text-xl text-base font-semibold text-left select-none">
                <span>Apa itu disdukcapil?</span>
                <div :class="{ 'rotate-90': activeAccordion==id }"
                  class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                  <div class="absolute w-0.5 h-full bg-background_light group-hover:bg-slate-50 rounded-full"></div>
                  <div :class="{ 'rotate-90': activeAccordion==id }"
                    class="absolute w-full h-0.5 ease duration-500 bg-background_light group-hover:bg-slate-50 rounded-full">
                  </div>
                </div>
              </button>
              <div x-show="activeAccordion==id" x-collapse x-cloak>
                <div class="p-5 pt-0 opacity-70">
                  <p class="font-nunito text-sm  md:text-base ">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor magnam quam iure laborum accusamus
                    repellendus neque obcaecati inventore.
                  </p>
                </div>
              </div>
            </div>
            <div x-data="{ id: $id('accordion') }"
              :class="{ 'border-neutral-200/60 text-neutral-800' : activeAccordion==id, 'border-transparent bg-primary text-background_light hover:text-slate-50' : activeAccordion!=id }"
              class="duration-200 ease-out  border rounded-md cursor-pointer group my-4" x-cloak>
              <button @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full px-5 py-4 font-nunito md:text-xl text-base font-semibold text-left select-none">
                <span>Apa itu disdukcapil?</span>
                <div :class="{ 'rotate-90': activeAccordion==id }"
                  class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                  <div class="absolute w-0.5 h-full bg-background_light group-hover:bg-slate-50 rounded-full"></div>
                  <div :class="{ 'rotate-90': activeAccordion==id }"
                    class="absolute w-full h-0.5 ease duration-500 bg-background_light group-hover:bg-slate-50 rounded-full">
                  </div>
                </div>
              </button>
              <div x-show="activeAccordion==id" x-collapse x-cloak>
                <div class="p-5 pt-0 opacity-70">
                  <p class="font-nunito text-sm  md:text-base ">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor magnam quam iure laborum accusamus
                    repellendus neque obcaecati inventore.
                  </p>
                </div>
              </div>
            </div>
            <div x-data="{ id: $id('accordion') }"
              :class="{ 'border-neutral-200/60 text-neutral-800' : activeAccordion==id, 'border-transparent bg-primary text-background_light hover:text-slate-50' : activeAccordion!=id }"
              class="duration-200 ease-out  border rounded-md cursor-pointer group my-4" x-cloak>
              <button @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full px-5 py-4 font-nunito md:text-xl text-base font-semibold text-left select-none">
                <span>Apa itu disdukcapil?</span>
                <div :class="{ 'rotate-90': activeAccordion==id }"
                  class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                  <div class="absolute w-0.5 h-full bg-background_light group-hover:bg-slate-50 rounded-full"></div>
                  <div :class="{ 'rotate-90': activeAccordion==id }"
                    class="absolute w-full h-0.5 ease duration-500 bg-background_light group-hover:bg-slate-50 rounded-full">
                  </div>
                </div>
              </button>
              <div x-show="activeAccordion==id" x-collapse x-cloak>
                <div class="p-5 pt-0 opacity-70">
                  <p class="font-nunito text-sm  md:text-base ">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor magnam quam iure laborum accusamus
                    repellendus neque obcaecati inventore.
                  </p>
                </div>
              </div>
            </div>
            <div x-data="{ id: $id('accordion') }"
              :class="{ 'border-neutral-200/60 text-neutral-800' : activeAccordion==id, 'border-transparent bg-primary text-background_light hover:text-slate-50' : activeAccordion!=id }"
              class="duration-200 ease-out  border rounded-md cursor-pointer group my-4" x-cloak>
              <button @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full px-5 py-4 font-nunito md:text-xl text-base font-semibold text-left select-none">
                <span>Apa itu disdukcapil?</span>
                <div :class="{ 'rotate-90': activeAccordion==id }"
                  class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                  <div class="absolute w-0.5 h-full bg-background_light group-hover:bg-slate-50 rounded-full"></div>
                  <div :class="{ 'rotate-90': activeAccordion==id }"
                    class="absolute w-full h-0.5 ease duration-500 bg-background_light group-hover:bg-slate-50 rounded-full">
                  </div>
                </div>
              </button>
              <div x-show="activeAccordion==id" x-collapse x-cloak>
                <div class="p-5 pt-0 opacity-70">
                  <p class="font-nunito text-sm  md:text-base ">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor magnam quam iure laborum accusamus
                    repellendus neque obcaecati inventore.
                  </p>
                </div>
              </div>
            </div>
            
       

          </div>
        </div>
      </div>
    </div>
  </Section>
@endsection