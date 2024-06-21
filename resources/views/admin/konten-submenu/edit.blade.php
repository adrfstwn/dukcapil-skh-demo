@extends('master-admin')
@section('content')
    <section id="form-konten-submenu">
        <div class="container">
            <div class="flex flex-col p-6 border-[1.5px] border-white shadow-md backdrop-blur-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Edit Konten SubMenu Section</h2>
                    <p class="text-base text-secondary_teks">Edit konten submenu section</p>
                </div>
                <form action="{{ route('konten.update', $kontenSubMenu->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="my-2">
                        <label for="submenu" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Submenu</label>
                        <select name="submenu_id" id="submenu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            @foreach ($submenus as $submenu)
                                <option value="{{ $submenu->id }}" {{ $kontenSubMenu->submenu_id == $submenu->id ? 'selected' : '' }}>
                                    {{ $submenu->nama_submenu }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-2">
                        <label for="default-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Title Konten</label>
                        <input type="text" name="judul" id="default-input" placeholder="Title konten" value="{{ $kontenSubMenu->judul }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    </div>
                    <div class="my-2">
                        <label for="message" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Description Konten</label>
                        <textarea id="editor" name="deskripsi_konten" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="Write your thoughts here...">{{ $kontenSubMenu->deskripsi_konten }}</textarea>
                    </div>
                    <div class="my-2">
                        <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white" for="file_input">Upload File</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" name="file" id="file_input" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Any file type.</p>
                        @if ($kontenSubMenu->file)
                            <p class="my-2"><a href="{{ asset('storage/' . $kontenSubMenu->file) }}" target="_blank" class="text-blue-600">Current File</a></p>
                        @endif
                    </div>
                    <div class="my-2">
                        <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white" for="image_input">Upload Image</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="image_input_help" name="gambar" id="image_input" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image_input_help">SVG, PNG, JPG or GIF (MAX. 144x144px).</p>
                        @if ($kontenSubMenu->gambar)
                            <img src="{{ asset('storage/' . $kontenSubMenu->gambar) }}" alt="Current Image" class="my-2" style="max-width: 100px;">
                        @endif
                    </div>
                    <div class="my-2">
                        <label for="date-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Publication time</label>
                        <input type="date" name="tanggal" id="date-input" placeholder="Date published" value="{{ $kontenSubMenu->tanggal }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    </div>
                    <div class="my-2">
                        <label for="status-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Publication status</label>
                        <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            <option value="DRAFT" {{ $kontenSubMenu->status == 'DRAFT' ? 'selected' : '' }}>DRAFT</option>
                            <option value="PUBLISH" {{ $kontenSubMenu->status == 'PUBLISH' ? 'selected' : '' }}>PUBLISH</option>
                        </select>
                    </div>
                    <div class="my-2">
                        <label for="urls-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">URLs</label>
                        <div id="urls-container">
                            @foreach ($kontenSubMenu->urls as $url)
                                <div class="flex items-center mb-2 url-input" data-url-id="{{ $url->id }}">
                                    <input type="text" name="urls[{{ $url->id }}][nama_url]" value="{{ $url->nama_url }}" placeholder="URL Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-1/2 p-2.5 mr-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                                    <input type="text" name="urls[{{ $url->id }}][link_url]" value="{{ $url->link_url }}" placeholder="URL Link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                                    <button type="button" class="ml-2 text-red-600 remove-url">Remove</button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" id="add-url-button" class="mt-2 text-blue-600">Add URL (*Opsional)</button>
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
        document.addEventListener('DOMContentLoaded', function() {
            const addUrlButton = document.getElementById('add-url-button');
            const urlsContainer = document.getElementById('urls-container');
            let urlCount = {{ count($kontenSubMenu->urls) }};

            addUrlButton.addEventListener('click', function() {
                const newUrlDiv = document.createElement('div');
                newUrlDiv.classList.add('flex', 'items-center', 'mb-2');
                newUrlDiv.innerHTML = `
                    <input type="text" name="new_urls[${urlCount}][nama_url]" placeholder="URL Name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-1/2 p-2.5 mr-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    <input type="text" name="new_urls[${urlCount}][link_url]" placeholder="URL Link"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    <button type="button" class="ml-2 text-red-600 remove-url">Remove</button>
                `;
                urlsContainer.appendChild(newUrlDiv);
                urlCount++;
            });

            urlsContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-url')) {
                    const urlDiv = event.target.closest('.url-input');
                    if (urlDiv) {
                        const urlId = urlDiv.getAttribute('data-url-id');
                        if (urlId) {
                            // Create a hidden input to mark this URL for deletion upon form submission
                            const deleteInput = document.createElement('input');
                            deleteInput.type = 'hidden';
                            deleteInput.name = `delete_urls[]`;
                            deleteInput.value = urlId;
                            urlsContainer.appendChild(deleteInput);
                        }
                        urlDiv.remove();
                    }
                }
            });
        });
    </script>
@endsection
