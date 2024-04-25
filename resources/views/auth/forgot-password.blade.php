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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <!-- Library Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <!-- Slider Splide JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

</head>

<body>
    <section id="forgot-password" style="background-image: url(./dist/assets/image/bg-auth.svg); background-size: cover; height: auto;">
        <div class="container">
            <div class="flex flex-col py-20">
                <div class="flex mx-auto">
                    <img src="./dist/assets/image/Logo-header.png" alt="Logo Skh" width="150px" class="">
                </div>
                <div class="p-6 ">
                    <div class="max-w-screen-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg ">
                        <div class="p-6">
                            <h2 class="mb-2 text-2xl font-bold text-gray-800">Forgot Password?</h2>
                            <p class="mb-6 text-gray-700">Enter your email to reset your password.</p> <br>
                            <style>
                                /* Animasi loading */
                                @keyframes spin {
                                    0% { transform: rotate(0deg); }
                                    100% { transform: rotate(360deg); }
                                }
                                .spinner {
                                    border: 5px solid #f3f3f3; /* Warna latar belakang */
                                    border-top: 5px solid #3498db; /* Warna spinner */
                                    border-radius: 50%;
                                    width: 50px;
                                    height: 50px;
                                    animation: spin 2s linear infinite; /* Animasi spin */
                                }
                            </style>

                            <div style="position: relative;">
                                <div id="loadingIndicator" style="display: none; position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%); text-align: center; background-color: rgba(255, 255, 255, 0); padding: 10px; border-radius: 2px;">
                                    <div class="spinner"></div>
                                </div>
                                <div id="errorMessage" style="display: none; color: red; text-align: center; font-weight: bold;">Email not found!</div>
                                <!-- Success Message -->
                                <div id="successMessage" style="display: none; color: green; text-align: center; font-weight: bold;">Password reset email has been sent successfully!</div>
                                <!-- Form -->
                                <!-- Let's assume your form is here -->
                            </div>
                            <!-- Form -->
                            <form id="resetForm" action="{{ route('password.email') }}" method="POST" onsubmit="return validateForm()">
                                @csrf
                                <div class="mb-4">
                                    <label class="block mb-2 font-bold text-primary_teks" for="email">Email</label>
                                    <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Email Address">
                                </div>
                                <!-- Loading indicator -->
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="flex flex-col justify-between gap-4">
                                    <div class="flex justify-end">
                                        <button type="button" class="px-4 py-2 font-bold tracking-wide text-center text-red-600 transition cursor-pointer text-bas whitespace-nowrap rounded-xl" onclick="window.location.href='{{ route('login') }}'">Back to Login</button>
                                    </div>
                                    <div class="flex">
                                        <button id="resetButton" class="w-full px-4 py-2 font-bold text-white rounded-sm bg-primary focus:outline-none focus:shadow-outline" type="submit">Reset Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- script --}}
    <script>
        // Function to handle form submission
        function validateForm() {
            // Show loading indicator
            document.getElementById("loadingIndicator").style.display = "block";

            // Reset any previous error message
            document.getElementById("errorMessage").style.display = "none";

            // Send form data asynchronously
            var formData = new FormData(document.getElementById("resetForm"));
            fetch("{{ route('password.email') }}", {
                    method: "POST",
                    body: formData
                })
                .then(response => {
                    // Hide loading indicator
                    document.getElementById("loadingIndicator").style.display = "none";

                    // Check if response is successful
                    if (response.ok) {
                        // If successful, show success message and reset form
                        response.json().then(data => {
                            document.getElementById("successMessage").innerText = data.success;
                            document.getElementById("successMessage").style.display = "block";
                            document.getElementById("resetForm").reset();
                        });
                    } else {
                        // If not successful, show error message
                        response.json().then(data => {
                            document.getElementById("errorMessage").innerText = data.error;
                            document.getElementById("errorMessage").style.display = "block";
                        });
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    // Hide loading indicator in case of error
                    document.getElementById("loadingIndicator").style.display = "none";
                });

            // Prevent default form submission
            return false;
        }
    </script>

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
