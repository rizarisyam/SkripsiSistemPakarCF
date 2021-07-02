@extends('layouts.user')

@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header">{{$konsultasi->user->name}}</h5>
        <div class="card-body">
          <h5 class="card-title mb-4">Gejala yang dirasakan</h5>
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Gejala</th>
                <th scope="col">Keterangan</th>
                <th scope="col">CF User</th>
              </tr>
            </thead>
            <tbody>
                @foreach (json_decode($konsultasi->cf_user) as $key=>$row)
                    
                
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $gejala[$key]->nama }}</td>
                <td>
                    @switch($row)
                        @case(0)
                        {{"Tidak Yakin"}}
                            @break
                        @case(0.2)
                        {{"Kurang Yakin"}}  
                            @break
                        @case(0.4)
                        {{"Sedikit Yakin"}}
                            @break
                        @case(0.6)
                        {{"Cukup Yakin"}}
                            @break
                        @case(0.8)
                        {{"Yakin"}}
                            @break
                        @case(1)
                        {{"Sangat Yakin"}}
                            @break
                        @default
                        {{"N/A"}} 
                    @endswitch
                </td>
                <td>{{ $row }}</td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
          <p class="card-text m-4">Hasil Diagnosa</p>
    
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Dignosa</th>
                <th scope="col">Persentase</th>
              </tr>
            </thead>
            <tbody>
                @foreach (json_decode($konsultasi->nilai) as $key=>$row)
                    
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $penyakit[$key]->nama }}</td>
                    <td>{{ $row }}%</td>
                    @endforeach
                </tr>
             
            </tbody>
          </table>
          <div class="mt-4 mb-3">
              <button type="button" onclick="window.print()" class="btn btn-primary">Cetak</button>
            </div>
        </div>
      </div>
</div>
@endsection