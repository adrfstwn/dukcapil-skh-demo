@extends('master-admin')

@section('content')
    <section id="home-slider-index">
        <div class="container">
            <div class="my-6">
                <button type="button"
                    onclick="window.location.href='{{ route('kontak.create') }}'"
                    class="text-white bg-red-700 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Add Contact
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
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" id="{{$kontak->id}}">
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
                                    <form action="{{ route('kontak.destroy', ['id' => $kontak->id]) }}"
                                        method="POST" class="delete-form inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-id="{{ $kontak->id }}"
                                            class="delete-button font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script>
           document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                const id = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this download?')) {
                    const form = this.closest('form');
                    form.submit();
                    document.getElementById('kontak' + id).remove();
                }
            });
        });
    });
    </script>
@endsection
