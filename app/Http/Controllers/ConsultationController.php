<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Disease;
use App\Models\Rule;
use App\Models\Symptom;
use Illuminate\Http\Request;


class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dump(auth()->user()->role);
            // $konsultasi = Consultation::with(['user'])->whereHas('user', function($q) {
            //     $q->where('role', auth()->user()->role);
            // })->get();
    
        // dd($konsultasi);
        if (auth()->user()->role == 'admin') {
            $konsultasi = Consultation::all();
            return view('konsultasi.index', compact('konsultasi'));
        } else {
            $konsultasi = Consultation::with(['user'])->whereHas('user', function($q) {
                $q->where('role', auth()->user()->role);
            })->get();
            return view('user.konsultasi.index', compact('konsultasi'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gejala = Symptom::all();

       if (auth()->user()->role == 'admin') {
           return view('konsultasi.create', compact('gejala'));
       } else {
           return view('user.konsultasi.create', compact('gejala'));
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aturan = Rule::with(['gejala'])->get();
        // rule1
        // g01, g02, g03, g04, g05, g06
        $cfUser = $request->input('nilai');
        
        $CF01 = doubleval(min([$cfUser[0],$cfUser[1],$cfUser[2],$cfUser[3],$cfUser[4],$cfUser[5]])) * 1.0;
        $CF02 = doubleval(min([$cfUser[0],$cfUser[1]])) * 0.2;
        $CF03 = doubleval(min([$cfUser[0],$cfUser[1],$cfUser[2]])) * 0.4;
        $CF04 = doubleval(min([$cfUser[0],$cfUser[1],$cfUser[2],$cfUser[3]])) * 0.6;
        $CF05 = doubleval(min([$cfUser[0],$cfUser[1],$cfUser[2],$cfUser[3],$cfUser[4]])) * 0.8;
        $CF06 = doubleval(min([$cfUser[6],$cfUser[7],$cfUser[8],$cfUser[9]])) * 1.0;
        $CF07 = doubleval(min([$cfUser[6],$cfUser[7]])) * 0.2;
        $CF08 = doubleval(min([$cfUser[6],$cfUser[7],$cfUser[8]])) * 0.4;

        // dump($CF01);
        // dump($CF02);
        // dump($CF03);
        // dump($CF04);
        // dump($CF05);
        // dump($CF06);
        // dump($CF07);
        // dump($CF08);
        $CFTotal = [];
        $CFcombine1 = ($CF01+$CF02+$CF03+$CF04+$CF05) * (1 - max([$CF01,$CF02,$CF03,$CF04,$CF05]));
        $CFcombine1 = number_format($CFcombine1, 2) * 100;
        $CFcombine2 = ($CF06+$CF07+$CF08) * (1 - max([$CF06,$CF07,$CF08]));
        $CFcombine2 = number_format($CFcombine2, 2) * 100;
        array_push($CFTotal, $CFcombine1);
        array_push($CFTotal, $CFcombine2);

        // dump($CFTotal);

        $konsultasi = Consultation::create([
            'user_id' => $request->input('user_id'),
            'nilai' => json_encode($CFTotal),
            'cf_user' => json_encode($request->input('nilai'))
        ]);
        
        

        return redirect()->route('konsultasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gejala = Symptom::all();
        $penyakit = Disease::all();
        $konsultasi = Consultation::find($id);
        if (auth()->user()->role == 'user') {
            return view('user.konsultasi.show', compact(['konsultasi', 'gejala', 'penyakit']));

        }
        return view('konsultasi.show', compact(['konsultasi', 'gejala', 'penyakit']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $konsultasi = Consultation::find($id);
        $konsultasi->delete();
        return redirect()->route('konsultasi.index');
    }

    public function rumus($id)
    {
        $gejala = Symptom::all();
        $penyakit = Disease::all();
        $konsultasi = Consultation::find($id);
        $aturan = Rule::all();
        $cf_user = json_decode($konsultasi->cf_user);

        $cfpakar = [1.0, 0.2, 0.4, 0.6, 0.8, 1.0, 0.2, 0.4];

        $a_predikat = [
            [$cf_user[0],$cf_user[1],$cf_user[2],$cf_user[3],$cf_user[4],$cf_user[5]],
            [$cf_user[0],$cf_user[1]],
            [$cf_user[0],$cf_user[1],$cf_user[2]],
            [$cf_user[0],$cf_user[1],$cf_user[2],$cf_user[3]],
            [$cf_user[0],$cf_user[1],$cf_user[2],$cf_user[3],$cf_user[4]],
            [$cf_user[6],$cf_user[7],$cf_user[8],$cf_user[9]],
            [$cf_user[6],$cf_user[7]],
            [$cf_user[6],$cf_user[7],$cf_user[8]],
        ];

        $CF01 =doubleval(min([$cf_user[0],$cf_user[1],$cf_user[2],$cf_user[3],$cf_user[4],$cf_user[5]])) * 1.0;
        $CF02 =doubleval(min([$cf_user[0],$cf_user[1]])) * 0.2;
        $CF03 =doubleval(min([$cf_user[0],$cf_user[1],$cf_user[2]])) * 0.4;
        $CF04 =doubleval(min([$cf_user[0],$cf_user[1],$cf_user[2],$cf_user[3]])) * 0.6;
        $CF05 =doubleval(min([$cf_user[0],$cf_user[1],$cf_user[2],$cf_user[3],$cf_user[4]])) * 0.8;
        $CF06 =doubleval(min([$cf_user[6],$cf_user[7],$cf_user[8],$cf_user[9]])) * 1.0;
        $CF07 =doubleval(min([$cf_user[6],$cf_user[7]])) * 0.2;
        $CF08 =doubleval(min([$cf_user[6],$cf_user[7],$cf_user[8]])) * 0.4;

        $fakta_baru = [
            [doubleval(min([$cf_user[0],$cf_user[1],$cf_user[2],$cf_user[3],$cf_user[4],$cf_user[5]])) * 1.0],
            [doubleval(min([$cf_user[0],$cf_user[1]])) * 0.2],
            [doubleval(min([$cf_user[0],$cf_user[1],$cf_user[2]])) * 0.4],
            [doubleval(min([$cf_user[0],$cf_user[1],$cf_user[2],$cf_user[3]])) * 0.6],
            [doubleval(min([$cf_user[0],$cf_user[1],$cf_user[2],$cf_user[3],$cf_user[4]])) * 0.8],
            [doubleval(min([$cf_user[6],$cf_user[7],$cf_user[8],$cf_user[9]])) * 1.0],
            [doubleval(min([$cf_user[6],$cf_user[7]])) * 0.2],
            [doubleval(min([$cf_user[6],$cf_user[7],$cf_user[8]])) * 0.4],
        ];

        // dump(implode("",$fakta_baru[0]));
        // dump("{$CF01},{$CF02},{$CF03},{$CF04},{$CF05}");
        // dump(strtr($CF04,$CF05,$CF06));
        $CFGab1 = ($CF01 + $CF02 + $CF03 + $CF04 + $CF05) * (1 - max([$CF01,$CF02,$CF03,$CF04,$CF05]));
        $CFGab2 = ($CF06 + $CF07 + $CF08) * (1 - max([$CF06,$CF07,$CF08]));
        
        $CFGabungan = array();
        array_push($CFGabungan, $CFGab1);
        array_push($CFGabungan, $CFGab2);

        // dd($CFGabungan);
        // dump($cfpakar);

        if (auth()->user()->role == 'user') {
            return view('user.konsultasi.rumus', compact([
                'konsultasi',
                'gejala', 
                'penyakit', 
                'aturan',
                'cf_user', 
                'a_predikat',
                'fakta_baru',
                'CFGabungan',
                'cfpakar'
                ]));

        }
        return view('');
    }
}
