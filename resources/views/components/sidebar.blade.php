<div id="test" class="w-28 md:w-64 hidden md:block bg-cyan-600">
    <img src="{{ asset('src/img/monogram-white.png') }}" alt="logo" class="w-20 mx-auto p-4 m-2">
    <div class="mx-3 md:mx-5">
        <ul>
            <hr class="opacity-40">
            
            <a href="/dashboard">
                <li class="my-4 text-white hover:opacity-100 {{ Request::is('dashboard') ? '' : 'opacity-60' }} text-center md:text-left">
                    <div class="md:inline-block">
                        <i class="fa fa-dashboard"></i>
                    </div>
                    <span class="md:mx-2 text-[10px] md:text-base font-semibold">Dashboard</span>
                </li>
            </a>
            
            <hr class="opacity-40">
            
            <a href="{{ route('kunci.index') }}">
                <li class="my-4 text-white hover:opacity-100 {{ Request::is('kunci') || Request::is('kunci/create') ? '' : 'opacity-60' }} text-center md:text-left">
                    <div class="md:inline-block"><i class="fa fa-key"></i></div>
                    <span class="md:mx-2 text-[10px] md:text-base font-semibold">Data Kunci</span>
                </li>
            </a>
            <a href="{{ route('ijazah.index') }}">
                <li class="my-4 text-white hover:opacity-100 {{ Request::is('ijazah') || Request::is('ijazah/create') || Request::is('ijazah/$ijazah/edit') ? '' : 'opacity-60' }} text-center md:text-left">
                    <div class="md:inline-block">
                        <i class="fa fa-file w-4"></i>
                    </div>
                    <span class="md:mx-2 text-[10px] md:text-base font-semibold">Data Ijazah</span>
                </li>
            </a>
            <a href="{{ route('sign.index') }}">
                <li class="my-4 text-white hover:opacity-100 {{ Request::is('sign') || Request::is('sign/create') ? '' : 'opacity-60' }} text-center md:text-left">
                    <div class="md:inline-block">
                        <i class="fa fa-stamp"></i>
                    </div>
                    <span class="md:mx-2 text-[10px] md:text-base font-semibold">Tanda Tangan</span>
                </li>
            </a>
            
            <hr class="opacity-40" />
        </ul>
        
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block bg-white hover:bg-gray-200 text-center text-cyan-600 font-semibold p-2 w-full rounded my-20">
                <span class="hidden md:block">Logout</span>
                <div class="md:hidden">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </div>
            </button>
        </form>
    </div>
</div>

