@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between">
        <div>
            <h1>Kelola Gejala</h1>
        </div>
        <div>
            <a href="{{ route('gejala.create') }}">
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
        <th scope="col">Nama</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($gejala as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{$item->kode}}</td>
            <td>{{$item->nama}}</td>
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a href="{{ route('gejala.edit', $item->id) }}" class="btn-secondary">
                        <button type="button" class="btn btn-secondary">Edit</button>
                    </a>
                    <form action="{{ route('gejala.destroy', $item->id) }}" method="POST" class="btn-secondary">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary">Hapus</button>
                    </form>
                    
                    
                </div>
            </td>
          </tr>
        @empty
            <td colspan="4" class="text-center">Data tidak ditemukan...</td>
        @endforelse
     
    </tbody>
  </table>
@stop