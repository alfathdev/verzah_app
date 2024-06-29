<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="icon" href="{{ asset('src/favicon_io/favicon.ico') }}" type="image/x-icon" />
    
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <!-- script fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    
    <title>Aplikasi Verifikator Ijazah</title>
</head>
<body>
    <div class="bg-gray-100 h-screen">
        <!-- Navbar -->
        <nav class="px-6 py-2 bg-white shadow-lg md:flex md:items-center fixed top-0 md:justify-between w-full">
            <div class="flex justify-between items-center">
                <a href="">
                    <img src="{{ asset('src/img/logo-brand.png') }}" alt="logo-brand" class="w-44" />
                </a>
                
                <span class="text-3xl cursor-pointer md:hidden flex items-center">
                    <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
                </span>
            </div>
            
            <div id="menu" class="md:mt-0 mt-3 md:block hidden pb-2 md:pb-0">
                <a href="{{ route('login') }}" class="inline-block bg-cyan-600 text-white duration-500 px-2 py-1 hover:bg-cyan-800 rounded">
                    <span class="flex items-center px-3 py-1">
                        <i class="fa fa-right-to-bracket pr-2"></i>
                        <span class="text-lg font-semibold">Login</span>
                    </span>
                </a>
            </div>
        </nav>
        
        <!-- Content -->
        <div class="min-h-full flex flex-col px-6">
            
            <h1 class="text-3xl sm:text-5xl text-gray-700 text-center font-bold mt-36">
                Verifikator Ijazah
            </h1>
            <h2 class="text-lg sm:text-2xl text-center font-light text-gray-800 my-5">
                Upload gambar QR Code untuk memverifikasi keaslian ijazah.
            </h2>
            
            <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="flex justify-center">
                    <label for="upload" class="text-center bg-cyan-600 hover:bg-cyan-800 duration-500 w-full sm:w-96 mx-auto py-6 my-3 rounded-lg text-xl font-bold text-white cursor-pointer">
                        Pilih Gambar QR Code
                    </label>
                    <input id="upload" type="file" name="qr_code" class="hidden" onchange="this.form.submit()" />
                </div>
            </form>
            @if (session('error'))
            <div class="mt-4 text-center">
                <h2 class="text-xl font-bold mb-2">{{ session('error') }}</h2>
            </div>
            @endif
        </div>
        
        <!-- Footer -->
        <footer class="w-full fixed mt-10 sm:mt-0 bottom-0 py-3 px-6">
            <div class="text-sm">
                &copy Verzah App 2024 | create by
                <a href="https://instagram.com/alfatih_r22" target="_blank" class="text-cyan-600 hover:text-cyan-800 mx-1 hover:underline">
                    alfathdev
                </a>
            </div>
        </footer>
    </div>
    
    <!-- script -->
    <script>
        function Menu(e) {
            let menu = document.getElementById("menu");
            
            e.name === "menu"
            ? ((e.name = "close"), menu.classList.remove("hidden"))
            : ((e.name = "menu"), menu.classList.add("hidden"));
        }
    </script>
</body>
</html>
