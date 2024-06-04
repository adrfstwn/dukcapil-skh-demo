@extends('master-admin')

@section('content')
    <section id="create-linksos">
        <div class="container">
            <div class="flex flex-col p-6 border-[1.5px] border-white shadow-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Create Linksos</h2>
                    <p class="text-base text-secondary_teks">Add new linksos information</p>
                </div>
                <form action="{{ route('linksos.store') }}" method="POST">
                    @csrf
                    <div class="my-2">
                        <label for="instagram" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Instagram</label>
                        <input type="text" name="nama_instagram" id="instagram"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                             required>
                    </div>
                    <div class="my-2">
                        <label for="instagram" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Link Instagram</label>
                        <input type="text" name="instagram" id="instagram"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                             required>
                    </div>
                    <div class="my-2">
                        <label for="facebook" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Facebook</label>
                        <input type="text" name="nama_facebook" id="facebook"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                             required>
                    </div>
                    <div class="my-2">
                        <label for="facebook" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Link Facebook</label>
                        <input type="text" name="facebook" id="facebook"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                             required>
                    </div>
                    <div class="my-2">
                        <label for="x" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">X</label>
                        <input type="text" name="nama_x" id="x"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                             required>
                    </div>
                    <div class="my-2">
                        <label for="x" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Link X</label>
                        <input type="text" name="x" id="x"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                             required>
                    </div>
                    <div class="my-2">
                        <label for="yt" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">YouTube</label>
                        <input type="text" name="nama_yt" id="yt"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                             required>
                    </div>
                    <div class="my-2">
                        <label for="yt" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Link YouTube</label>
                        <input type="text" name="yt" id="yt"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                             required>
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
