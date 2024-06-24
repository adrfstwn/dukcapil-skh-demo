@extends('master-admin')

@section('content')
    <section id="Persyaratan">
        <div class="container">
            <div class="my-6">
                <button type="button" onclick="window.location.href='{{ route('persyaratan.create') }}'"
                    class="text-white bg-red-700 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Add Persyaratan
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </button>
            </div>
            <div class="grid grid-cols-4 gap-3 gap-y-6">
                @foreach ($persyaratans as $persyaratan)
                    <div class="relative flex w-full max-w-xs flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg" id="persyaratan{{$persyaratan->id}}">
                        <div class="p-6">
                            <div class="mb-3 flex flex-col gap-3 justify-between">
                                <h5 class="block font-nunito text-xl font-bold leading-snug tracking-normal text-red-900 antialiased line-clamp-2">
                                    {{ $persyaratan->judul }}
                                </h5>
                                <p class="block font-nunito text-base leading-relaxed text-gray-700 antialiased line-clamp-2">
                                    {!! Illuminate\Support\Str::limit($persyaratan->deskripsi_persyaratan, 50) !!}
                                </p>
                                <div class="flex flex-col gap-6">
                                    <p class="text-base font-medium font-nunito text-primary_teks">
                                        Kategori : <span class="text-sm text-primary font-bold">{{ $persyaratan->kategori->nama_kategori }}</span>
                                    </p>
                                    <p class="text-base font-medium font-nunito text-primary_teks">
                                        Status : <span class="text-sm text-primary font-bold">{{ $persyaratan->status }}</span>
                                    </p>
                                </div>
                                <div class="group mt-4 inline-flex flex-wrap items-center gap-3">
                                    @if ($persyaratan->file)
                                        <a href="{{ asset('storage/' . $persyaratan->file) }}" target="_blank"
                                            class="cursor-pointer rounded-full border border-red-700/5 bg-red-700/5 p-3 text-red-700 transition-colors hover:border-red-700/10 hover:bg-red-700/10 hover:!opacity-100 group-hover:opacity-70">
                                            Preview File
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path fill="red" d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4v2H5v14h14V9h2v10a2 2 0 0 1-2 2zm-9-4h2v-2H9v2zm-2-3h2v-2H7v2zm0-3h2v-2H7v2zm4 3h2v-2h-2v2zm0-3h2V7h-2v2zm4 3h2v-2h-2v2zm0-3h2V7h-2v2z" />
                                            </svg>
                                        </a>
                                    @else
                                        <span>No Preview Available</span>
                                    @endif
                                    <a href="{{ route('persyaratan.edit', $persyaratan->id) }}" data-tooltip-target="edit"
                                        class="cursor-pointer rounded-full border border-red-700/5 bg-red-700/5 p-3 text-red-700 transition-colors hover:border-red-700/10 hover:bg-red-700/10 hover:!opacity-100 group-hover:opacity-70">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="red" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2">
                                                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                <path d="M18.375 2.625a2.121 2.121 0 1 1 3 3L12 15l-4 1l1-4Z" />
                                            </g>
                                        </svg>
                                    </a>
                                    <form action="{{ route('persyaratan.destroy', $persyaratan->id) }}" method="POST"
                                        class="delete-form inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button data-tooltip-target="" type="button"
                                            class="delete-button cursor-pointer rounded-full border border-red-700/5 bg-red-700/5 p-3 text-red-700 transition-colors hover:border-red-700/10 hover:bg-red-700/10 hover:!opacity-100 group-hover:opacity-70">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 16 16">
                                                <path fill="red" fill-rule="evenodd"
                                                    d="M5.75 3V1.5h4.5V3zm-1.5 0V1a1 1 0 0 1 1-1h5.5a1 1 0 0 1 1 1v2h2.5a.75.75 0 0 1 0 1.5h-.365l-.743 9.653A2 2 0 0 1 11.148 16H4.852a2 2 0 0 1-1.994-1.847L2.115 4.5H1.75a.75.75 0 0 1 0-1.5zm-.63 1.5h8.76l-.734 9.538a.5.5 0 0 1-.498.462H4.852a.5.5 0 0 1-.498-.462z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>
          document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                const id = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this download?')) {
                    const form = this.closest('form');
                    form.submit();
                    document.getElementById('download' + id).remove();
                }
            });
        });
    });
    </script>
@endsection
