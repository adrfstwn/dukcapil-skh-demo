@extends('master-admin')
@section('content')
    <section id="form-mitra">
        <div class="container">
            <div class="flex flex-col mt-20">
                <h2 class="py-4 text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Mitra Logo</h2>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                    file</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="file_input_help" id="file_input" type="file">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                    144x144px).</p>
            </div>

        </div>
    </section>
@endsection
