<?php

namespace App\Http\Controllers;

use App\Models\Himpunan;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HimpunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $himpunan = Himpunan::with(['gejala'])->get();
        $gejala = Symptom::with(['himpunan'])->get();
        return view('himpunan.index', compact(['himpunan', 'gejala']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gejala = Symptom::all();
        return view('himpunan.create', compact(['gejala']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $himpunan = Himpunan::create([
            'gejala_id' => $request->gejala_id,
            'himpunan' => $request->himpunan,
            'semesta' => json_encode(explode("-", $request->semesta)),
            'domain' => json_encode(explode("-", $request->domain))
        ]);

        return redirect()->route('himpunan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Himpunan  $himpunan
     * @return \Illuminate\Http\Response
     */
    public function show(Himpunan $himpunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Himpunan  $himpunan
     * @return \Illuminate\Http\Response
     */
    public function edit(Himpunan $himpunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Himpunan  $himpunan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Himpunan $himpunan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Himpunan  $himpunan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $himpunan = Himpunan::find($id);
        $himpunan->delete();
        return redirect()->route('himpunan.index');
    }
}
