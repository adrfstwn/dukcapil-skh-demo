


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
        style=" background-image: url(./dist/assets/image/bg-auth.svghttps://i.postimg.cc/jDCxP34x/bg-auth.jpg);
    background-size: cover;
    height: auto;">
        <div class="container">
            <div class="flex flex-col py-20">
                <div class="flex mx-auto">
                    <img src="https://i.postimg.cc/QK9cKdPs/Logo-header.png" alt="Logo Skh" width="150px" class="">
                </div>
                <div class="p-6 ">
                    <div class="max-w-screen-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg ">
                        <div class="p-6">
                            <h2 class="mb-2 text-2xl font-bold text-gray-800">Update Password</h2>
                            <p class="mb-6 text-gray-700">Silahkan isikan update password anda!</p>
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="email" value="{{ request('email') }}">
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div>
                                    <label for="password" class="block mb-2 font-bold text-primary_teks">Password</label>
                                    <input id="password" type="password" name="password" required autocomplete="new-password" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                    @error('password')
                                        <span role="alert" class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password_confirmation" class="block mb-2 font-bold text-primary_teks">Confirm Password</label>
                                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                </div>
                                <br>
                                <div>
                                    <button type="submit" class="w-full px-4 py-2 font-bold text-white rounded-sm bg-primary focus:outline-none focus:shadow-outline">Reset Password</button>
                                </div>
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
