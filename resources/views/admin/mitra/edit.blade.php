@extends('master-admin')
@section('content')
    <section id="mitra-create">
        <div class="container">
            <div
                class="flex flex-col p-6 border-[1.5px] border-white shadow-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Edit mitra Section</h2>
                    <p class="text-base text-secondary_teks">Input for mitra section</p>
                </div>
                <form action="{{ route('mitra.update', ['id' => $mitra->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="my-2">
                    <label for="default-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Title
                        mitra</label>
                    <input type="text" name="nama" value="{{$mitra->nama}}" id="default-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                </div>
                <label name="" class="block mb-2 text-base font-medium text-gray-900 dark:text-white" for="file_input">Upload
                    file (*Kosongkan jika tidak diubah)</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="file_input_help" name="logo_mitra" id="file_input" type="file">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                    144x144px).</p>
                <div class="flex justify-end my-6">
                    <button type="submit"
                        class="w-24 px-4 py-2 text-base font-bold text-white bg-red-600 rounded-lg">Save</button>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
