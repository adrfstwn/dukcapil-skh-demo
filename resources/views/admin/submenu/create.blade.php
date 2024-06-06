<!-- resources/views/admin/submenu/create.blade.php -->

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
                        <label for="url" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">URL</label>
                        <input type="text" name="url" id="url"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    </div>
                    <div class="my-2">
                        <label for="menu_id" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Menu</label>
                        <select name="menu_id" id="menu_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            @foreach ($menu as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->nama_menu }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-2">
                        <label for="parent_id" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Parent Submenu</label>
                        <select name="parent_id" id="parent_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            <option value="">None</option>
                            @foreach ($submenu as $sub)
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
