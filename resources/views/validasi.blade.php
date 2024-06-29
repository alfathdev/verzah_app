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
    <script
    type="module"
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
    nomodule
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    
    <!-- script fontawesome -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />
    
    <title>Aplikasi Verifikator Ijazah - Validasi</title>
</head>
<body>
    <div class="bg-gray-100 h-screen">
        <!-- Navbar -->
        <nav
        class="px-6 py-2 bg-white shadow-lg md:flex md:items-center fixed top-0 md:justify-between w-full"
        >
        <div class="flex justify-between items-center">
            <a href="{{ route('index') }}">
                <img
                src="{{ asset('src/img/logo-brand.png') }}"
                alt="logo-brand"
                class="w-44"
                />
            </a>
            
            <span class="text-3xl cursor-pointer md:hidden flex items-center">
                <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
            </span>
        </div>
        
        <div id="menu" class="md:mt-0 mt-3 md:block hidden pb-2 md:pb-0">
            <a
            href="{{ route('login') }}"
            class="inline-block bg-cyan-600 text-white duration-500 px-2 py-1 hover:bg-cyan-800 rounded"
            >
            <span class="flex items-center px-3 py-1">
                <i class="fa fa-right-to-bracket pr-2"></i>
                <span class="text-lg font-semibold">Login</span>
            </span>
        </a>
    </div>
</nav>

<!-- Content -->
<div class="min-h-full flex flex-col px-6 pt-24 bg-gray-100">
    <!-- qr code section -->
    <div class="md:w-2/3 w-full bg-white py-5 px-6 mx-auto rounded-md shadow-lg">
        <div class="md:flex items-center">
            <div class="md:pr-5 mx-auto md:w-80 w-52 border md:mr-6">
                <img src="{{ asset('images/' . session('imageName')) }}" alt="qr code" />
            </div>
            
            <div class="w-full mt-6 md:my-0">
                <label for="ciperteks" class="font-semibold">QR Code</label>
                <input type="text" disabled value="{{ $qrText }}" class="border border-gray-300 rounded w-full py-2 px-3 mt-2 mb-4"/>
                
                <label for="tahun" class="font-semibold">Pilih Tahun Lulus</label>
                <input type="text" disabled value="{{ $year }}" class="border border-gray-300 rounded w-full py-2 px-3 mt-2 mb-4">
            </div>
        </div>
    </div>
    
    <!-- validasi section -->
    @if(isset($valid))
    <div id="validasi" class="md:w-2/3 w-full bg-white mx-auto rounded-md shadow-lg mt-8 mb-10">
        <div class="border-b px-6 py-5">
            <span class="text-cyan-600 text-lg font-semibold block">Status Ijazah</span>
        </div>
        
        <div class="flex flex-wrap justify-between w-full py-5 px-6">
            <div class="md:w-96 w-full">
                <label class="font-semibold">Nomor Induk</label>
                <input type="text" disabled value="{{ $ijazah->no_induk }}" class="border border-gray-300 rounded w-full py-2 px-3 mt-2 mb-4"/>
                <label class="font-semibold">Nomor Ijazah</label>
                <input type="text" disabled value="{{ $ijazah->no_ijazah }}" class="border border-gray-300 rounded w-full py-2 px-3 mt-2 mb-4"/>
                <label class="font-semibold">Nama Siswa</label>
                <input type="text" disabled value="{{ $ijazah->nama_siswa }}" class="border border-gray-300 rounded w-full py-2 px-3 mt-2 mb-4"/>
            </div>
            <div class="md:w-96 w-full">
                <label class="font-semibold">Nama Orangtua</label>
                <input type="text" disabled value="{{ $ijazah->nama_ortu }}" class="border border-gray-300 rounded w-full py-2 px-3 mt-2 mb-4"/>
                <label class="font-semibold">Tahun Lulus</label>
                <input type="text" disabled value="{{ $ijazah->tahun_lulus }}" class="border border-gray-300 rounded w-full py-2 px-3 mt-2 mb-4"/>
                <label class="font-semibold">Nama Pengesah</label>
                <input type="text" disabled value="{{ $ijazah->pengesah }}" class="border border-gray-300 rounded w-full py-2 px-3 mt-2 mb-4"/>
            </div>
        </div>
    </div>
    @elseif(isset($invalid))
    <div class="md:w-2/3 w-full bg-white mx-auto rounded-md shadow-lg mt-8 mb-10">
        <div class="border-b px-6 py-5">
            <span class="text-red-600 text-lg font-semibold block">Status Ijazah</span>
        </div>
        <div class="py-5 px-6">
            <p class="text-red-600">{{ $invalid }}</p>
        </div>
    </div>
    @endif
</div>

<!-- Footer -->
<footer class="w-full mt-10 sm:mt-0 bottom-0 py-3 px-6">
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
