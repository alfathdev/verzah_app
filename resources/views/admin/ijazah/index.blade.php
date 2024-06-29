@extends('layouts.app')

@section('content')
<div class="w-full min-h-screen overflow-y-scroll bg-slate-100">
    <div
    class="flex justify-between px-6 py-5 mb-6 shadow-md relative bg-white"
    >
    <img src="{{ asset('src/img/logo-brand.png') }}" alt="logo" class="w-40" />
    <span class="text-3xl cursor-pointer md:hidden flex items-center">
        <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
    </span>
</div>

<div class="px-6 mb-6">
    <h1 class="text-3xl text-slate-700">Data Ijazah</h1>
</div>

<div class="px-6 mb-4 flex flex-wrap justify-between">
    <a href="{{ route('ijazah.create') }}" class="flex bg-cyan-600 text-white rounded-md mb-2 font-semibold">
        <div class="py-2 px-4"><i class="fa fa-plus"></i></div>
        <span class="py-2 pr-4 hidden sm:block">Tambah Data</span>
    </a>
    <div class="flex border-2 border-cyan-600 rounded-md overflow-hidden mb-2 font-semibold text-gray-800">
        <form method="GET" action="{{ route('ijazah.index') }}" class="flex">
            <input type="text" name="search" value="{{ $search }}" placeholder="cari data ijazah" class="px-3 w-40 sm:w-60" />
            @if (!$search)
            <button type="submit" class="text-white bg-cyan-600 py-2 px-4">
                <i class="fa fa-search"></i>
            </button>
            @else
            <a href="{{ route('ijazah.index') }}" class="text-white bg-cyan-600 py-2 px-4">
                <i class="fa fa-times"></i>
            </a>
            @endif
        </form>
    </div>
</div>

@if (session('success'))
<div class="px-6 mb-6 overflow-x-auto">
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p class="font-bold">Success!</p>
        <p>{{ session('success') }}</p>
    </div>
</div>
@endif

@if (session('update'))
<div class="px-6 mb-6 overflow-x-auto">
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p class="font-bold">Update!</p>
        <p>{{ session('update') }}</p>
    </div>
</div>
@endif

<div class="px-6 mb-6 overflow-x-auto">
    <table
    class="w-full table-auto text-sm text-left text-gray-500 whitespace-nowrap"
    >
    <thead class="text-sm text-gray-700 uppercase bg-white border-b">
        <tr>
            <th scope="col" class="px-6 py-3">#</th>
            <th scope="col" class="px-6 py-3">Nomor Induk Siswa</th>
            <th scope="col" class="px-6 py-3">Nomor Ijazah</th>
            <th scope="col" class="px-6 py-3">Nama Siswa</th>
            <th scope="col" class="px-6 py-3">Nama Orangtua</th>
            <th scope="col" class="px-6 py-3">Tahun Lulus</th>
            <th scope="col" class="px-6 py-3">Pengesah</th>
            <th scope="col" class="px-6 py-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($ijazahs as $ijazah)    
        <tr class="odd:bg-gray-50 even:bg-white border-b">
            <td scope="row" class="px-6 py-4">{{ $loop->iteration }}</td>
            <td class="px-6 py-4">{{ $ijazah->no_induk }}</td>
            <td class="px-6 py-4">{{ $ijazah->no_ijazah }}</td>
            <td class="px-6 py-4">{{ $ijazah->nama_siswa }}</td>
            <td class="px-6 py-4">{{ $ijazah->nama_ortu }}</td>
            <td class="px-6 py-4">{{ $ijazah->tahun_lulus }}</td>
            <td class="px-6 py-4">{{ $ijazah->pengesah }}</td>
            @if ($ijazah->is_signed == true)
            <td class="px-6 py-4">
                    <a href="{{ route('sign.show', $ijazah->sign->id) }}" class="font-medium text-blue-600 hover:underline">Details</a>
            </td>
            @else                
            <td class="px-6 py-4">
                <a href="{{ route('ijazah.edit', $ijazah->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
            </td>
            @endif
        </tr>
        @empty
        <tr>
            <td colspan="5" class="px-6 py-4">Data tidak ditemukan</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection