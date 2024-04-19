<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUKCAPIL | SKH</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/x-icon" href="dist/assets/image/Logo-KAB-SKH.png">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <!-- Library Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <!-- Slider Splide JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
</head>

<body>
    <section id="login" class=""
        style=" background-image: url(./dist/assets/image/bg-auth.svg);
    background-size: cover;
    height: auto;">
        <div class="container">
            <div class="flex flex-col py-20">
                <div class="flex mx-auto">
                    <img src="./dist/assets/image/Logo-header.png" alt="Logo Skh" width="150px" class="">
                </div>
                <div class=" p-6 ">
                    <div class=" bg-white rounded-lg overflow-hidden shadow-lg mx-auto max-w-screen-sm">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang Kembali!</h2>
                            <p class="text-gray-700 mb-6">Silakan masuk ke akun Anda</p>
                            <form class="mt-6">
                                <div class="mb-4">
                                    <label class="block text-primary_teks font-bold mb-2" for="username">
                                        Email
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="username" type="text" placeholder="Username">
                                </div>
                                <div class="mb-6">
                                    <label class="block text-gray-700 font-bold mb-2" for="password">
                                        Password
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="password" type="password" placeholder="Password">
                                </div>
                                <div class="flex flex-col gap-4 justify-between">
                                    <div class="flex justify-end">
                                        <!-- component -->

                                        <div x-data="{ modelOpen: false }">
                                            <button @click="modelOpen =!modelOpen"
                                                class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                <span>Invite Member</span>
                                            </button>

                                            <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                <div
                                                    class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                                        x-transition:enter="transition ease-out duration-300 transform"
                                                        x-transition:enter-start="opacity-0"
                                                        x-transition:enter-end="opacity-100"
                                                        x-transition:leave="transition ease-in duration-200 transform"
                                                        x-transition:leave-start="opacity-100"
                                                        x-transition:leave-end="opacity-0"
                                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
                                                        aria-hidden="true"></div>

                                                    <div x-cloak x-show="modelOpen"
                                                        x-transition:enter="transition ease-out duration-300 transform"
                                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave="transition ease-in duration-200 transform"
                                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                                                        <div class="flex items-center justify-between space-x-4">
                                                            <h1 class="text-xl font-medium text-gray-800 ">Invite team
                                                                memebr</h1>

                                                            <button @click="modelOpen = false"
                                                                class="text-gray-600 focus:outline-none hover:text-gray-700">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <p class="mt-2 text-sm text-gray-500 ">
                                                            Add your teammate to your team and start work to get things
                                                            done
                                                        </p>

                                                        <form class="mt-5">
                                                            <div>
                                                                <label for="user name"
                                                                    class="block text-sm text-gray-700 capitalize dark:text-gray-200">Teammate
                                                                    name</label>
                                                                <input placeholder="Arthur Melo" type="text"
                                                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                                            </div>

                                                            <div class="mt-4">
                                                                <label for="email"
                                                                    class="block text-sm text-gray-700 capitalize dark:text-gray-200">Teammate
                                                                    email</label>
                                                                <input placeholder="arthurmelo@example.app"
                                                                    type="email"
                                                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                                            </div>

                                                            <div class="mt-4">
                                                                <h1
                                                                    class="text-xs font-medium text-gray-400 uppercase">
                                                                    Permissions</h1>

                                                                <div class="mt-4 space-y-5">
                                                                    <div class="flex items-center space-x-3 cursor-pointer"
                                                                        x-data="{ show: true }" @click="show =!show">
                                                                        <div class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                                                                            :class="[show ? 'bg-indigo-500' : 'bg-gray-300']">
                                                                            <label for="show" @click="show =!show"
                                                                                class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                                                                :class="[show ?
                                                                                    'translate-x-full border-indigo-500' :
                                                                                    'translate-x-0 border-gray-300'
                                                                                ]"></label>
                                                                            <input type="checkbox" name="show"
                                                                                class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none" />
                                                                        </div>

                                                                        <p class="text-gray-500">Can make task</p>
                                                                    </div>

                                                                    <div class="flex items-center space-x-3 cursor-pointer"
                                                                        x-data="{ show: false }" @click="show =!show">
                                                                        <div class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                                                                            :class="[show ? 'bg-indigo-500' : 'bg-gray-300']">
                                                                            <label for="show" @click="show =!show"
                                                                                class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                                                                :class="[show ?
                                                                                    'translate-x-full border-indigo-500' :
                                                                                    'translate-x-0 border-gray-300'
                                                                                ]"></label>
                                                                            <input type="checkbox" name="show"
                                                                                class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none" />
                                                                        </div>

                                                                        <p class="text-gray-500">Can delete task</p>
                                                                    </div>

                                                                    <div class="flex items-center space-x-3 cursor-pointer"
                                                                        x-data="{ show: true }" @click="show =!show">
                                                                        <div class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                                                                            :class="[show ? 'bg-indigo-500' : 'bg-gray-300']">
                                                                            <label for="show" @click="show =!show"
                                                                                class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                                                                :class="[show ?
                                                                                    'translate-x-full border-indigo-500' :
                                                                                    'translate-x-0 border-gray-300'
                                                                                ]"></label>
                                                                            <input type="checkbox" name="show"
                                                                                class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none" />
                                                                        </div>

                                                                        <p class="text-gray-500">Can edit task</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="flex justify-end mt-6">
                                                                <button type="button"
                                                                    class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                                                    Invite Member
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button
                                            class="bg-primary w-full rounded-sm text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline"
                                            type="button">
                                            Sign In
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </section>
    {{-- script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#splide1', {
                type: 'loop',
                drag: 'free',
                autoStart: true,
                pauseOnHover: true,
                focus: 'center',
                pagination: false,
                arrows: false,
                perPage: 4,
                autoScroll: {
                    speed: 4,
                },
            }).mount();

            new Splide('#splide2', {
                type: 'loop',
                drag: 'free',
                autoStart: true,
                pauseOnHover: true,
                focus: 'center',
                pagination: false,
                arrows: false,
                perPage: 7,
                autoScroll: {
                    speed: 4,
                },
            }).mount();
        });
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
</body>

</html>
