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
    <section id="register" class=""
        style=" background-image: url(../dist/assets/image/bg-auth.svg);
    background-size: cover;
    height: auto;">
        <div class="container">
            <div class="flex flex-col py-20">
                <div class="flex mx-auto">
                    <img src="../dist/assets/image/Logo-header.png" alt="Logo Skh" width="150px" class="">
                </div>
                <div class=" p-6 ">
                    <div class=" bg-white rounded-lg overflow-hidden shadow-lg mx-auto max-w-screen-sm">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang</h2>
                            <p class="text-gray-700 mb-6">Silakan isi filed ini sesuai data anda</p>
                            <form class="mt-6">
                                <div class="mb-4">
                                    <label class="block text-primary_teks font-bold mb-2" for="username">
                                        Username
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="username" type="text" placeholder="Username" name="name">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-primary_teks font-bold mb-2" for="email">
                                        Email
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="username" type="text" placeholder="Username" name="email">
                                </div>
                                <div class="mb-6">
                                    <label class="block text-gray-700 font-bold mb-2" for="password">
                                        Password
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="password" type="password" placeholder="Password" name="password">
                                </div>
                                <div class="mb-6">
                                    <label class="block text-gray-700 font-bold mb-2" for="verify-password">
                                        Confirm Password
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="password" type="password" placeholder="Password" name="password">
                                </div>
                                <div class="flex flex-col gap-4 justify-between">
                                    <div class="flex">
                                        <button
                                            class="bg-primary w-full rounded-sm text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline"
                                            type="button">
                                            Register
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
