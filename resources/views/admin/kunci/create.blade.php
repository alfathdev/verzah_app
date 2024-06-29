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
        <h1 class="sm:text-3xl text-2xl text-slate-700 mb-4">
            Data Kunci / Tambah Data
        </h1>
    </div>
    
    <div class="mx-6 max-w-max rounded bg-white shadow-lg">
        <div class="flex flex-wrap">
            <div class="sm:w-96 w-full p-6 text-gray-800 font-semibold uppercase">
                <form action="{{ route('kunci.generateKey') }}" method="get">
                    @csrf
                    <label>Tahun Angkatan</label>
                    <select name="tahun_angkatan" class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded">
                        @foreach($years as $year)
                        <option value="{{ $year }}" {{ old('tahun_angkatan') == $year ? 'selected' : '' }}>{{ $year ?? '' }}</option>
                        @endforeach
                    </select>
                    @error('tahun_angkatan')
                        <p class="text-red-500 text-sm font-normal italic capitalize block mb-2">{{ $message }}</p>
                    @enderror
                    
                    <label class="mt-1 inline-block">Nilai p ( bil prima )</label>
                    <input type="number" id="p" name="p" value="{{ old('p') }}" required @if (session('errorP')) autofocus @endif class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded">
                    @if (session('errorP'))
                        <p class="text-red-500 text-sm font-normal italic capitalize block mb-2">{{ session('errorP') }}</p>
                    @endif
                    
                    <label class="mt-1 inline-block">Nilai q ( bil prima )</label>
                    <input type="number" id="q" name="q" value="{{ old('q') }}" required @if (session('errorQ')) autofocus @endif class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded">
                    @if (session('errorQ'))
                    <p class="text-red-500 text-sm font-normal italic capitalize block mb-2">{{ session('errorQ') }}</p>
                    @endif
                    
                    <button type="submit" class="px-10 py-2 mt-2 text-white font-semibold w-full sm:w-auto bg-cyan-600 hover:bg-cyan-800 transition-all duration-500 rounded">
                        Generate
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
