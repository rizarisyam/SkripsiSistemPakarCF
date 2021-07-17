@extends('layouts.user')

{{-- @section('title', 'Sistem Pakar ISPA')

@section('content_header')
    <div>

    </div>
@stop --}}

@section('content')
<div class="card">
    <h5 class="card-header">{{$konsultasiTsukamoto->user->name}}</h5>
    <div class="card-body">
      <h5 class="card-title mb-4">Gejala yang dirasakan</h5>
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Gejala</th>
            <th scope="col">Fuzzy User</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($gejala as $index=>$row)
                <tr>
                    <th scope="col">{{ $loop->iteration }}</th>
                    <td>{{ $row->nama }}</td>
                    <td>{{ json_decode($konsultasiTsukamoto->fuzzy_user)[$index] }}</td>
                </tr>
            @endforeach
         
        </tbody>
      </table>

      {{-- fuzzyfikasi --}}
      <h5 class="card-title mb-4">Fuzzyfikasi</h5>
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Variabel</th>
            <th scope="col">Himpunan</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($fuzzyfikasi as $index=>$row)
                <tr>
                    <th scope="col">{{ $loop->iteration }}</th>
                    <td>{{ $gejala[$index]->nama }}</td>
                    <td>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">&#181; Kurang yakin [{{json_decode($konsultasiTsukamoto->fuzzy_user)[$index]}}] = {{ $row[0] }}</li>
                            <li class="list-group-item">&#181; Cukup yakin [{{json_decode($konsultasiTsukamoto->fuzzy_user)[$index]}}] = {{ $row[1] }}</li>
                            <li class="list-group-item">&#181; Sangat yakin [{{json_decode($konsultasiTsukamoto->fuzzy_user)[$index]}}] = {{ $row[2] }}</li>
                          </ul>
                        
                    </td>
                    
                </tr>
            @endforeach
         
        </tbody>
      </table>

      {{-- Inferensi --}}
      <h5 class="card-title mb-4">Inferensi</h5>
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode</th>
            <th scope="col">Aturan</th>
            <th scope="col">Nilai</th>
            <th scope="col">&alpha; Predikat</th>
            <th scope="col">Zi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($aturanTsu as $index=>$a)
            <tr>
                <th scope="col">{{ $loop->iteration }}</th>
                <td>{{ $a->kode }}</td>
                <td>
                    @foreach ($a->himpunan as $h)
                    ([{{ $h->gejala->kode }}] {{$h->gejala->nama}} 
                    <span class="font-weight-bold">IS</span>
                    {{$h->himpunan}})
                    <span class="font-weight-bold">AND</span>      
                @endforeach
                </td>
                <td>
                    {{implode(",", $inferensi[$index])}}
                </td>
                <td>{{ $predikat[$index] }}</td>
                <td>{{ $z[$index] }}</td>
            </tr>
            @endforeach
         
        </tbody>
      </table>

      {{-- Defuzzyfikasi --}}
      <h5 class="card-title mb-4">Defuzzyfikasi</h5>
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Rumus</th>
            <th scope="col">Defauzzifikasi</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td>
                    <img src="{{ asset('img/fuzzy-rumus.jpg') }}" alt="" style="width: 200px">
                </td>
                <td>
                    {{-- @foreach ($aturanTsu as $row)
                    + ({{ $predikat[$index]}} &#10761; {{ $z[$index] }}) 
                    @endforeach
                    /
                    @foreach ($aturanTsu as $row)
                    {{ $predikat[$index]}} 
                    @endforeach --}}
                    <div class="d-flex">
                        <div style="margin-left: 20px; padding-top: 10px;">
                            <span>&equals;</span>
                        </div>
                        <div>
                            <span style="margin-left: 20px;">{{$atas}}</span>
                            <hr style="width: 50px; margin-top: 1px;">
                            <span style="margin-left: 20px">{{$bawah}}</span>
                        </div>
                        <div style="margin-left: 20px;">
                            <span>&equals; {{ $defuzzifikasi }}</span>
                        </div>
                    </div>
                    
                </td>
            </tr>
         
        </tbody>
      </table>


      {{-- hasil diagnosa --}}
      <h5 class="card-title mb-4">Hasil Diagnosa</h5>
      <table class="table">
        <thead class="thead-light">
          <tr>
            {{-- <th scope="col">No</th> --}}
            <th scope="col">Diagnosa</th>
            <th scope="col">Nilai</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                {{-- <th scope="col">{{ $loop->iteration }}</th> --}}
                {{-- <td>{{ $konsultasiTsukamoto->nilai }}</td> --}}
                <td>
                    @if ($konsultasiTsukamoto->nilai > 0 && $konsultasiTsukamoto->nilai < 60)
                        {{"ISPA RINGAN"}}                            
                    @elseif($konsultasiTsukamoto->nilai > 40 && $konsultasiTsukamoto->nilai < 100)
                        {{"ISPA BERAT"}}
                    @endif
                </td>
                <td>{{ number_format($konsultasiTsukamoto->nilai, 2) }}</td>
            </tr>
            <tr>
                <td colspan="3">
                    <h6>Solusi :</h6>
                    <ul>
                        <li>Memperbanyak istirahat dan konsumsi air putih untuk mengencerkan dahak, sehingga lebih mudah untuk dikeluarkan.</li>
                        <li>Mengonsumsi minuman lemon hangat atau madu untuk membantu meredakan batuk.
                        </li>
                        <li>Berkumur dengan air hangat yang diberi garam, jika mengalami sakit tenggorokan.</li>
                        <li>Menghirup uap dari semangkuk air panas yang telah dicampur dengan minyak kayu putih atau mentol untuk meredakan hidung yang tersumbat.</li>
                        <li>Memposisikan kepala lebih tinggi ketika tidur dengan menggunakan bantal tambahan, untuk melancarkan pernapasan.</li>
                    </ul>
                </td>
            </tr>
         
        </tbody>
      </table>
      <div class="mt-4 mb-3">
          <button type="button" onclick="window.print()" class="btn btn-primary">Cetak</button>
        </div>
    </div>
  </div>
@stop