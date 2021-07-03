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
            <th scope="col">No</th>
            <th scope="col">Diagnosa</th>
            <th scope="col">Nilai</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($penyakit as $index=>$row)
                <tr>
                    <th scope="col">{{ $loop->iteration }}</th>
                    <td>{{ $row->nama }}</td>
                    <td>{{ number_format($konsultasiTsukamoto->nilai, 2) }}</td>
                </tr>
                @if ($index == 0)
                    @php
                        break;
                    @endphp
                @endif
            @endforeach
         
        </tbody>
      </table>
      <div class="mt-4 mb-3">
          <button type="button" onclick="window.print()" class="btn btn-primary">Cetak</button>
        </div>
    </div>
  </div>
@stop