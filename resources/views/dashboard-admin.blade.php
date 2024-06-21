@extends('master-admin')
@section('content')
    <section id="widget-admin" class="my-10 mx-3">
        <div class="flex flex-row gap-6">
            <div class="flex flex-col p-5 rounded-2xl shadow-lg gap-6">
                <div class="flex flex-row gap-40 items-center">
                    <h3 class="font-light font-monserrat text-2xl text-neutral-950">Berita</h3>
                    <div class="flex items-center p-3 rounded-full bg-primary/15">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 21 21"
                            class="text-primary">
                            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M4.5 7.165h9m-8.019 3.038l1-.018a1 1 0 0 1 1.01.864l.009.135v.984a1 1 0 0 1-.981 1l-1 .018a1 1 0 0 1-1.01-.864l-.009-.136v-.983a1 1 0 0 1 .981-1" />
                                <path
                                    d="M3.5 4.15h11a2 2 0 0 1 2 2v10.015h-13a2 2 0 0 1-2-2V6.151a2 2 0 0 1 2-2m6 6.014h4m-4 3h4" />
                                <path d="M16 16.165a2.5 2.5 0 0 0 2.5-2.5v-6.5h-2" />
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="text-primary font-bold font-monserrat text-4xl">{{$jumlahBerita}}
                    </h3>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 21 21"
                            class="text-primary">
                            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M4.5 7.165h9m-8.019 3.038l1-.018a1 1 0 0 1 1.01.864l.009.135v.984a1 1 0 0 1-.981 1l-1 .018a1 1 0 0 1-1.01-.864l-.009-.136v-.983a1 1 0 0 1 .981-1" />
                                <path
                                    d="M3.5 4.15h11a2 2 0 0 1 2 2v10.015h-13a2 2 0 0 1-2-2V6.151a2 2 0 0 1 2-2m6 6.014h4m-4 3h4" />
                                <path d="M16 16.165a2.5 2.5 0 0 0 2.5-2.5v-6.5h-2" />
                            </g>
                        </svg>
                        <p class="text-neutral-400 text-sm font-medium">Total keseluruhan dari semua berita</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col p-5 rounded-2xl shadow-lg gap-6">
                <div class="flex flex-row gap-40 items-center">
                    <h3 class="font-light font-monserrat text-2xl text-neutral-950">Download</h3>
                    <div class="flex items-center p-3 rounded-full bg-primary/15">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 24 24"
                            class="text-primary">
                            <g fill="none">
                                <path fill="currentColor"
                                    d="m15.393 4.054l-.502.557zm3.959 3.563l-.502.557zm2.302 2.537l-.685.305zM3.172 20.828l.53-.53zm17.656 0l-.53-.53zM14 21.25h-4v1.5h4zM2.75 14v-4h-1.5v4zm18.5-.437V14h1.5v-.437zM14.891 4.61l3.959 3.563l1.003-1.115l-3.958-3.563zm7.859 8.952c0-1.689.015-2.758-.41-3.714l-1.371.61c.266.598.281 1.283.281 3.104zm-3.9-5.389c1.353 1.218 1.853 1.688 2.119 2.285l1.37-.61c-.426-.957-1.23-1.66-2.486-2.79zM10.03 2.75c1.582 0 2.179.012 2.71.216l.538-1.4c-.852-.328-1.78-.316-3.248-.316zm5.865.746c-1.086-.977-1.765-1.604-2.617-1.93l-.537 1.4c.532.204.98.592 2.15 1.645zM10 21.25c-1.907 0-3.261-.002-4.29-.14c-1.005-.135-1.585-.389-2.008-.812l-1.06 1.06c.748.75 1.697 1.081 2.869 1.239c1.15.155 2.625.153 4.489.153zM1.25 14c0 1.864-.002 3.338.153 4.489c.158 1.172.49 2.121 1.238 2.87l1.06-1.06c-.422-.424-.676-1.004-.811-2.01c-.138-1.027-.14-2.382-.14-4.289zM14 22.75c1.864 0 3.338.002 4.489-.153c1.172-.158 2.121-.49 2.87-1.238l-1.06-1.06c-.424.422-1.004.676-2.01.811c-1.027.138-2.382.14-4.289.14zM21.25 14c0 1.907-.002 3.262-.14 4.29c-.135 1.005-.389 1.585-.812 2.008l1.06 1.06c.75-.748 1.081-1.697 1.239-2.869c.155-1.15.153-2.625.153-4.489zm-18.5-4c0-1.907.002-3.261.14-4.29c.135-1.005.389-1.585.812-2.008l-1.06-1.06c-.75.748-1.081 1.697-1.239 2.869C1.248 6.661 1.25 8.136 1.25 10zm7.28-8.75c-1.875 0-3.356-.002-4.511.153c-1.177.158-2.129.49-2.878 1.238l1.06 1.06c.424-.422 1.005-.676 2.017-.811c1.033-.138 2.395-.14 4.312-.14z" />
                                <path stroke="currentColor" stroke-width="1.3"
                                    d="M13 2.5V5c0 2.357 0 3.536.732 4.268C14.464 10 15.643 10 18 10h4" opacity="1" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.3" d="M8.5 13.5v5m0 0l2-1.875m-2 1.875l-2-1.875" opacity="1" />
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="text-primary font-bold font-monserrat text-4xl">{{$jumlahDownload}}</h3>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                            class="text-primary">
                            <g fill="none">
                                <path fill="currentColor"
                                    d="m15.393 4.054l-.502.557zm3.959 3.563l-.502.557zm2.302 2.537l-.685.305zM3.172 20.828l.53-.53zm17.656 0l-.53-.53zM14 21.25h-4v1.5h4zM2.75 14v-4h-1.5v4zm18.5-.437V14h1.5v-.437zM14.891 4.61l3.959 3.563l1.003-1.115l-3.958-3.563zm7.859 8.952c0-1.689.015-2.758-.41-3.714l-1.371.61c.266.598.281 1.283.281 3.104zm-3.9-5.389c1.353 1.218 1.853 1.688 2.119 2.285l1.37-.61c-.426-.957-1.23-1.66-2.486-2.79zM10.03 2.75c1.582 0 2.179.012 2.71.216l.538-1.4c-.852-.328-1.78-.316-3.248-.316zm5.865.746c-1.086-.977-1.765-1.604-2.617-1.93l-.537 1.4c.532.204.98.592 2.15 1.645zM10 21.25c-1.907 0-3.261-.002-4.29-.14c-1.005-.135-1.585-.389-2.008-.812l-1.06 1.06c.748.75 1.697 1.081 2.869 1.239c1.15.155 2.625.153 4.489.153zM1.25 14c0 1.864-.002 3.338.153 4.489c.158 1.172.49 2.121 1.238 2.87l1.06-1.06c-.422-.424-.676-1.004-.811-2.01c-.138-1.027-.14-2.382-.14-4.289zM14 22.75c1.864 0 3.338.002 4.489-.153c1.172-.158 2.121-.49 2.87-1.238l-1.06-1.06c-.424.422-1.004.676-2.01.811c-1.027.138-2.382.14-4.289.14zM21.25 14c0 1.907-.002 3.262-.14 4.29c-.135 1.005-.389 1.585-.812 2.008l1.06 1.06c.75-.748 1.081-1.697 1.239-2.869c.155-1.15.153-2.625.153-4.489zm-18.5-4c0-1.907.002-3.261.14-4.29c.135-1.005.389-1.585.812-2.008l-1.06-1.06c-.75.748-1.081 1.697-1.239 2.869C1.248 6.661 1.25 8.136 1.25 10zm7.28-8.75c-1.875 0-3.356-.002-4.511.153c-1.177.158-2.129.49-2.878 1.238l1.06 1.06c.424-.422 1.005-.676 2.017-.811c1.033-.138 2.395-.14 4.312-.14z" />
                                <path stroke="currentColor" stroke-width="1.3"
                                    d="M13 2.5V5c0 2.357 0 3.536.732 4.268C14.464 10 15.643 10 18 10h4" opacity="1" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.3" d="M8.5 13.5v5m0 0l2-1.875m-2 1.875l-2-1.875" opacity="1" />
                            </g>
                        </svg>
                        <p class="text-neutral-400 text-sm font-medium">Total keseluruhan unduhan file</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col p-5 rounded-2xl shadow-lg gap-6">
                <div class="flex flex-row gap-28 items-center">
                    <h3 class="font-light font-monserrat text-2xl text-neutral-950">persyaratan</h3>
                    <div class="flex items-center p-3 rounded-full bg-primary/15">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 24 24"
                            class="text-primary">
                            <g fill="none">
                                <path fill="currentColor"
                                    d="m15.393 4.054l-.502.557zm3.959 3.563l-.502.557zm2.302 2.537l-.685.305zM3.172 20.828l.53-.53zm17.656 0l-.53-.53zM14 21.25h-4v1.5h4zM2.75 14v-4h-1.5v4zm18.5-.437V14h1.5v-.437zM14.891 4.61l3.959 3.563l1.003-1.115l-3.958-3.563zm7.859 8.952c0-1.689.015-2.758-.41-3.714l-1.371.61c.266.598.281 1.283.281 3.104zm-3.9-5.389c1.353 1.218 1.853 1.688 2.119 2.285l1.37-.61c-.426-.957-1.23-1.66-2.486-2.79zM10.03 2.75c1.582 0 2.179.012 2.71.216l.538-1.4c-.852-.328-1.78-.316-3.248-.316zm5.865.746c-1.086-.977-1.765-1.604-2.617-1.93l-.537 1.4c.532.204.98.592 2.15 1.645zM10 21.25c-1.907 0-3.261-.002-4.29-.14c-1.005-.135-1.585-.389-2.008-.812l-1.06 1.06c.748.75 1.697 1.081 2.869 1.239c1.15.155 2.625.153 4.489.153zM1.25 14c0 1.864-.002 3.338.153 4.489c.158 1.172.49 2.121 1.238 2.87l1.06-1.06c-.422-.424-.676-1.004-.811-2.01c-.138-1.027-.14-2.382-.14-4.289zM14 22.75c1.864 0 3.338.002 4.489-.153c1.172-.158 2.121-.49 2.87-1.238l-1.06-1.06c-.424.422-1.004.676-2.01.811c-1.027.138-2.382.14-4.289.14zM21.25 14c0 1.907-.002 3.262-.14 4.29c-.135 1.005-.389 1.585-.812 2.008l1.06 1.06c.75-.748 1.081-1.697 1.239-2.869c.155-1.15.153-2.625.153-4.489zm-18.5-4c0-1.907.002-3.261.14-4.29c.135-1.005.389-1.585.812-2.008l-1.06-1.06c-.75.748-1.081 1.697-1.239 2.869C1.248 6.661 1.25 8.136 1.25 10zm7.28-8.75c-1.875 0-3.356-.002-4.511.153c-1.177.158-2.129.49-2.878 1.238l1.06 1.06c.424-.422 1.005-.676 2.017-.811c1.033-.138 2.395-.14 4.312-.14z" />
                                <path stroke="currentColor" stroke-width="1.3"
                                    d="M13 2.5V5c0 2.357 0 3.536.732 4.268C14.464 10 15.643 10 18 10h4" />
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="text-primary font-bold font-monserrat text-4xl">{{$jumlahPersyaratan}}</h3>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                            class="text-primary">
                            <g fill="none">
                                <path fill="currentColor"
                                    d="m15.393 4.054l-.502.557zm3.959 3.563l-.502.557zm2.302 2.537l-.685.305zM3.172 20.828l.53-.53zm17.656 0l-.53-.53zM14 21.25h-4v1.5h4zM2.75 14v-4h-1.5v4zm18.5-.437V14h1.5v-.437zM14.891 4.61l3.959 3.563l1.003-1.115l-3.958-3.563zm7.859 8.952c0-1.689.015-2.758-.41-3.714l-1.371.61c.266.598.281 1.283.281 3.104zm-3.9-5.389c1.353 1.218 1.853 1.688 2.119 2.285l1.37-.61c-.426-.957-1.23-1.66-2.486-2.79zM10.03 2.75c1.582 0 2.179.012 2.71.216l.538-1.4c-.852-.328-1.78-.316-3.248-.316zm5.865.746c-1.086-.977-1.765-1.604-2.617-1.93l-.537 1.4c.532.204.98.592 2.15 1.645zM10 21.25c-1.907 0-3.261-.002-4.29-.14c-1.005-.135-1.585-.389-2.008-.812l-1.06 1.06c.748.75 1.697 1.081 2.869 1.239c1.15.155 2.625.153 4.489.153zM1.25 14c0 1.864-.002 3.338.153 4.489c.158 1.172.49 2.121 1.238 2.87l1.06-1.06c-.422-.424-.676-1.004-.811-2.01c-.138-1.027-.14-2.382-.14-4.289zM14 22.75c1.864 0 3.338.002 4.489-.153c1.172-.158 2.121-.49 2.87-1.238l-1.06-1.06c-.424.422-1.004.676-2.01.811c-1.027.138-2.382.14-4.289.14zM21.25 14c0 1.907-.002 3.262-.14 4.29c-.135 1.005-.389 1.585-.812 2.008l1.06 1.06c.75-.748 1.081-1.697 1.239-2.869c.155-1.15.153-2.625.153-4.489zm-18.5-4c0-1.907.002-3.261.14-4.29c.135-1.005.389-1.585.812-2.008l-1.06-1.06c-.75.748-1.081 1.697-1.239 2.869C1.248 6.661 1.25 8.136 1.25 10zm7.28-8.75c-1.875 0-3.356-.002-4.511.153c-1.177.158-2.129.49-2.878 1.238l1.06 1.06c.424-.422 1.005-.676 2.017-.811c1.033-.138 2.395-.14 4.312-.14z" />
                                <path stroke="currentColor" stroke-width="1.3"
                                    d="M13 2.5V5c0 2.357 0 3.536.732 4.268C14.464 10 15.643 10 18 10h4" />
                            </g>
                        </svg>
                        <p class="text-neutral-400 text-sm font-medium">Total keseluruhan persyaratan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="menu-submenu" class="my-10 mx-3">
        <div class="flex flex-row gap-6">
            <!-- Menu Table -->
            <div class="overflow-hidden w-full overflow-x-auto rounded-xl border border-slate-300 max-w-screen-lg ">
                <a href="{{ route('menu.index') }}"
                    class="flex gap-2 px-3 py-[6px] bg-primary rounded-md w-24 text-center font-semibold text-white my-6 ml-6">
                    Menu
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                    </svg>
                </a>
                <table class="w-full text-left text-sm text-slate-300 max-w-screen-lg">
                    <thead class="border-b text-sm border-neutral-600 bg-primary text-white">
                        <tr>
                            <th scope="col" class="p-4">No</th>
                            <th scope="col" class="p-4">Nama Menu</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-neutral-950 font-medium divide-slate-300 dark:divide-slate-700">
                        @foreach ($menus as $index => $menu)
                            <tr class="even:bg-primary  even:text-slate-50 even:font-medium">
                                <td class="p-4">{{ $index + 1 }}</td>
                                <td class="p-4">{{ $menu->nama_menu }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Submenu Table -->
            <div class="overflow-hidden w-full overflow-x-auto rounded-xl border border-slate-300 max-w-screen-lg ">
                <a href="{{ route('menu.index') }}"
                    class="flex gap-2 px-3 py-[6px] bg-primary rounded-md w-32 text-center font-semibold text-white my-6 ml-6">
                    Submenu
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                    </svg>
                </a>
                <table class="w-full text-left text-sm text-slate-300 max-w-screen-lg">
                    <thead class="border-b text-sm border-neutral-600 bg-primary text-white">
                        <tr>
                            <th scope="col" class="p-4">No</th>
                            <th scope="col" class="p-4">Nama Submenu</th>
                            <th scope="col" class="p-4">Nama dari Menu</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-neutral-950 font-medium divide-slate-300 dark:divide-slate-700">
                        @foreach ($submenus as $index => $submenu)
                            <tr class="even:bg-primary  even:text-slate-50 even:font-medium">
                                <td class="p-4">{{ $index + 1 }}</td>
                                <td class="p-4">{{ $submenu->nama_submenu }}</td>
                                <td class="p-4">{{ $submenu->menu->nama_menu }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Berita Section -->
    <section id="berita" class="my-10 mx-3">
        <div class="overflow-hidden w-full overflow-x-auto rounded-xl border border-slate-300 max-w-screen-2xl my-10 ">
            <a href="{{ route('berita.index') }}"
                class="flex gap-2 px-3 py-[6px] bg-primary rounded-md w-24 text-center font-semibold text-white my-6 ml-6">
                Berita
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                </svg>
            </a>
            <div class="grid grid-cols-3 gap-3 gap-y-6 ">
                @foreach ($beritas as $berita)
                    <div
                        class="relative flex w-full max-w-xs flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                        <div
                            class="relative mx-4 mt-4 overflow-hidden rounded-xl bg-red-gray-500 bg-clip-border text-white shadow-lg shadow-red-gray-500">
                            <img src="{{ $berita->gambar_berita }}" alt="news-image" loading="lazy"
                                class="w-full h-48 object-cover" />
                            <div
                                class="to-bg-black-10 absolute inset-0 size-full bg-gradient-to-r from-transparent via-transparent to-black/60">
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="mb-3 flex flex-col gap-3 justify-between">
                                <h5
                                    class="block font-nunito text-xl font-bold leading-snug tracking-normal text-red-900 antialiased line-clamp-2">
                                    {{ $berita->judul }}
                                </h5>
                                <div class="line-clamp-3">
                                    <p class="block font-nunito text-base leading-relaxed text-gray-700 antialiased ">
                                        {{ $berita->deskripsi_berita }}
                                    </p>
                                </div>
                                <div class="flex flex-col gap-6">
                                    <p class="text-base font-medium font-nunito text-primary_teks">
                                        Kategori : <span
                                            class="text-sm text-primary font-bold ">{{ $berita->kategori->nama_kategori }}</span>
                                    </p>
                                    <p class="text-base font-medium font-nunito text-primary_teks">
                                        Status : <span
                                            class="text-sm text-primary font-bold ">{{ $berita->status }}</span>
                                    </p>
                                    <p class="text-base font-medium font-nunito text-primary_teks">
                                        Waktu : <span class="text-base font-bold text-primary">{{ $berita->waktu }}</span>
                                    </p>
                                </div>
                                <div class="group mt-4 inline-flex flex-wrap items-center gap-3">
                                    <a href=""
                                        class="cursor-pointer rounded-full border border-red-700/5 bg-red-700/5 p-3 text-red-700 transition-colors hover:border-red-700/10 hover:bg-red-700/10 hover:!opacity-100 group-hover:opacity-70">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 32 32">
                                            <path fill="red"
                                                d="M30.94 15.66A16.69 16.69 0 0 0 16 5A16.69 16.69 0 0 0 1.06 15.66a1 1 0 0 0 0 .68A16.69 16.69 0 0 0 16 27a16.69 16.69 0 0 0 14.94-10.66a1 1 0 0 0 0-.68M16 25c-5.3 0-10.9-3.93-12.93-9C5.1 10.93 10.7 7 16 7s10.9 3.93 12.93 9C26.9 21.07 21.3 25 16 25" />
                                            <path fill="red"
                                                d="M16 10a6 6 0 1 0 6 6a6 6 0 0 0-6-6m0 10a4 4 0 1 1 4-4a4 4 0 0 1-4 4" />
                                        </svg>
                                    </a>
                                    <a href=""
                                        class="cursor-pointer rounded-full border border-red-700/5 bg-red-700/5 p-3 text-red-700 transition-colors hover:border-red-700/10 hover:bg-red-700/10 hover:!opacity-100 group-hover:opacity-70">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="red" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2">
                                                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                <path d="M18.375 2.625a2.121 2.121 0 1 1 3 3L12 15l-4 1l1-4Z" />
                                            </g>
                                        </svg>
                                    </a>
                                    <form action="" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button data-tooltip-target=""
                                            class="cursor-pointer rounded-full border border-red-700/5 bg-red-700/5 p-3  text-red-700 transition-colors hover:border-red-700/10 hover:bg-red-700/10 hover:!opacity-100 group-hover:opacity-70">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 15 15">
                                                <path fill="currentColor" fill-rule="evenodd"
                                                    d="M5.5 1a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zM3 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H11v8a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V4h-.5a.5.5 0 0 1-.5-.5M5 4h5v8H5z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
