<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
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
    <section id="profile">
        <div class="container">
            <div class="flex flex-col">
                <div class="py-6">
                    <h2 class="text-2xl font-bold font-monserrat ">Admin Information</h2>
                </div>
                <div class="flex flex-col mb-6 gap-14">
                    <div
                        class="flex flex-col p-6 md:w-[800px] bg-background_light rounded-2xl shadow-lg shadow-gray-300/20">
                        <h3 class="text-lg font-semibold font-nunito">Profil Information</h3>
                        <p class="text-base text-secondary_teks">Update yout account’s profile information and email
                            address</p>
                        <div class="py-6">
                            <form action="" class="relative flex flex-col w-full max-w-sm gap-4">
                                <input type="username" name="username" id="username" placeholder="ex@gmail.com"
                                    class="px-4 py-2 border-2 border-gray-400 rounded-md focus:outline-none">
                                <input type="email" name="email" id="email" placeholder="ex@gmail.com"
                                    class="px-4 py-2 border-2 border-gray-400 rounded-md focus:outline-none">
                                <input type="file" name="file" id="file"
                                    class="text-gray-600 file:absolute file:right-0 file:bg-primary file:text-white file:border-0 file:py-1 file:px-3 file:rounded-lg file:shadow-xl file:shadow-primary/30">
                                <button type="submit"
                                    class="w-24 px-4 py-2 text-base font-bold rounded-lg bg-primary text-background_light">Save</button>
                            </form>
                        </div>
                    </div>
                    <div
                        class="flex flex-col p-6 md:w-[800px] bg-background_light rounded-2xl shadow-lg shadow-gray-300/20">
                        <h3 class="text-lg font-semibold font-nunito">Profil Information</h3>
                        <p class="text-base text-secondary_teks">Update yout account’s profile information and email
                            address</p>
                        <div class="py-6">
                            <form action="" class="relative flex flex-col w-full max-w-sm gap-4">
                                <input type="username" name="username" id="username" placeholder="ex@gmail.com"
                                    class="px-4 py-2 border-2 border-gray-400 rounded-md focus:outline-none">
                                <input type="email" name="email" id="email" placeholder="ex@gmail.com"
                                    class="px-4 py-2 border-2 border-gray-400 rounded-md focus:outline-none">
                                <input type="file" name="file" id="file"
                                    class="text-gray-600 file:absolute file:right-0 file:bg-primary file:text-white file:border-0 file:py-1 file:px-3 file:rounded-lg file:shadow-xl file:shadow-primary/30">
                                <button type="submit"
                                    class="w-24 px-4 py-2 text-base font-bold rounded-lg bg-primary text-background_light">Save</button>
                            </form>
                        </div>
                    </div>
                    <div
                        class="flex flex-col p-6 md:w-[800px] bg-background_light rounded-2xl shadow-lg shadow-gray-300/20">
                        <h3 class="text-lg font-semibold font-nunito">Profil Information</h3>
                        <p class="text-base text-secondary_teks">Update yout account’s profile information and email
                            address</p>
                        <div class="py-6">
                            <form action="" class="relative flex flex-col w-full max-w-sm gap-4">
                                <input type="username" name="username" id="username" placeholder="ex@gmail.com"
                                    class="px-4 py-2 border-2 border-gray-400 rounded-md focus:outline-none">
                                <input type="email" name="email" id="email" placeholder="ex@gmail.com"
                                    class="px-4 py-2 border-2 border-gray-400 rounded-md focus:outline-none">
                                <input type="file" name="file" id="file"
                                    class="text-gray-600 file:absolute file:right-0 file:bg-primary file:text-white file:border-0 file:py-1 file:px-3 file:rounded-lg file:shadow-xl file:shadow-primary/30">
                                <button type="submit"
                                    class="w-24 px-4 py-2 text-base font-bold rounded-lg bg-primary text-background_light">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
