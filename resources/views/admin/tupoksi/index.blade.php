@extends('master-admin')
@section('content')
    <section id="form-tupoksi">
        <div class="container">
            <div class="my-6">
                <button type="button" onclick="window.location='{{ route('tupoksi.create') }}'"
                    class="text-white bg-red-700 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Add Tupoksi
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
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Tupoksi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Tugaspokok
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi Tugaspokok
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Fungsi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi Fungsi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Visi & Misi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Visi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi Visi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Misi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi Misi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tupoksis as $index => $tupoksi)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="w-4 p-4">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $tupoksi->nama_tupoksi }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $tupoksi->nama_tugaspokok }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $tupoksi->deskripsi_tugaspokok }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $tupoksi->nama_fungsi }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $tupoksi->deskripsi_fungsi }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $tupoksi->nama_visimisi }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $tupoksi->nama_visi }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $tupoksi->deskripsi_visi }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $tupoksi->nama_misi }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $tupoksi->deskripsi_misi }}
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <a href="{{ route('tupoksi.edit', $tupoksi->id) }}"
                                    class="font-medium text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('tupoksi.destroy', $tupoksi->id) }}"
                                    method="POST" class="inline-block ms-3">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-red-600 hover:underline">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection