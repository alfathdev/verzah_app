@extends('layouts.app')

@section('content')
<div class="w-full overflow-y-scroll bg-slate-100">
    <div class="flex justify-between px-6 py-5 mb-6 shadow-md relative bg-white" >
        <img src="{{ asset('src/img/logo-brand.png') }}" alt="logo" class="w-40" />
        <span class="text-3xl cursor-pointer md:hidden flex items-center">
            <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
        </span>
    </div>
    
    <div class="px-6 mb-6">
        <h1 class="sm:text-3xl text-2xl text-slate-700 mb-4">
            Data Kunci / Tambah Data - Hasil
        </h1>
    </div>
    
    <div class="mx-6 mb-6 max-w-max rounded bg-white shadow-lg">
        <div class="flex flex-wrap p-6 text-gray-800 font-semibold uppercase">
            <div class="sm:w-80 w-full sm:mr-10">
                <form action="{{ route('kunci.store') }}" method="post">
                    @csrf
                    <label>Tahun Angkatan</label>
                    <input type="number" name="tahun_angkatan" value="{{ $tahun_angkatan ?? '' }}" readonly class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded">
                    
                    <label class="mt-1 inline-block">Nilai p ( bil prima )</label>
                    <input type="number" name="p" value="{{ $p ?? '' }}" readonly class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded">
                    <label class="mt-1 inline-block">Nilai q ( bil prima )</label>
                    <input type="number" name="q" value="{{ $q ?? '' }}" readonly class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded">
                </div>
                <div class="sm:w-80 w-full">
                    <label class="mt-1 inline-block">Nilai N</label>
                    <input type="number" name="n" value="{{ $n ?? '' }}" readonly readonly class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded"/>

                    <label class="mt-1 inline-block">Nilai M</label>
                    <input type="number" name="m" value="{{ $m ?? '' }}" readonly class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded"/>

                    <label class="mt-1 inline-block">Kunci Publik</label>
                    <select name="public_key" class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded">
                        @foreach($publicKeys ?? [] as $publicKey)
                        <option value="{{ $publicKey }}">{{ $publicKey }}</option>
                        @endforeach
                    </select>

                    <label class="mt-1 inline-block">Kunci Privat</label>
                    <select name="private_key" class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded">
                        @foreach($privateKeys ?? [] as $privateKey)
                        <option value="{{ $privateKey }}">{{ $privateKey }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="px-10 py-2 mt-2 text-white font-semibold w-full sm:w-auto bg-cyan-600 hover:bg-cyan-800 transition-all duration-500 rounded">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
