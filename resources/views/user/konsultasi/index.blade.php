@extends('layouts.user')

@section('content')
<div class="card m-5">
    <div class="card-header d-flex justify-content-between">
        <div>
            <i class="fas fa-table me-1"></i>
        Konsultasi
        </div>
        
        <div class="">
            <a href="{{ route('konsultasi.create') }}">
                <button type="button" class="btn btn-primary">Mulai Konsultasi</button>
            </a>
        </div>
        
    </div>
<div class="card-body">
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($konsultasi as $row)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $row->user->name }}</td>
                <td>{{ date('d F Y', strtotime($row->created_at)) }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="{{ route('konsultasi.show', $row->id) }}" class="btn-secondary">
                            <button type="button" class="btn btn-secondary">Detail</button>
                        </a>
                        <form action="{{ route('konsultasi.destroy', $row->id) }}" method="POST" class="btn-secondary">
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
</div>
</div>
{{-- <table class="table">
    <thead class="thead-light">
        
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        
        @foreach ($konsultasi as $row)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $row->user->name }}</td>
                <td>{{ date('d F Y', strtotime($row->created_at)) }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="{{ route('konsultasi.show', $row->id) }}" class="btn-secondary">
                            <button type="button" class="btn btn-secondary">Detail</button>
                        </a>
                        <form action="{{ route('konsultasi.destroy', $row->id) }}" method="POST" class="btn-secondary">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary">Hapus</button>
                        </form>
                        
                        
                    </div>
                </td>
            </tr>
        @endforeach
        
    </tbody>
  </table> --}}
  
@endsection