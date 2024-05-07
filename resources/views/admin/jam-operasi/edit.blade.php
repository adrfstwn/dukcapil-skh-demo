@extends('master-admin')

@section('content')
    <section id="edit-jam">
        <div class="container">
            <div class="flex flex-col p-6 border-[1.5px] border-white shadow-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Edit Jam</h2>
                    <p class="text-base text-secondary_teks">Update jam information</p>
                </div>
                <form action="{{ route('jam.update', ['id' => $jam->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="my-2">
                        <label for="weekday" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Weekday</label>
                        <input type="text" name="weekday" id="weekday"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ $jam->weekday }}" required>
                    </div>
                    <div class="my-2">
                        <label for="jumat" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Jumat</label>
                        <input type="text" name="jumat" id="jumat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ $jam->jumat }}" required>
                    </div>
                    <div class="my-2">
                        <label for="sabtu" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Sabtu</label>
                        <input type="text" name="sabtu" id="sabtu"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ $jam->sabtu }}" required>
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
