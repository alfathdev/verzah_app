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
            Data Ijazah / Edit Data
        </h1>
    </div>

    <div class="mx-6 max-w-max rounded bg-white shadow-lg">
        <form action="{{ route('ijazah.update', $ijazah->id) }}" method="POST">
            @csrf
            @method('put')

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Whoops!</strong> There were some problems with your input.
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex flex-wrap p-6 text-gray-800 font-semibold uppercase">
                <div class="sm:w-80 w-full sm:mr-10">
                    <label>Nomor Induk</label>
                    <input type="text" name="no_induk" value="{{ old('no_induk', $ijazah->no_induk) }}" required class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded" placeholder="nomor induk siswa"/>
                    <label>Nomor Ijazah</label>
                    <input type="text" name="no_ijazah" value="{{ old('no_ijazah', $ijazah->no_ijazah) }}" required class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded" placeholder="nomor ijazah"/>
                    <label>Nama Siswa</label>
                    <input type="text" name="nama_siswa" value="{{ old('nama_siswa', $ijazah->nama_siswa) }}" required class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded" placeholder="nama siswa"/>
                </div>
                <div class="sm:w-80 w-full">
                    <label>Nama Orangtua</label>
                    <input type="text" name="nama_ortu" value="{{ old('nama_ortu', $ijazah->nama_ortu) }}" required class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded" placeholder="nama orangtua siswa"/>
                    <label>Tahun Lulus</label>
                    <select name="tahun_lulus" required class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded">
                        @foreach($tahun_lulus as $tahun)
                            <option value="{{ $tahun->tahun_angkatan }}" {{ $tahun->tahun_angkatan == $ijazah->tahun_lulus ? 'selected' : '' }}>{{ $tahun->tahun_angkatan }}</option>
                        @endforeach
                    </select>
                    <label>Pengesah</label>
                    <input type="text" name="pengesah" value="{{ old('pengesah', $ijazah->pengesah) }}" required class="font-bold text-sm text-gray-500 w-full px-3 py-2 my-2 border border-gray-400 rounded" placeholder="nama pengesah ijazah"/>
                    <button class="px-10 py-2 mt-2 text-white font-semibold w-full sm:w-auto bg-cyan-600 hover:bg-cyan-800 transition-all duration-500 rounded">
                        Ubah
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
