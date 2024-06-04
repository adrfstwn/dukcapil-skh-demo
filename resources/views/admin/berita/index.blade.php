@extends('master-admin')
@section('content')
    <section id="Berita">
        <div class="container">
            <div class="my-6">
                <button type="button"
                    class="text-white bg-red-700 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Add Kategori Berita
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </button>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Kategori Berita
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <a href=""
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</button>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section id="Berita">
        <div class="container">
            <div class="my-6">
                <button type="button"
                    class="text-white bg-red-700 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Add Berita
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </button>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Judul Berita
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi Berita
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori Berita
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gambar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            </th>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">
                                <img src="" alt="Detail Persyaratan Image" class="w-70">
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <a href=""
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</button>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section id="berita-card">
        <div class="container">
            <div class="grid md:grid-cols-4 gap-4 justify-between my-10">
                <div
                    class="relative flex w-full max-w-xs flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                    <div
                        class="relative mx-4 mt-4 overflow-hidden rounded-xl bg-red-gray-500 bg-clip-border text-white shadow-lg shadow-red-gray-500">
                        <img src="dist/assets/image/Karyawan.jpg" alt="news-image" class="" />
                        <div
                            class="to-bg-black-10 absolute inset-0 size-full bg-gradient-to-r from-transparent via-transparent to-black/60">
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="mb-3 flex flex-col gap-3 justify-between">
                            <h5
                                class="block font-nunito text-xl font-bold leading-snug tracking-normal text-red-900 antialiased line-clamp-2">
                                Berita
                                Terbaru</h5>
                            <p class="block font-nunito text-base leading-relaxed text-gray-700 antialiased line-clamp-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, minima.
                            </p>
                            <div class="flex flex-col gap-6">
                                <p class="text-base font-medium font-nunito text-primary_teks">
                                    Kategori : <span class="text-base bg-primary text-white rounded-md p-2">Terbaru</span>
                                </p>
                                <p class="text-base font-medium font-nunito text-primary_teks">
                                    Waktu : <span class="text-base font-medium">12 mei 2024</span>
                                </p>
                            </div>
                            <div class="group mt-4 inline-flex flex-wrap items-center gap-3">
                                <span data-tooltip-target="eyes"
                                    class="cursor-pointer rounded-full border border-red-700/5 bg-red-700/5 p-3 text-red-700 transition-colors hover:border-red-700/10 hover:bg-red-700/10 hover:!opacity-100 group-hover:opacity-70">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 32 32">
                                        <path fill="red"
                                            d="M30.94 15.66A16.69 16.69 0 0 0 16 5A16.69 16.69 0 0 0 1.06 15.66a1 1 0 0 0 0 .68A16.69 16.69 0 0 0 16 27a16.69 16.69 0 0 0 14.94-10.66a1 1 0 0 0 0-.68M16 25c-5.3 0-10.9-3.93-12.93-9C5.1 10.93 10.7 7 16 7s10.9 3.93 12.93 9C26.9 21.07 21.3 25 16 25" />
                                        <path fill="red"
                                            d="M16 10a6 6 0 1 0 6 6a6 6 0 0 0-6-6m0 10a4 4 0 1 1 4-4a4 4 0 0 1-4 4" />
                                    </svg>
                                </span>
                                <span data-tooltip-target="edit"
                                    class="cursor-pointer rounded-full border border-red-700/5 bg-red-700/5 p-3 text-red-700 transition-colors hover:border-red-700/10 hover:bg-red-700/10 hover:!opacity-100 group-hover:opacity-70">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24">
                                        <g fill="none" stroke="red" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2">
                                            <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                            <path d="M18.375 2.625a2.121 2.121 0 1 1 3 3L12 15l-4 1l1-4Z" />
                                        </g>
                                    </svg>
                                </span>
                                <span data-tooltip-target="bedrooms"
                                    class="cursor-pointer rounded-full border border-red-700/5 bg-red-700/5 p-3 text-red-700 transition-colors hover:border-red-700/10 hover:bg-red-700/10 hover:!opacity-100 group-hover:opacity-70">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 16 16">
                                        <path fill="red" fill-rule="evenodd"
                                            d="M5.75 3V1.5h4.5V3zm-1.5 0V1a1 1 0 0 1 1-1h5.5a1 1 0 0 1 1 1v2h2.5a.75.75 0 0 1 0 1.5h-.365l-.743 9.653A2 2 0 0 1 11.148 16H4.852a2 2 0 0 1-1.994-1.847L2.115 4.5H1.75a.75.75 0 0 1 0-1.5zm-.63 1.5h8.76l-.734 9.538a.5.5 0 0 1-.498.462H4.852a.5.5 0 0 1-.498-.462z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
