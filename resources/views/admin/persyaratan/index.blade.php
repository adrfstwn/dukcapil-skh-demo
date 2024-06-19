@extends('master-admin')

@section('content')
    <section id="form-persyaratan">
        <div class="container">
            <div class="my-6">
                <button type="button" onclick="window.location='{{ route('persyaratan.create') }}'"
                    class="text-white bg-red-700 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Add item content
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
                                Judul Document
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi Document
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                File Document
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($persyaratans as $index => $persyaratan)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $persyaratan->judul }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $persyaratan->deskripsi_persyaratan }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $persyaratan->kategori->nama_kategori }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($persyaratan->file)
                                        <button onclick="openPreview('{{ asset('storage/' . $persyaratan->file) }}')"
                                            class="text-blue-600 hover:underline">Preview</button>
                                    @else
                                        <span>No File</span>
                                    @endif
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="{{ route('persyaratan.edit', $persyaratan->id) }}"
                                        class="font-medium text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('persyaratan.destroy', $persyaratan->id) }}"
                                        method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-medium text-red-600 hover:underline ms-3">Remove</button>
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
        function openPreview(url) {
            var newWindow = window.open('', '_blank');
            var iframe = document.createElement('iframe');
            iframe.src = url;
            iframe.width = '100%';
            iframe.height = '600px';
            newWindow.document.body.appendChild(iframe);
        }
    </script>
@endsection
