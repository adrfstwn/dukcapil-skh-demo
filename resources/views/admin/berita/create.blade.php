@extends('master-admin')
@section('content')
    <section id="form-berita">
        <div class="container">
            <div
                class="flex flex-col p-6 border-[1.5px] border-white shadow-md backdrop-blur-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">News Section</h2>
                    <p class="text-base text-secondary_teks">Input for news section</p>
                </div>
                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-2">
                        <label for="kategori_berita"
                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Kategori Berita</label>
                        <select name="kategori_id" id="kategori_berita"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            @foreach ($kategoriBerita as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-2">
                        <label for="default-input"
                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Title
                            news slider</label>
                        <input type="text" name="judul" id="default-input" placeholder="Title news"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    </div>
                    <div class="my-2">
                        <label for="message"
                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Description
                            news</label>
                        <textarea id="editor" name="deskripsi_berita" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="Write your thoughts here..."></textarea>
                    </div>
                    <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        file</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" name="gambar_berita" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                        144x144px).</p>
                        <div class="my-2">
                            <label for="date-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Publication time</label>
                            <input type="date" name="waktu" id="date-input" placeholder="Date published"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
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
                        <button type="submit"
                            class="w-24 px-4 py-2 text-base font-bold text-white bg-red-600 rounded-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
