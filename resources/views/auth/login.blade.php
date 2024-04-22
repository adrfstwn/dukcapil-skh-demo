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
                <div class="p-6 ">
                    <div class="max-w-screen-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg ">
                        <div class="p-6">
                            <h2 class="mb-2 text-2xl font-bold text-gray-800">Selamat Datang Kembali!</h2>
                            <p class="mb-6 text-gray-700">Silakan masuk ke akun Anda</p>
                            <form class="mt-6">
                                <div class="mb-4">
                                    <label class="block mb-2 font-bold text-primary_teks" for="username">
                                        Email
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="username" type="text" placeholder="Username">
                                </div>
                                <div class="mb-6">
                                    <label class="block mb-2 font-bold text-gray-700" for="password">
                                        Password
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="password" type="password" placeholder="Password">
                                </div>
                                <div class="flex flex-col justify-between gap-4">
                                    <div class="flex justify-end">
                                        <!-- component -->
                                        <div x-data="{ modalIsOpen: false }">
                                            <button @click="modalIsOpen = true" type="button"
                                                class="px-4 py-2 font-bold tracking-wide text-center text-red-600 transition cursor-pointer text-bas whitespace-nowrap rounded-xl">Forgot
                                                Password?</button>
                                            <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms
                                                x-trap.inert.noscroll="modalIsOpen"
                                                @keydown.esc.window="modalIsOpen = false"
                                                @click.self="modalIsOpen = false"
                                                class="fixed inset-0 z-30 flex items-end justify-center p-4 pb-8 bg-black/20 backdrop-blur-md sm:items-center lg:p-8"
                                                role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
                                                <!-- Modal Dialog -->
                                                <div x-show="modalIsOpen"
                                                    x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                                                    x-transition:enter-start="opacity-0 scale-50"
                                                    x-transition:enter-end="opacity-100 scale-100"
                                                    class="flex flex-col max-w-lg gap-4 overflow-hidden bg-white border rounded-xl border-slate-300 ">
                                                    <!-- Dialog Header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 border-b border-slate-300 bg-slate-100/60 ">
                                                        <h3 id="defaultModalTitle"
                                                            class="font-semibold tracking-wide text-primary_teks">
                                                            Forgot Password</h3>
                                                        <button @click="modalIsOpen = false" aria-label="close modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                aria-hidden="true" stroke="currentColor" fill="none"
                                                                stroke-width="1.4" class="w-5 h-5">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <!-- Dialog Body -->
                                                    <div class="flex flex-col gap-4 px-4 py-4 ">
                                                        <p>Forgot your password? No problem. Just lets us now your email
                                                            address and we will emailyou a password reset link that will
                                                            allow you to choose new one</p>
                                                        <div class="mb-4">
                                                            <input
                                                                class="w-full px-4 py-3 text-gray-700 border rounded-md appearance-none lea6ding-tight focus:outline-none focus:shadow-outline"
                                                                id="forgotpassword" type="text" placeholder="ex@gmail.com">
                                                        </div>
                                                    </div>
                                                    <!-- Dialog Footer -->
                                                    <div
                                                        class="flex flex-col-reverse justify-between gap-2 p-4 border-t border-slate-300 bg-slate-100/60 sm:flex-row sm:items-center md:justify-end">
                                                        <button @click="modalIsOpen = false" type="button"
                                                            class="px-4 py-2 text-sm font-medium tracking-wide text-center transition cursor-pointer bg-primary whitespace-nowrap rounded-xl text-slate-100 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-700 active:opacity-100 active:outline-offset-0">Email
                                                            password reset link</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <button
                                            class="w-full px-4 py-2 font-bold text-white rounded-sm bg-primary focus:outline-none focus:shadow-outline"
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
