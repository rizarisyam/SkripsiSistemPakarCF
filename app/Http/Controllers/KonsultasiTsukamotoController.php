<?php

namespace App\Http\Controllers;

use App\Models\AturanTsukamoto;
use App\Models\KonsultasiTsukamoto;
use App\Models\Symptom;
use Illuminate\Http\Request;

class KonsultasiTsukamotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tsukamoto.konsultasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gejala = Symptom::all();
        return view('tsukamoto.konsultasi.create', compact('gejala'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // Fuzzifikasi
        $fuzzyfikasi = array();
        $fuzzy_user = $request->input('fuzzy_user');
        foreach($fuzzy_user as $row) {
            $temp = array();
            // dump($row);
            if ($row < 30) {
                array_push($temp, 1);
            } elseif($row < 50) {
                array_push($temp, (50 - $row)/(50 - 30));
            } elseif($row > 50) {
                array_push($temp, 0);
            }
    
            if($row < 30 || $row > 50) {
                array_push($temp, 0);
            }elseif($row < 30 || $row < 50) {
                array_push($temp, ($row - 30) / (50 - 30));
            } elseif($row < 50 || $row < 70) {
                array_push($temp, (70 - $row)/(70-30));
            }elseif($row == 50){
                array_push($temp, 1);
            }
    
            if($row < 50) {
                array_push($temp, 0);
            }elseif($row < 70) {
                array_push($temp, ($row - 50)/(50-70));
            }else {
                array_push($temp, 1);
            }
            $fuzzyfikasi[] = $temp;
        }

        // Inferensi
        $inferensi = array();
        $rule01 = $fuzzyfikasi[0][2];
        // dump($rule01);

        $aturan = AturanTsukamoto::with(['himpunan', 'penyakit'])->get();

        dump($aturan);
        foreach($aturan as $row){
            $temp = array();
            // dump($row->kode);
            foreach($row->himpunan as $index=>$h) {
                // dump($index);
                if($h->gejala->kode == 'G01') {
                    if ($h->himpunan == "kurang yakin") {
                        array_push($temp, $fuzzyfikasi[$index][0]);
                    }elseif ($h->himpunan == "cukup yakin") {
                        array_push($temp, $fuzzyfikasi[$index][1]);
                    }elseif ($h->himpunan == "sangat yakin") {
                        array_push($temp, $fuzzyfikasi[$index][2]);
                    }
                    // dump($h->himpunan);
                }elseif($h->gejala->kode == 'G02') {
                    if ($h->himpunan == "kurang yakin") {
                        array_push($temp, $fuzzyfikasi[$index][0]);
                    }elseif ($h->himpunan == "cukup yakin") {
                        array_push($temp, $fuzzyfikasi[$index][1]);
                    }elseif ($h->himpunan == "sangat yakin") {
                        array_push($temp, $fuzzyfikasi[$index][2]);
                    }
                    // dump($h->himpunan);
                }elseif($h->gejala->kode == 'G03') {
                    if ($h->himpunan == "kurang yakin") {
                        array_push($temp, $fuzzyfikasi[$index][0]);
                    }elseif ($h->himpunan == "cukup yakin") {
                        array_push($temp, $fuzzyfikasi[$index][1]);
                    }elseif ($h->himpunan == "sangat yakin") {
                        array_push($temp, $fuzzyfikasi[$index][2]);
                    }
                    // dump($h->himpunan);
                }elseif($h->gejala->kode == 'G04') {
                    if ($h->himpunan == "kurang yakin") {
                        array_push($temp, $fuzzyfikasi[$index][0]);
                    }elseif ($h->himpunan == "cukup yakin") {
                        array_push($temp, $fuzzyfikasi[$index][1]);
                    }elseif ($h->himpunan == "sangat yakin") {
                        array_push($temp, $fuzzyfikasi[$index][2]);
                    }
                    // dump($h->himpunan);
                }elseif($h->gejala->kode == 'G05') {
                    if ($h->himpunan == "kurang yakin") {
                        array_push($temp, $fuzzyfikasi[$index][0]);
                    }elseif ($h->himpunan == "cukup yakin") {
                        array_push($temp, $fuzzyfikasi[$index][1]);
                    }elseif ($h->himpunan == "sangat yakin") {
                        array_push($temp, $fuzzyfikasi[$index][2]);
                    }
                    // dump($h->himpunan);
                }elseif($h->gejala->kode == 'G06') {
                    if ($h->himpunan == "kurang yakin") {
                        array_push($temp, $fuzzyfikasi[$index][0]);
                    }elseif ($h->himpunan == "cukup yakin") {
                        array_push($temp, $fuzzyfikasi[$index][1]);
                    }elseif ($h->himpunan == "sangat yakin") {
                        array_push($temp, $fuzzyfikasi[$index][2]);
                    }
                    // dump($h->himpunan);
                }elseif($h->gejala->kode == 'G07') {
                    if ($h->himpunan == "kurang yakin") {
                        array_push($temp, $fuzzyfikasi[$index][0]);
                    }elseif ($h->himpunan == "cukup yakin") {
                        array_push($temp, $fuzzyfikasi[$index][1]);
                    }elseif ($h->himpunan == "sangat yakin") {
                        array_push($temp, $fuzzyfikasi[$index][2]);
                    }
                    // dump($h->himpunan);
                }elseif($h->gejala->kode == 'G08') {
                    if ($h->himpunan == "kurang yakin") {
                        array_push($temp, $fuzzyfikasi[$index][0]);
                    }elseif ($h->himpunan == "cukup yakin") {
                        array_push($temp, $fuzzyfikasi[$index][1]);
                    }elseif ($h->himpunan == "sangat yakin") {
                        array_push($temp, $fuzzyfikasi[$index][2]);
                    }
                    // dump($h->himpunan);
                }elseif($h->gejala->kode == 'G09') {
                    if ($h->himpunan == "kurang yakin") {
                        array_push($temp, $fuzzyfikasi[$index][0]);
                    }elseif ($h->himpunan == "cukup yakin") {
                        array_push($temp, $fuzzyfikasi[$index][1]);
                    }elseif ($h->himpunan == "sangat yakin") {
                        array_push($temp, $fuzzyfikasi[$index][2]);
                    }
                    // dump($h->himpunan);
                }elseif($h->gejala->kode == 'G10') {
                    if ($h->himpunan == "kurang yakin") {
                        array_push($temp, $fuzzyfikasi[$index][0]);
                    }elseif ($h->himpunan == "cukup yakin") {
                        array_push($temp, $fuzzyfikasi[$index][1]);
                    }elseif ($h->himpunan == "sangat yakin") {
                        array_push($temp, $fuzzyfikasi[$index][2]);
                    }
                    // dump($h->himpunan);
                }
                
                // dump($h->gejala->kode);
                // dump($h->himpunan);
            }
            $inferensi[] = $temp;
        }

        dump($inferensi);

        foreach($inferensi as $index=>$row) {
            dump(min($row));
            if ($index <= 20) {
                dump((60 - (min($row)) * (60-40)));
            } else {
                dump( ($row * (60-40)) + 40 );
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KonsultasiTsukamoto  $konsultasiTsukamoto
     * @return \Illuminate\Http\Response
     */
    public function show(KonsultasiTsukamoto $konsultasiTsukamoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KonsultasiTsukamoto  $konsultasiTsukamoto
     * @return \Illuminate\Http\Response
     */
    public function edit(KonsultasiTsukamoto $konsultasiTsukamoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KonsultasiTsukamoto  $konsultasiTsukamoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KonsultasiTsukamoto $konsultasiTsukamoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KonsultasiTsukamoto  $konsultasiTsukamoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(KonsultasiTsukamoto $konsultasiTsukamoto)
    {
        //
    }
}
