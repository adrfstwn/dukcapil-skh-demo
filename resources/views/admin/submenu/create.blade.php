@extends('master-admin')
@section('content')
    <section id="faq-create">
        <div class="container">
            <div class="flex flex-col p-6 border-[1.5px] border-white shadow-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Create Sub Menu</h2>
                    <p class="text-base text-secondary_teks">Input Sub Menu</p>
                </div>
                <form action="{{ route('submenu.store') }}" method="POST">
                    @csrf
                    <div class="my-2">
                        <label for="nama_submenu" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama Submenu</label>
                        <input type="text" name="nama_submenu" id="nama_submenu"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    </div>
                    <div class="my-2">
                        <label for="url"
                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">URL</label>
                        <input type="text" name="url" id="url"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    </div>
                    <div class="my-2">
                        <label for="menu_id"
                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Menu</label>
                        <select name="menu_id" id="menu_id"
                            class="menu-selector bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->nama_menu }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-2">
                        <label for="parent_id" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Parent
                            Submenu</label>
                        <select name="parent_id" id="parent_id"
                            class="parent-selector bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            <option value="">None</option>
                            @foreach ($submenus as $sub)
                                <option value="{{ $sub->id }}">{{ $sub->nama_submenu }}</option>
                            @endforeach
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

@push('scripts')
    <script>
        // Jika menu yang dipilih memiliki submenu yang terhubung, tampilkan opsi parent
// Jika tidak, sembunyikan opsi parent dan set nilai menjadi null
document.addEventListener('DOMContentLoaded', function() {
    const menuSelector = document.querySelector('.menu-selector');
    const parentSelector = document.querySelector('.parent-selector');

    menuSelector.addEventListener('change', function() {
        const selectedMenuId = menuSelector.value;
        const options = parentSelector.querySelectorAll('option');

        // Cek apakah menu yang dipilih memiliki submenu yang terhubung
        const submenuConnected = Array.from(options).some(option => option.value === selectedMenuId);

        if (submenuConnected) {
            // Semua opsi parent dihapus
            options.forEach(option => option.remove());

            // Tambahkan opsi parent yang sesuai dengan menu yang dipilih
            const newOption = document.createElement('option');
            newOption.value = selectedMenuId;
            newOption.textContent = 'None';
            parentSelector.appendChild(newOption);
            parentSelector.value = selectedMenuId;
            parentSelector.setAttribute('disabled', 'disabled');
        } else {
            // Hapus nilai yang dipilih dan aktifkan kembali opsi parent
            parentSelector.removeAttribute('disabled');

            // Hapus semua opsi parent
            options.forEach(option => option.remove());

            // Tambahkan opsi "None"
            const noneOption = document.createElement('option');
            noneOption.value = '';
            noneOption.textContent = 'None';
            parentSelector.appendChild(noneOption);
        }
    });
});

    </script>
@endpush
