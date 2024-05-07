@extends('master-admin')

@section('content')
    <section id="create-kontak">
        <div class="container">
            <div class="flex flex-col p-6 border-[1.5px] border-white shadow-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Create Contact</h2>
                    <p class="text-base text-secondary_teks">Add new contact information</p>
                </div>
                <form action="{{ route('kontak.store') }}" method="POST">
                    @csrf
                    <div class="my-2">
                        <label for="telp" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Telephone</label>
                        <input type="text" name="telp" id="telp"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ old('telp') }}" required>
                    </div>
                    <div class="my-2">
                        <label for="fax" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Fax</label>
                        <input type="text" name="fax" id="fax"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ old('fax') }}" required>
                    </div>
                    <div class="my-2">
                        <label for="wa_layan" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">WhatsApp</label>
                        <input type="text" name="wa_layan" id="wa_layan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ old('wa_layan') }}" required>
                    </div>
                    <div class="my-2">
                        <label for="email" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ old('email') }}" required>
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
