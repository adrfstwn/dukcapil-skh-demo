@extends('master-admin')

@section('content')
    <section id="form-persyaratan">
        <div class="container">
            <div class="flex flex-col p-6 border-[1.5px] border-white shadow-md backdrop-blur-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Persyaratan Section</h2>
                    <p class="text-base text-secondary_teks">Input for requirements section</p>
                </div>
                <form action="{{ route('persyaratan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-2">
                        <label for="kategori_persyaratan" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Kategori Persyaratan</label>
                        <select name="kategori_id" id="kategori_persyaratan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            @foreach ($kategoriPersyaratan as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-2">
                        <label for="judul" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Judul Dokumen</label>
                        <input type="text" id="judul" name="judul" placeholder="Judul dokumen"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    </div>
                    <div class="my-2">
                        <label for="deskripsi_persyaratan" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Deskripsi Dokumen</label>
                        <textarea id="" name="deskripsi_persyaratan" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="Masukkan deskripsi di sini..."></textarea>
                    </div>
                    <div class="my-2">
                        <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white" for="file_input">Unggah Dokumen</label>
                        <input name="file" id="file_input" type="file"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">File bisa berupa gambar atau dokumen.</p>
                    </div>
                    <div class="my-2">
                        <label for="status" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Status Publikasi</label>
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
