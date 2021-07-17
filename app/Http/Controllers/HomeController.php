<?php

namespace App\Http\Controllers;

use App\Models\AturanTsukamoto;
use App\Models\Consultation;
use App\Models\Disease;
use App\Models\KonsultasiTsukamoto;
use App\Models\Rule;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $gejala = Symptom::all();
            $penyakit = Disease::all();
            $aturan = Rule::all();
            $aturanTsu = AturanTsukamoto::all();
            $users = User::all();
            $konsul = Consultation::all();
            $konsulTsu = KonsultasiTsukamoto::all();

            return view('home', compact(['gejala', 'penyakit', 'aturan', 'users', 'konsul', 'aturanTsu','konsulTsu']));
        } else {
            $gejala = Symptom::all();
            $penyakit = Disease::all();
            $aturan = Rule::all();
            $users = User::all();
            $konsul = Consultation::all();
            return view('user.index', compact(['gejala', 'penyakit', 'aturan', 'users', 'konsul']));
        }
    }
}
