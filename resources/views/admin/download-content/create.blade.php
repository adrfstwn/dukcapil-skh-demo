@extends('master-admin')

@section('content')
    <section id="form-download">
        <div class="container">
            <div class="flex flex-col p-6 border-[1.5px] border-white shadow-md backdrop-blur-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Download Section</h2>
                    <p class="text-base text-secondary_teks">Input for download section</p>
                </div>
                <form action="{{ route('download.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-2">
                        <label for="kategori_download" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Kategori Download</label>
                        <select name="kategori_id" id="kategori_download" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            @foreach ($kategoriDownloads as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-2">
                        <label for="judul" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Title Document</label>
                        <input type="text" id="judul" name="judul" placeholder="Title document"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    </div>
                    <div class="my-2">
                        <label for="deskripsi_download" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Description Document</label>
                        <textarea id="" name="deskripsi_download" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="Write your description here..."></textarea>
                    </div>
                    <div class="my-2">
                        <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white" for="file_input">Upload Document</label>
                        <input name="file" id="file_input" type="file"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">File Bisa Gambar atau Document.</p>
                    </div>
                    <div class="my-2">
                        <label for="status-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Publication status</label>
                        <select name="status" id="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            <option value="DRAFT">DRAFT</option>
                            <option value="PUBLISH">PUBLISH</option>
                        </select>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="flex justify-end my-6">
                        <button type="submit" class="w-24 px-4 py-2 text-base font-bold text-white bg-red-600 rounded-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
