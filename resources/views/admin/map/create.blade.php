@extends('master-admin')
@section('content')
    <section id="map-create">
        <div class="container">
            <div
                class="flex flex-col p-6 border-[1.5px] border-white shadow-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Create Map Section</h2>
                    <p class="text-base text-secondary_teks">Input for map section</p>
                </div>
                <form action="{{ route('map.store') }}" method="POST">
                    @csrf
                <div class="my-2">
                    <label for="alamat-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input type="text" name="alamat" id="alamat-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                </div>
                <div class="my-2">
                    <label for="link-map-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Link Map</label>
                    <input type="url" name="link_map" id="link-map-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
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
