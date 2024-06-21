@extends('master-admin')
@section('content')
    <section id="form-berita">
        <div class="container">
            <div class="flex flex-col p-6 border-[1.5px] border-white shadow-md backdrop-blur-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">News Section</h2>
                    <p class="text-base text-secondary_teks">Input for news section</p>
                </div>
                <form action="{{ route('berita.update', ['id' => $berita->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="my-2">
                        <label for="kategori_berita" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Kategori Berita</label>
                        <select name="kategori_id" id="kategori_berita" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            @foreach ($kategoriBerita as $kategori)
                                <option value="{{ $kategori->id }}" {{ $kategori->id == $berita->kategori_id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-2">
                        <label for="default-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Title news slider</label>
                        <input type="text" id="default-input" name="judul" placeholder="Title news" value="{{ $berita->judul }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    </div>
                    <div class="my-2">
                        <label for="message" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Description news</label>
                        <textarea id="editor" name="deskripsi_berita" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="Write your thoughts here...">{{ $berita->deskripsi_berita }}</textarea>
                    </div>
                    <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white" for="file_input">Upload file (*Kosongkan jika tidak diubah)</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="gambar_berita">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 144x144px).</p>
                    <div class="my-2">
                        <label for="default-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Publication time</label>
                        <input type="datetime" id="default-input" name="waktu" placeholder="Date published" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{ $berita->waktu}}">
                    </div>
                    <div class="my-2">
                        <label for="status_berita" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Status Berita</label>
                        <select name="status" id="status_berita" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            <option value="DRAFT" {{ $berita->status == 'DRAFT' ? 'selected' : '' }}>DRAFT</option>
                            <option value="PUBLISH" {{ $berita->status == 'PUBLISH' ? 'selected' : '' }}>PUBLISH</option>
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
                        <button type="submit" class="w-24 px-4 py-2 text-base font-bold text-white bg-red-600 rounded-lg">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
