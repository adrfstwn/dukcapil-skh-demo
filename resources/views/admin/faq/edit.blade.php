@extends('master-admin')
@section('content')
    <section id="faq-create">
        <div class="container">
            <div class="flex flex-col p-6 border-[1.5px] border-white shadow-md bg-slate-50 rounded-2xl shadow-gray-200">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold md:text-3xl font-monserrats text-primary_teks">Edit FAQ Section</h2>
                    <p class="text-base text-secondary_teks">Input for the FAQ section</p>
                </div>
                <div class="my-2">
                    <label for="default-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Title
                        faq</label>
                    <input type="text" id="default-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                </div>
                <div class="my-2">
                    <label for="default-input" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Answer
                        Faq</label>
                    <input type="text" id="default-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                </div>
                <div class="flex justify-end my-6">
                    <button type="submit"
                        class="w-24 px-4 py-2 text-base font-bold text-white bg-red-600 rounded-lg">Save</button>
                </div>
            </div>
        </div>
    </section>
@endsection
