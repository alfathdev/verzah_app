@extends('layouts.app')

@section('content')

<div class="w-full overflow-y-scroll bg-slate-100">
    <div class="flex justify-between px-6 py-5 mb-6 shadow-md relative bg-white">
        <img src="{{ asset('src/img/logo-brand.png') }}" alt="logo" class="w-40" />
        <span class="text-3xl cursor-pointer md:hidden flex items-center">
            <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
        </span>
    </div>
    
    <div class="px-6 mb-6">
        <h1 class="text-3xl text-slate-700">Dashboard</h1>
    </div>
    
    <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-6 px-6 mb-6">
        <div class="bg-white shadow-md px-4 py-8 rounded-md border-l-4 border-sky-500">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-xs uppercase font-semibold text-sky-500 mb-1">
                        Data Kunci
                    </h3>
                    <h4 class="text-xl font-bold text-gray-800">{{ $totalKunci }}</h4>
                </div>
                <div class="text-4xl text-gray-300 mr-1">
                    <i class="fa fa-key"></i>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md px-4 py-8 rounded-md border-l-4 border-teal-500">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-xs uppercase font-semibold text-teal-500 mb-1">
                        Data Ijazah
                    </h3>
                    <h4 class="text-xl font-bold text-gray-800">{{ $totalIjazah }}</h4>
                </div>
                <div class="text-4xl text-gray-300 mr-1">
                    <i class="fa fa-file"></i>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md px-4 py-8 rounded-md border-l-4 border-rose-500">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-xs uppercase font-semibold text-rose-500 mb-1">
                        Tanda Tangan
                    </h3>
                    <h4 class="text-xl font-bold text-gray-800">{{ $totalSign }}</h4>
                </div>
                <div class="text-4xl text-gray-300 mr-1">
                    <i class="fa fa-stamp"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
