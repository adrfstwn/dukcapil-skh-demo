@extends('master-admin')
@section('content')
<section id="profil-index">
    <div class="container">
        <div class="my-6">
            <button type="button" onclick="window.location='{{ route('profil.create') }}'"
                class="text-white bg-red-700 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Add Profil
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
                            Nama Profil
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi Profil
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gambar Profil
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profils as $profil)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            id="profil{{$profil->id}}">
                            <td class="w-4 p-4">
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $profil->nama }}
                            </th>
                            <td class="px-6 py-4">
                                {!! $profil->deskripsi_profil !!}
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $profil->gambar_profil) }}" alt="Profil Image"
                                    loading="lazy" class="w-70">
                            </td>

                            <td class="flex items-center px-6 py-4">
                                <a href="{{ route('profil.edit', ['id' => $profil->id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('profil.destroy', ['id' => $profil->id]) }}" method="POST"
                                    class="delete-button inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" data-id="{{$profil->id}}"
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
                if (confirm('Are you sure you want to delete this profile?')) {
                    const form = this.closest('form');
                    form.submit();
                    document.getElementById('' + id).remove();
                }
            });
        });
    });
</script>
@endsection
