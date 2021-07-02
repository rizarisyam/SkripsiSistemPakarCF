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

          <p class="card-text m-4">Inferensi</p>
    
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Aturan</th>
                <th scope="col">Gejala</th>
                <th scope="col">Nilai</th>
                <th scope="col">&alpha; predikat</th>
                <th scope="col">Fakta baru</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($aturan as $index=>$row)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row->kode }}</td>
                    <td>
                        <ul class="list-group list-group-flush">
                            @foreach ($row->gejala as $gejala)
                             <li class="list-group-item">[{{$gejala->kode}}] {{$gejala->nama}} 
                            </li>
                            @endforeach
                            
                          </ul>
                    </td>
                    <td>
                        <ul class="list-group list-group-flush">
                            @foreach ($row->gejala as $row)
                             {{-- <li class="list-group-item">[{{$row->kode}}] {{$row->nama}}  --}}
                                {{($row->kode) == 'G01' ? $cf_user[0] : ''}}
                                {{($row->kode) == 'G02' ? $cf_user[1] : ''}}
                                {{($row->kode) == 'G03' ? $cf_user[2] : ''}}
                                {{($row->kode) == 'G04' ? $cf_user[3] : ''}}
                                {{($row->kode) == 'G05' ? $cf_user[4] : ''}}
                                {{($row->kode) == 'G06' ? $cf_user[5] : ''}}
                                {{($row->kode) == 'G07' ? $cf_user[6] : ''}}
                                {{($row->kode) == 'G08' ? $cf_user[7] : ''}}
                                {{($row->kode) == 'G09' ? $cf_user[8] : ''}}
                                {{($row->kode) == 'G10' ? $cf_user[9] : ''}}
                            </li>
                            @endforeach
                            
                          </ul>
                    </td>
                    <td>
                        {{min($a_predikat[$index])}}
                    </td>
                    <td>
                        {{implode("", $fakta_baru[$index])}}
                    </td>
                </tr>
                @endforeach
             
            </tbody>
          </table>

          <h5 class="card-title mb-4">CF Gabungan</h5>
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nilai</th>
              </tr>
            </thead>
            <tbody>
                {{-- @foreach ($cf_gabungan as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                    </tr>
                @endforeach --}}
              
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