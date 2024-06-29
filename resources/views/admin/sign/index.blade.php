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
        <h1 class="text-3xl text-slate-700">Tanda Tangan</h1>
    </div>
    
    <div class="px-6 mb-4 flex justify-end">
        <div
        class="flex border-2 border-cyan-600 rounded-md overflow-hidden mb-2"
        >
        <input
        type="text"
        placeholder="cari data tanda tangan"
        class="px-3 w-screen sm:w-60"
        />
        <div class="text-white bg-cyan-600 py-2 px-4">
            <i class="fa fa-search"></i>
        </div>
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

<div class="px-6 mb-6 overflow-x-auto">
    <table
    class="w-full table-auto text-sm text-left text-gray-500 whitespace-nowrap"
    >
    <thead class="text-sm text-gray-700 uppercase bg-white border-b">
        <tr>
            <th scope="col" class="px-6 py-3">No</th>
            <th scope="col" class="px-6 py-3">Nomor Ijazah</th>
            <th scope="col" class="px-6 py-3">Nama</th>
            <th scope="col" class="px-6 py-3">Status</th>
            <th scope="col" class="px-6 py-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($ijazahs as $ijazah)    
        <tr class="odd:bg-gray-50 even:bg-white border-b">
            <td scope="row" class="px-6 py-4">{{ $loop->iteration }}</td>
            <td class="px-6 py-4">{{ $ijazah->no_ijazah }}</td>
            <td class="px-6 py-4">{{ $ijazah->nama_siswa }}</td>
            @if ($ijazah->is_signed == true)
            <td class="px-6 py-4">
                <p class="font-medium text-gray-500">Signed</p>
            </td>
            <td class="px-6 py-4">
                <a href="{{ route('sign.show', $ijazah->sign->id) }}" class="font-medium text-blue-600 hover:underline">Details</a>
            </td>
            @else
            <td class="px-6 py-4">
                <p class="font-medium text-gray-500">Not Yet Signed</p>
            </td>
            <td class="px-6 py-4">
                <a href="{{ route('ijazah.sign', $ijazah->id) }}" class="font-medium text-red-600 hover:underline">Sign</a>
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