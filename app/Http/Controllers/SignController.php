<?php

namespace App\Http\Controllers;

use App\Models\Ijazah;
use App\Models\Sign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request  )
    {
        $search = $request->query('search');
        $ijazahQuery = Ijazah::query();

        if ($search) {
            $ijazahQuery = $ijazahQuery->where('nama_siswa', 'LIKE', '%' . $search . '%');
        }

        $ijazahs = $ijazahQuery->get();

        $title = 'Tanda Tangan';
        
        return view('admin.sign.index', compact('title', 'ijazahs', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sign = Sign::findOrFail($id);
        $title = 'Tanda Tangan - Detail';

        return view('admin.sign.show', compact('title', 'sign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function edit(Sign $sign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sign $sign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sign $sign)
    {
        //
    }
}
