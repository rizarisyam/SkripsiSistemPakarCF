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
        
        
        
    </tbody>
  </table>
@stop