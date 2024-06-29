<?php

namespace App\Http\Controllers;

use App\Models\Ijazah;
use App\Models\Kunci;
use App\Models\Sign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ValidasiController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    
    public function upload(Request $request)
    {
        $request->validate([
            'qr_code' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $imageName = time().'.'.$request->qr_code->extension();
        $filePath = $request->qr_code->move(public_path('images'), $imageName);
        
        // Mengirim gambar ke API GoQR untuk membaca isi QR code
        $response = Http::attach('file', file_get_contents($filePath), $imageName)->post('https://api.qrserver.com/v1/read-qr-code/');
        
        $qrText = '';
        if ($response->successful()) {
            $data = $response->json();
            if (isset($data[0]['symbol'][0]['data'])) {
                $qrText = $data[0]['symbol'][0]['data'];
            } else {
                return redirect()->back()->with('error', 'QR code tidak dapat dibaca.');
            }
        }
        
        
        $kuncis = Kunci::select('tahun_angkatan')->distinct()->get();
        
        // Simpan data ke dalam sesi
        session(['qrText' => $qrText, 'imageName' => $imageName, 'kuncis' => $kuncis]);
        
        return redirect()->route('show');
    }
    
    public function show()
    {
        $qrText = session('qrText');
        $imageName = session('imageName');
        $kuncis = session('kuncis');
        
        if (!$qrText || !$imageName || !$kuncis) {
            return redirect()->route('index')->with('error', 'Tidak ada data untuk ditampilkan.');
        }
        
        return view('show', compact('qrText', 'imageName', 'kuncis'));
    }
    
    public function validation(Request $request)
    {
        $request->validate([
            'ciperteks' => 'required|string',
            'tahun' => 'required|integer',
        ]);
        
        $qrText = session('qrText');
        $imageName = session('imageName');
        $kuncis = session('kuncis');
        
        $ciperteks = $request->input('ciperteks');
        $year = $request->input('tahun');
        
        $sign = Sign::where('ciperteks', $ciperteks)->first();
        
        if ($sign) {
            $ijazah = Ijazah::where('id', $sign->ijazah_id)->first();
            
            if ($ijazah->tahun_lulus == $year) {
                $valid = 'Data Valid';
                return view('validasi', compact('qrText', 'imageName', 'year', 'valid', 'ijazah'));
            } else {
                $invalid = 'Data Invalid';
                return view('validasi', compact('qrText', 'imageName', 'year', 'invalid', 'ijazah'));
            }
        } else {
            $invalid = 'Data Invalid';
            return view('validasi', compact('qrText', 'imageName', 'year', 'invalid'));
        }
        
    }
}
