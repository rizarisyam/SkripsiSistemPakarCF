@extends('adminlte::page')

@section('title', 'Sistem Pakar ISPA')

@section('content_header')
    <div class="d-flex justify-content-between">
        <div>
            <h3>Kelola Penyakit ISPA</h3>
        </div>
        <div>
            <a href="{{ route('penyakit.create') }}">
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
        @forelse ($penyakit as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{$item->kode}}</td>
            <td>{{$item->nama}}</td>
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a href="{{ route('penyakit.edit', $item->id) }}" class="btn-secondary">
                        <button type="button" class="btn btn-secondary">Edit</button>
                    </a>
                    <form action="{{ route('penyakit.destroy', $item->id) }}" method="POST" class="btn-secondary">
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