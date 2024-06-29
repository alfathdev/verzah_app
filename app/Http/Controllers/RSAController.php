<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RSAController extends Controller
{
    public function generateKeys(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'p' => 'required|integer',
            'q' => 'required|integer',
        ]);

        $tahun = $request->tahun;
        $p = $request->p;
        $q = $request->q;

        if (!$this->isPrime($p) || !$this->isPrime($q)) {
            return redirect()->back()->with('error', 'Nilai p dan q harus bilangan prima.');
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
        $startYear = 2000;
        $years = range($currentYear, $startYear);

        $title = 'Tambah Kunci';
        sort($privateKeys);

        return view('admin.kunci.create', compact('tahun', 'years', 'p', 'q', 'n', 'm', 'publicKeys', 'privateKeys', 'title'));
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
}
