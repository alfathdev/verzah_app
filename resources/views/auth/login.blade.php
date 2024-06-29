<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="icon" href="{{ asset('src/favicon_io/favicon.ico') }}" type="image/x-icon" />
    
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- script fontawesome -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />
    
    <title>Login</title>
</head>
<body class="bg-slate-100">
    <div class="w-full h-screen flex items-center">
        <div class="w-full md:mx-20 mx-10">
            <div class="rounded-2xl overflow-hidden flex bg-white shadow-lg">
                <!-- kiri -->
                <div class="w-1/2 bg-cyan-600 hidden lg:block px-32">
                    <div class="my-20">
                        <div class="flex justify-center w-full">
                            <img src="{{ asset('src/img/illustration.png') }}" alt="illustration" class="mb-6" />
                        </div>
                        <div class="text-center">
                            <h1 class="text-2xl text-white font-semibold mb-4">
                                Aplikasi Verifikator Ijazah
                            </h1>
                            <p class="text-sm text-white font-light">
                                Mengamankan data ijazah dengan algoritma RSA yang disimpan
                                didalam QR Code
                            </p>
                        </div>
                    </div>
                </div>
                <!-- kanan -->
                <div class="lg:w-1/2 md:px-20 px-10 w-full">
                    <div class="md:my-20 my-10">
                        <div class="flex justify-center w-full mb-5">
                            <img src="{{ asset('src/img/logo-brand.png') }}" alt="" class="w-48" />
                        </div>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <label for="email" class="block text-gray-600 font-semibold mb-2"
                            >Email</label
                            >
                            <input
                            type="email"
                            name="email"
                            placeholder="masukkan username"
                            class="px-3 py-2 w-full border border-gray-300 rounded mb-4"
                            />
                            <label for="password" class="block text-gray-600 font-semibold mb-2"
                            >Password</label
                            >
                            <input
                            type="password"
                            name="password"
                            placeholder="masukkan password"
                            required
                            class="px-3 py-2 w-full border border-gray-300 rounded mb-2"
                            />
                            <a
                            href="https://www.instagram.com/alfatih_r22/"
                            class="text-sm text-cyan-600 underline text-right block mb-4"
                            >Lupa password?</a
                            >
                            
                            <button
                            type="submit"
                            class="block w-full py-2 text-center font-medium text-white bg-cyan-600 hover:bg-cyan-800 transition-all duration-500 rounded"
                            >
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>