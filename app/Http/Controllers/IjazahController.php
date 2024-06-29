<?php

namespace App\Http\Controllers;

use App\Models\Ijazah;
use App\Models\Kunci;
use App\Models\Sign;
use Illuminate\Http\Request;

class IjazahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $ijazahQuery = Ijazah::query();
        
        if ($search) {
            $ijazahQuery = $ijazahQuery->where('nama_siswa', 'LIKE', '%' . $search . '%');
        }
        
        $ijazahs = $ijazahQuery->get();
        
        // judul halaman
        $title = 'Data Ijazah';
        
        return view('admin.ijazah.index', compact('title', 'ijazahs', 'search'));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        // ambil data tahun pada tabel kunci
        $tahun_lulus = Kunci::select('tahun_angkatan')->get();
        
        $title = 'Tambah Ijazah';
        
        return view('admin.ijazah.create', compact('title', 'tahun_lulus'));
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'no_induk' => 'required',
            'no_ijazah' => 'required|unique:ijazahs',
            'nama_siswa' => 'required|string',
            'nama_ortu' => 'required|string',
            'tahun_lulus' => 'required|integer',
            'pengesah' => 'required|string',
        ]);
        
        Ijazah::create([
            'no_induk' => $request->no_induk,
            'no_ijazah' => $request->no_ijazah,
            'nama_siswa' => $request->nama_siswa,
            'nama_ortu' => $request->nama_ortu,
            'tahun_lulus' => $request->tahun_lulus,
            'pengesah' => $request->pengesah,
            'is_signed' => false,
        ]);
        
        return redirect()->route('ijazah.index')->with('success', 'Berhasil menambah data Ijazah!');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Ijazah  $ijazah
    * @return \Illuminate\Http\Response
    */
    public function show(Ijazah $ijazah)
    {
        
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Ijazah  $ijazah
    * @return \Illuminate\Http\Response
    */
    public function edit(Ijazah $ijazah)
    {
        // ambil data tahun pada tabel kunci
        $tahun_lulus = Kunci::select('tahun_angkatan')->get();
        
        $title = 'Data Ijazah | Edit Data';
        
        return view('admin.ijazah.edit', compact('ijazah', 'title', 'tahun_lulus'));
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Ijazah  $ijazah
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Ijazah $ijazah)
    {
        $rules = [
            'no_induk' => 'required',
            'nama_siswa' => 'required|string',
            'nama_ortu' => 'required|string',
            'tahun_lulus' => 'required|integer',
            'pengesah' => 'required|string',
        ];
        
        
        if ($request->no_ijazah != $ijazah->no_ijazah) {
            $rules['no_ijazah'] = 'required|unique:ijazahs';
        }
        
        $validatedData = $request->validate($rules);
        
        Ijazah::where('id', $ijazah->id)->update($validatedData);
        
        return redirect()->route('ijazah.index')->with('update', 'Data Ijazah telah diubah!');
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Ijazah  $ijazah
    * @return \Illuminate\Http\Response
    */
    public function destroy(Ijazah $ijazah)
    {
        //
    }

    public function signIn(Ijazah $ijazah)
    {
        $tahun = $ijazah->tahun_lulus;
        $induk = $ijazah->no_induk;
        $nama = $ijazah->nama_siswa;
        $pengesah = $ijazah->pengesah;
        
        
        $nama = explode(' ', trim($nama))[0];
        
        $pesan = sprintf('SMP/%d/%s/%s/%s', $tahun, $induk, $nama, $pengesah);
        $pesan = strtoupper($pesan);
        
        $ascii_values = [];
        for ($i = 0; $i < strlen($pesan); $i++) {
            $ascii_values[] = ord($pesan[$i]);
        }

        $key = Kunci::where('tahun_angkatan', $tahun)->first();
        
        $e = $key->e;
        $n = $key->n;
        
        // Fungsi untuk enkripsi
        function encrypt($p, $e, $n) {
            return bcpowmod($p, $e, $n);
        }
        
        $encrypted_values = [];
        foreach ($ascii_values as $p) {
            $encrypted_values[] = encrypt($p, $e, $n);
        }
        
        // Mengubah nilai terenkripsi menjadi heksadesimal
        $hex_encrypted_values = array_map('dechex', $encrypted_values);

        $encrypted_string = implode('', $hex_encrypted_values);
        $encrypted_string = strtoupper($encrypted_string);
        
        // Menggunakan quickchart.io untuk membuat QR code
        $quickchart_url = 'https://quickchart.io/qr?text=' . urlencode($encrypted_string) . '&size=300';
        
        // Mengambil gambar QR code dari URL
        $qr_image = file_get_contents($quickchart_url);
        
        // Menyimpan gambar QR code ke database sebagai blob
        $qr_image_blob = base64_encode($qr_image); // Mengonversi gambar ke format base64
        $qrcode = $qr_image_blob;

        $title = 'tes';
        $enkrip = $encrypted_string;

        Sign::create([
            'ijazah_id' => $ijazah->id,
            'pesan' => $pesan,
            'ciperteks' => $enkrip,
            'qr_code' => $qrcode,
        ]);

        // 'is_signed' => false,

        $ijazah->where('id', $ijazah->id)->update(['is_signed' => true]);
        
        return redirect()->route('sign.index')->with('success', 'Berhasil menandatangani Ijazah!');

        // return view('admin.ijazah.show', compact('qrcode', 'title', 'pesan', 'enkrip'));
    }
}
