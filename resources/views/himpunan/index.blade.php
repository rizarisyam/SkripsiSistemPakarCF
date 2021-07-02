
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between">
        <div>
            <h1>Kelola Himpunan</h1>
        </div>
        <div>
            <a href="{{ route('himpunan.create') }}">
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
        <th scope="col">Gejala</th>
        <th scope="col">Himpunan</th>
        <th scope="col">Semesta</th>
        <th scope="col">Domain</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($gejala as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ Str::ucfirst($row->nama) }}</td>
                <td>
                    <ul class="list-group list-group-flush">
                        @foreach ($row->himpunan as $himpunan)
                        <li class="list-group-item">{{$himpunan->himpunan}}</li>                 
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group list-group-flush">
                        @foreach ($row->himpunan as $himpunan)
                        <li class="list-group-item">{{implode("-",json_decode($himpunan->semesta))}}</li>                 
                        @endforeach
                    </ul>
                    
                </td>

                <td>
                    <ul class="list-group list-group-flush">
                        @foreach ($row->himpunan as $himpunan)
                        <li class="list-group-item">{{implode("-",json_decode($himpunan->domain))}}</li>                 
                        @endforeach
                    </ul>
                    
                </td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <form action="{{ route('himpunan.destroy', $row->id) }}" method="POST" class="btn-secondary">
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