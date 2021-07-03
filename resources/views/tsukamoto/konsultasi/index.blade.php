@extends('adminlte::page')

@section('title', 'Sistem Pakar ISPA')

@section('content_header')
    <div class="d-flex justify-content-between">
        <div>
            <h5>Konsultasi Metode Fuzzy Tsukamoto</h5>
        </div>
        <div>
            <a href="{{ route('konsultasi-tsukamoto.create') }}">
                <button type="button" class="btn btn-primary">Konsultasi</button>
            </a>
        </div>
    </div>
@stop

@section('content')
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
        @foreach ($konsulTsu as $row)
            <tr>
                <th scope="col">{{ $loop->iteration }}</th>
                <td>{{ $row->user->name }}</td>
                <td>{{ $row->created_at }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="{{ route('konsultasi-tsukamoto.show', $row->id) }}" class="btn-secondary">
                            <button type="button" class="btn btn-secondary">Detail</button>
                        </a>
                        <form action="{{ route('konsultasi-tsukamoto.destroy', $row->id) }}" method="POST" class="btn-secondary">
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