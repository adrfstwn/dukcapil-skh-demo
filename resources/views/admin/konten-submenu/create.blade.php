@extends('master-admin')
@section('content')
<section id="form-konten-submenu">
    <div class="container">
        <div class="flex flex-col p-6 border-[1.5px] border-white shadow-md backdrop-blur-md bg-slate-50 rounded-2xl shadow-gray-200">
            <div class="flex flex-col">
                <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Konten SubMenu Section</h2>
                <p class="text-base text-secondary_teks">Input for konten submenu section</p>
            </div>
            <form action="{{ route('konten.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="my-2">
                    <label for="submenu" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Submenu</label>
                    <select name="submenu_id" id="submenu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                        @foreach ($submenus as $submenu)
                            <option value="{{ $submenu->id }}">{{ $submenu->nama_submenu }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-2">
                    <label for="default-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Title Konten</label>
                    <input type="text" name="judul" id="default-input" placeholder="Title konten" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                </div>
                <div class="my-2">
                    <label for="message" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Description Konten (*Opsional)</label>
                    <textarea id="editor" name="deskripsi_konten" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="Write your thoughts here..."></textarea>
                </div>
                <div class="my-2">
                    <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white" for="file_input">Upload File (*Opsional)</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" name="file" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Any file type.</p>
                </div>
                <div class="my-2">
                    <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white" for="image_input">Upload Image (*Opsional)</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="image_input_help" name="gambar" id="image_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image_input_help">SVG, PNG, JPG or GIF (MAX. 144x144px).</p>
                </div>
                <div class="my-2">
                    <label for="date-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Publication time</label>
                    <input type="date" name="tanggal" id="date-input" placeholder="Date published" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                </div>
                <div id="url-container" class="my-4">
                    <label for="date-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Input URL (*Opsional)</label>
                    <div class="flex items-center gap-4 mb-2">
                        <input type="text" name="urls[0][nama_url]" placeholder="Nama URL" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                        <input type="url" name="urls[0][link_url]" placeholder="Link URL" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    </div>
                </div>
                <button type="button" onclick="addUrlField()" class="px-4 py-2 mt-2 text-sm font-bold text-white bg-blue-600 rounded-lg">Add More URL</button>
                <div class="my-2">
                    <label for="status-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Publication status</label>
                    <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
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

<script>
    let urlIndex = 1;

    function addUrlField() {
        const container = document.getElementById('url-container');
        const urlFields = `
            <div class="flex items-center gap-4 mb-2">
                <input type="text" name="urls[${urlIndex}][nama_url]" placeholder="Nama URL" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                <input type="url" name="urls[${urlIndex}][link_url]" placeholder="Link URL" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
            </div>
        `;
        container.insertAdjacentHTML('beforeend', urlFields);
        urlIndex++;
    }
</script>
@endsection
