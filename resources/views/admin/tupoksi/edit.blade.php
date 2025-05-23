@extends('master-admin')
@section('content')
    <section id="tupoksi-edit">
        <div class="container">
            <div
                class="flex flex-col p-6 border-[1.5px] border-white shadow-md backdrop-blur-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Edit Tupoksi</h2>
                    <p class="text-base text-secondary_teks">Edit Tupoksi section</p>
                </div>
                <form action="{{ route('tupoksi.update', $tupoksi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="my-2">
                        <label for="deskripsi_tugaspokok" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Deskripsi Tugas Pokok</label>
                        <textarea id="deskripsi_tugaspokok" name="deskripsi_tugaspokok" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="Deskripsi Tugaspokok">{{ $tupoksi->deskripsi_tugaspokok }}</textarea>
                    </div>
                    <div class="my-2">
                        <label for="deskripsi_fungsi" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Deskripsi Fungsi</label>
                        <textarea id="deskripsi_fungsi" name="deskripsi_fungsi" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="Deskripsi Fungsi">{{ $tupoksi->deskripsi_fungsi }}</textarea>
                    </div>
                    <div class="my-2">
                        <label for="deskripsi_visi" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Deskripsi Visi</label>
                        <textarea id="deskripsi_visi" name="deskripsi_visi" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="Deskripsi Visi">{{ $tupoksi->deskripsi_visi }}</textarea>
                    </div>
                    <div class="my-2">
                        <label for="deskripsi_misi" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Deskripsi Misi</label>
                        <textarea id="deskripsi_misi" name="deskripsi_misi" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="Deskripsi Misi">{{ $tupoksi->deskripsi_misi }}</textarea>
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
