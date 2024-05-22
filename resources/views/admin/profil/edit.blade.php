@extends('master-admin')
@section('content')
    <section id="form-profil">
        <div class="container">
            <div class="flex flex-col p-6 border-[1.5px] border-white shadow-md backdrop-blur-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Profile Section</h2>
                    <p class="text-base text-secondary_teks">Input for profile section</p>
                </div>
                <form action="{{ route('profil.update', ['id' => $profil->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="my-2">
                        <label for="name" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" id="name" name="name" placeholder="Name" value="{{ $profil->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    </div>
                    <div class="my-2">
                        <label for="email" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" value="{{ $profil->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    </div>
                    <div class="my-2">
                        <label for="phone_number" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" placeholder="Phone Number" value="{{ $profil->phone_number }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    </div>
                    <div class="my-2">
                        <label for="address" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Address</label>
                        <textarea id="address" name="address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="Address...">{{ $profil->address }}</textarea>
                    </div>
                    <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white" for="file_input">Upload Profile Picture (*Kosongkan jika tidak diubah)</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="profile_picture">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF.</p>
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
                        <button type="submit" class="w-24 px-4 py-2 text-base font-bold text-white bg-red-600 rounded-lg">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

