@extends('layouts.user')

@section('content')
<div class="card m-5">
    <div class="card-header d-flex justify-content-between">
        <div>
            <i class="fas fa-table me-1"></i>
        Konsultasi
        </div>
        
        <div class="">
            <a href="{{ route('konsultasi-tsukamoto.create') }}">
                <button type="button" class="btn btn-primary">Mulai Konsultasi</button>
            </a>
        </div>
        
    </div>
<div class="card-body">
    <table class="table">
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
                    <th scope="col">{{ $loop->iteration }}</th>
                    <td>{{ $row->user->name }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a href="{{ route('konsultasi-tsukamoto.show', $row->id) }}" class="btn-secondary">
                                <button type="button" class="btn btn-secondary">Detail</button>
                            </a>
                            
                            <a href="{{ route('konsulTsu.rumus', $row->id) }}" class="btn-secondary">
                                <button type="button" class="btn btn-secondary">Rumus</button>
                            </a>
                            
                        </div>
                    </td>
                </tr>
            @endforeach
            
            
        </tbody>
      </table>
</div>
</div>

  
@endsection