<?php

namespace App\Http\Controllers;

use App\Models\Kunci;
use App\Models\Sign;
use App\Models\Ijazah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $totalKunci = Kunci::count();
        $totalIjazah = Ijazah::count();
        $totalSign = Sign::count();

        return view('admin.dashboard', compact('title', 'totalKunci', 'totalIjazah', 'totalSign'));
    }
}
