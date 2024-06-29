@extends('layouts.app')

@section('content')
<div class="w-full min-h-screen overflow-y-scroll bg-slate-100">
    <div class="flex justify-between px-6 py-5 mb-6 shadow-md relative bg-white">
        <img src="{{ asset('src/img/logo-brand.png') }}" alt="logo" class="w-40" />
        <span class="text-3xl cursor-pointer md:hidden flex items-center">
            <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
        </span>
    </div>
    
    <div class="px-6 mb-6">
        <h1 class="text-3xl text-slate-700">Tanda Tangan / Detail</h1>
    </div>
    
    <div class="sm:columns-2 gap-6 mx-6">
        <div class="border border-gray-300 rounded overflow-hidden bg-white mb-6">
            <div class="px-5 py-3 border-b border-gray-300">
                <h2 class="font-semibold text-cyan-600">Detail Data Ijazah</h2>
            </div>
            <div class="px-5 py-3">
                <table class="w-full table-auto text-sm text-left text-gray-500 whitespace-nowrap">
                    <tr class="border-b">
                        <td class="pr-2 py-4 font-semibold">Nomor Induk</td>
                        <td class="pr-3 py-4">:</td>
                        <td class="py-4">{{ $sign->ijazah->no_induk }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="pr-2 py-4 font-semibold">Nomor Ijazah</td>
                        <td class="pr-3 py-4">:</td>
                        <td class="py-4">{{ $sign->ijazah->no_ijazah }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="pr-2 py-4 font-semibold">Nama Siswa</td>
                        <td class="pr-3 py-4">:</td>
                        <td class="py-4">{{ $sign->ijazah->nama_siswa }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="pr-2 py-4 font-semibold">Nama Orang Tua</td>
                        <td class="pr-3 py-4">:</td>
                        <td class="py-4">{{ $sign->ijazah->nama_ortu }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="pr-2 py-4 font-semibold">Tahun Lulus</td>
                        <td class="pr-3 py-4">:</td>
                        <td class="py-4">{{ $sign->ijazah->tahun_lulus }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="pr-2 py-4 font-semibold">Nama Pengesah</td>
                        <td class="pr-3 py-4">:</td>
                        <td class="py-4">{{ $sign->ijazah->pengesah }}</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="border border-gray-300 rounded overflow-hidden bg-white mb-6">
            <div class="px-5 py-3 border-b border-gray-300">
                <h2 class="font-semibold text-cyan-600">QR Code</h2>
            </div>
            <div class="p-5">
                <img src="data:image/png;base64, {{ $sign->qr_code }}" alt="QR Code" class="w-40 sm:mx-0 mx-auto mb-4 border-2"/>
                <label>Pesan</label>
                <input type="text" value="{{ $sign->pesan }}" class="w-full border border-gray-300 rounded py-1 px-2 my-2" readonly/>
                <label>Tanda Tangan Digital</label>
                <input type="text" value="{{ $sign->ciperteks }}" class="w-full border border-gray-300 rounded py-1 px-2 my-2" readonly/>
                <a href="data:image/png;base64, {{ $sign->qr_code }}" download="qr_code_{{ $sign->ijazah->no_ijazah }}.png" class="px-10 py-2 mt-2 text-white font-semibold w-full sm:w-auto bg-cyan-600 hover:bg-cyan-800 transition-all duration-500 rounded block text-center">
                    Unduh
                </a>
            </div>
        </div>
    </div>
</div>
@endsection