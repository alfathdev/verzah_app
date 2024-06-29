<?php

namespace App\Http\Controllers;

use App\Models\Kunci;
use Illuminate\Http\Request;

class KunciController extends Controller
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
        $keysQuery = Kunci::query();

        if ($search) {
            $keysQuery = $keysQuery->where('tahun_angkatan', 'LIKE', '%' . $search . '%');
        }

        $keys = $keysQuery->get();
        $title = 'Data Kunci';

        return view('admin.kunci.index', compact('title', 'keys', 'search'));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $title = 'Tambah Kunci';
        $currentYear = date('Y');
        $startYear = 2015;
        $years = range($currentYear, $startYear);
        
        return view('admin.kunci.create', compact('title', 'years'));
    }
    
    public function generateKey(Request $request)
    {
        $request->validate([
            'tahun_angkatan' => 'required|integer|unique:kuncis,tahun_angkatan',
            'p' => 'required|integer',
            'q' => 'required|integer',
        ], [
            'tahun_angkatan.unique' => 'Kunci untuk Tahun Angkatan tersebut sudah ada',
        ]);
        
        $tahun_angkatan = $request->tahun_angkatan;
        $p = $request->p;
        $q = $request->q;
        
        if (!$this->isPrime($p)) {
            return back()->withInput()->with('errorP', 'Nilai p harus bilangan prima.');
        } 
        
        if (!$this->isPrime($q)) {
            return back()->withInput()->with('errorQ', 'Nilai q harus bilangan prima.');
        }
        
        $n = $p * $q;
        $m = ($p - 1) * ($q - 1);
        
        $publicKeys = [];
        $privateKeys = [];
        
        for ($e = 2; $e < $m; $e++) {
            if ($this->gcd($e, $m) == 1) {
                $d = $this->modInverse($e, $m);
                if ($d !== null) {
                    $publicKeys[] = $e;
                    $privateKeys[] = $d;
                }
            }
        }
        $currentYear = date('Y');
        $startYear = 2015;
        $years = range($currentYear, $startYear);
        
        $title = 'Hasil Kunci';
        sort($privateKeys);
        
        return view('admin.kunci.result', compact('tahun_angkatan', 'p', 'q', 'n', 'm', 'publicKeys', 'privateKeys', 'title'));
    }
    
    private function isPrime($num)
    {
        if ($num <= 1) {
            return false;
        }
        
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
        
        return true;
    }
    
    private function modInverse($a, $m)
    {
        $m0 = $m;
        $x0 = 0;
        $x1 = 1;
        
        if ($m == 1) {
            return null;
        }
        
        while ($a > 1) {
            $q = intdiv($a, $m);
            $t = $m;
            
            $m = $a % $m;
            $a = $t;
            $t = $x0;
            
            $x0 = $x1 - $q * $x0;
            $x1 = $t;
        }
        
        if ($x1 < 0) {
            $x1 += $m0;
        }
        
        return $x1;
    }
    
    private function gcd($a, $b)
    {
        if ($b == 0) {
            return $a;
        }
        
        return $this->gcd($b, $a % $b);
    }
    
    public function saveKeys(Request $request)
    {
        dd($request);
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
            'tahun_angkatan' => 'required|integer|unique:kuncis,tahun_angkatan',
            'p' => 'required|integer',
            'q' => 'required|integer',
            'n' => 'required|integer',
            'm' => 'required|integer',
            'public_key' => 'required|integer',
            'private_key' => 'required|integer',
        ]);
        
        Kunci::create([
            'tahun_angkatan' => $request->tahun_angkatan,
            'p' => $request->p,
            'q' => $request->q,
            'n' => $request->n,
            'm' => $request->m,
            'e' => $request->public_key,
            'd' => $request->private_key,
        ]);
        
        return redirect()->route('kunci.index')->with('success', 'Berhasil menambah kunci!');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}
