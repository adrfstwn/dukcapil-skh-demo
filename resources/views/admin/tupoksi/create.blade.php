@extends('master-admin')
@section('content')
    <section id="form-tupoksi">
        <div class="container">
            <div
                class="flex flex-col p-6 border-[1.5px] border-white shadow-md backdrop-blur-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Tupoksi Section</h2>
                    <p class="text-base text-secondary_teks">Input for tupoksi section</p>
                </div>
                <form action="{{ route('tupoksi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-2">
                        <label for="nama_tupoksi" class="block mb-2 text-base font-medium text-gray-900">Nama Tupoksi</label>
                        <input type="text" id="nama_tupoksi" name="nama_tupoksi" placeholder="Nama Tupoksi"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                    </div>
                    <div class="my-2">
                        <label for="nama_tugaspokok" class="block mb-2 text-base font-medium text-gray-900">Nama Tugaspokok</label>
                        <input type="text" id="nama_tugaspokok" name="nama_tugaspokok" placeholder="Nama Tugaspokok"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                    </div>
                    <div class="my-2">
                        <label for="deskripsi_tugaspokok" class="block mb-2 text-base font-medium text-gray-900">Deskripsi Tugaspokok</label>
                        <textarea id="deskripsi_tugaspokok" name="deskripsi_tugaspokok" rows="4"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary"
                                  placeholder="Deskripsi Tugaspokok"></textarea>
                    </div>
                    <div class="my-2">
                        <label for="nama_fungsi" class="block mb-2 text-base font-medium text-gray-900">Nama Fungsi</label>
                        <input type="text" id="nama_fungsi" name="nama_fungsi" placeholder="Nama Fungsi"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                    </div>
                    <div class="my-2">
                        <label for="deskripsi_fungsi" class="block mb-2 text-base font-medium text-gray-900">Deskripsi Fungsi</label>
                        <textarea id="deskripsi_fungsi" name="deskripsi_fungsi" rows="4"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary"
                                  placeholder="Deskripsi Fungsi"></textarea>
                    </div>
                    <div class="my-2">
                        <label for="nama_visimisi" class="block mb-2 text-base font-medium text-gray-900">Nama Visi & Misi</label>
                        <input type="text" id="nama_visimisi" name="nama_visimisi" placeholder="Nama Visi & Misi"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                    </div>
                    <div class="my-2">
                        <label for="nama_visi" class="block mb-2 text-base font-medium text-gray-900">Nama Visi</label>
                        <input type="text" id="nama_visi" name="nama_visi" placeholder="Nama Visi"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                    </div>
                    <div class="my-2">
                        <label for="deskripsi_visi" class="block mb-2 text-base font-medium text-gray-900">Deskripsi Visi</label>
                        <textarea id="deskripsi_visi" name="deskripsi_visi" rows="4"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary"
                                  placeholder="Deskripsi Visi"></textarea>
                    </div>
                    <div class="my-2">
                        <label for="nama_misi" class="block mb-2 text-base font-medium text-gray-900">Nama Misi</label>
                        <input type="text" id="nama_misi" name="nama_misi" placeholder="Nama Misi"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                    </div>
                    <div class="my-2">
                        <label for="deskripsi_misi" class="block mb-2 text-base font-medium text-gray-900">Deskripsi Misi</label>
                        <textarea id="deskripsi_misi" name="deskripsi_misi" rows="4"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary"
                                  placeholder="Deskripsi Misi"></textarea>
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
