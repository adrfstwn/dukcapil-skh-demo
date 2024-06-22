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
                            <h2 class="mb-2 text-2xl font-bold text-gray-800">Verify Your Email Address</h2>
                            @if (session('message'))
                                <p>{{ session('message') }}</p>
                            @endif
                            <form action="{{ route('verification.send') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <br>
                                    <div class="flex">
                                        <button
                                            class="w-full px-4 py-2 font-bold text-white rounded-sm bg-primary focus:outline-none focus:shadow-outline"
                                            type="submit">
                                            Resend Verification Link
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

    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
</body>

</html>
