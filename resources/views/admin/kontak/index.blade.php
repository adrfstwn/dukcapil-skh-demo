@extends('master-admin')

@section('content')
    <section id="home-slider-index">
        <div class="container">
            <div class="my-6">

            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Telephone
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fax
                            </th>
                            <th scope="col" class="px-6 py-3">
                                WhatsApp
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kontaks as $kontak)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                </td>
                                <td class="px-6 py-4">
                                    {{ $kontak->telp }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $kontak->fax }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $kontak->wa_layan }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $kontak->email }}
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="{{ route('kontak.edit', ['id' => $kontak->id]) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
