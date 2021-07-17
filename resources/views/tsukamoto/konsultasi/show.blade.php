@extends('adminlte::page')

@section('title', 'Sistem Pakar ISPA')

@section('content_header')
    <div>

    </div>
@stop

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
            {{-- @foreach ($penyakit as $index=>$row) --}}
                <tr>
                    <th scope="col">{{ $loop->iteration }}</th>
                    <td>{{ $konsultasiTsukamoto->nilai }}</td>
                    <td>
                        @if ($konsultasiTsukamoto->nilai > 0 && $konsultasiTsukamoto->nilai < 60)
                            {{"ISPA RINGAN"}}                            
                        @elseif($konsultasiTsukamoto->nilai > 40 && $konsultasiTsukamoto->nilai < 100)
                            {{"ISPA BERAT"}}
                        @endif
                    </td>
                    <td>{{ $konsultasiTsukamoto->nilai }}</td>
                </tr>
                {{-- @if ($index == 0)
                    @php
                        break;
                    @endphp
                @endif --}}
            {{-- @endforeach --}}
         
        </tbody>
      </table>
      <div class="mt-4 mb-3">
          <button type="button" onclick="window.print()" class="btn btn-primary">Cetak</button>
        </div>
    </div>
  </div>
@stop