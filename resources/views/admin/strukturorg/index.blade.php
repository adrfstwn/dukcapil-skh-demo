@extends('master-admin')
@section('content')
<section id="form-strukturorg">
    <div class="container">
        <div class="my-6">
            <button type="button" onclick="window.location='{{ route('strukturorg.create') }}'"
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
                            File Document
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($strukturorgs as $index => $strukturorg)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" id="strukturorg{{$strukturorg->id}}">

                            <td class="w-4 p-4">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $strukturorg->judul }}
                            </td>
                            <td class="px-6 py-4">
                                <button onclick="openPreview('{{ asset('storage/' . $strukturorg->file) }}')"
                                    class="text-blue-600 hover:underline">Preview</button>
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <a href="{{ route('strukturorg.edit', $strukturorg->id) }}"
                                    class="font-medium text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('strukturorg.destroy', $strukturorg->id) }}" method="POST"
                                    class="delete-form inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" data-id="{{$strukturorg->id}}"
                                        class="delete-button font-medium text-red-600 hover:underline ms-3">Remove</button>
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
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                const id = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this download?')) {
                    const form = this.closest('form');
                    form.submit();
                    document.getElementById('download' + id).remove();
                }
            });
        });
    });
</script>
@endsection
