

@extends('adminlte::page')

@section('title', 'Sistem Pakar ISPA')

@section('content_header')
    <div class="d-flex justify-content-between">
        <div>
            <h3>Kelola Aturan ISPA</h3>
        </div>
        <div>
            <a href="{{ route('aturan-tsukamoto.create') }}">
                <button type="button" class="btn btn-primary">Tambah</button>
            </a>
        </div>
    </div>
@stop

@section('content')
<table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kode</th>
        <th scope="col">Aturan</th>
        <th scope="col">Penyakit</th>
        <th scope="col">Aksi</>
      </tr>
    </thead>
    <tbody>
        @foreach ($aturan as $row)
        <tr>

        
            <th scope="col">{{ $loop->iteration }}</th>
            <td>{{ $row->kode }}</td>
            <td>
                <span class="font-weight-bold">IF</span>
                    @foreach ($row->himpunan as $himpunan)
                    ([{{ $himpunan->gejala->kode }}] {{$himpunan->gejala->nama}} 
                    <span class="font-weight-bold">IS</span>
                    {{$himpunan->himpunan}})
                    <span class="font-weight-bold">AND</span>          
                    @endforeach
                </ul>
                   
            </td>
            <td>{{ $row->penyakit->nama }}</td>
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <form action="{{ route('aturan-tsukamoto.destroy', $row->id) }}" method="POST" class="btn-secondary">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary">Hapus</button>
                    </form>
                    
                    
                </div>
            </td>
        </tr>
        @endforeach
     
    </tbody>
  </table>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop