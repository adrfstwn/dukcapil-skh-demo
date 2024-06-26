@extends('master-admin')
@section('content')
    <section id="home-slider-edit">
        <div class="container">
            <div class="flex flex-col p-6 border-[1.5px] border-white shadow-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Edit Hero Section</h2>
                    <p class="text-base text-secondary_teks">Input for the slider in the hero section</p>
                </div>
                <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="my-2">
                        <label for="default-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                            Nama</label>
                        <input type="text" id="judul" name="name" value="{{ $user->name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                    </div>
                    <div class="my-2">
                        <label for="default-input"
                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Email
                        </label>
                        <input type="text" id="deskripsi" name="email" value="{{ $user->email }}"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
    style="@if($user->email) background-color: #f4f4f4; color: #666666; cursor: not-allowed; @endif"
    readonly>
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
                            class="w-24 px-4 py-2 text-base font-bold text-white bg-red-600 rounded-lg">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
