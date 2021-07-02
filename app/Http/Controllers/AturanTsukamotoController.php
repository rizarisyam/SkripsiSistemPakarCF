<?php

namespace App\Http\Controllers;

use App\Models\AturanTsukamoto;
use App\Models\Disease;
use App\Models\Symptom;
use Illuminate\Http\Request;


class AturanTsukamotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aturan = AturanTsukamoto::with(['himpunan','penyakit'])->get();

        return view('tsukamoto.aturan.index', compact(['aturan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gejala = Symptom::with(['himpunan'])->get();
        $penyakit = Disease::all();
        return view('tsukamoto.aturan.create', compact(['gejala','penyakit']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aturan_tsukamoto = AturanTsukamoto::create([
            'kode' => strtoupper($request->kode),
            'penyakit_id' => $request->input('penyakit_id'),
        ]);

        $aturan_tsukamoto->gejala()->attach($request->input('himpunan_id'));


        return redirect()->route('aturan-tsukamoto.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AturanTsukamoto  $aturanTsukamoto
     * @return \Illuminate\Http\Response
     */
    public function show(AturanTsukamoto $aturanTsukamoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AturanTsukamoto  $aturanTsukamoto
     * @return \Illuminate\Http\Response
     */
    public function edit(AturanTsukamoto $aturanTsukamoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AturanTsukamoto  $aturanTsukamoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AturanTsukamoto $aturanTsukamoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AturanTsukamoto  $aturanTsukamoto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aturan_tsukamoto = AturanTsukamoto::find($id);
        $aturan_tsukamoto->delete();
        return redirect()->route('aturan-tsukamoto.index');
    }
}
