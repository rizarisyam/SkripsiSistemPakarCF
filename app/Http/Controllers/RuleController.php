<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Rule;
use App\Models\Symptom;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aturan = Rule::with(['gejala'])->get();
        $gejala = Symptom::all();

        return view('aturan.index', [
            'gejala' => $gejala,
            'aturan' => $aturan
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gejala = Symptom::all();
        $penyakit = Disease::all();
        return view('aturan.create', compact(['gejala','penyakit']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aturan = Rule::create([
            'kode' => strtoupper($request->kode),
            'penyakit_id' => $request->input('penyakit_id'),
            'cf' => $request->cf
        ]);

        $aturan->gejala()->attach($request->input('gejala_id'));


        return redirect()->route('aturan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function show(Rule $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aturan = Rule::find($id);
        $gejala = Symptom::all();
        $penyakit = Disease::all();

        return view('aturan.edit', [
            'aturan' => $aturan,
            'gejala' => $gejala,
            'penyakit' => $penyakit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aturan = Rule::find($id);
        // array_splice($aturan->gejala_id, 0);
        $aturan->update([
            'kode' => $request->kode,
            'penyakit_id' => $request->input('penyakit_id'),
            'cf' => $request->cf
        ]);

        $aturan->gejala()->sync($request->input('gejala_id'));

        return redirect()->route('aturan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aturan = Rule::find($id);
        $aturan->delete();

        return redirect()->route('aturan.index');
    }
}
