@extends('adminlte::page')

@section('title', 'Sistem Pakar ISPA')

@section('content_header')
    <div class="d-flex justify-content-between">
        <div>
            <h3>Edit Penyakit ISPA</h3>
        </div>
    </div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-6">

            
        <form method="POST" action="{{ route('penyakit.update', $penyakit->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="kode">Kode Gejala</label>
              <input type="text" name="kode" value="{{$penyakit->kode}}" class="form-control" id="kode" placeholder="Enter Kode Penyakit">
              
            </div>
            <div class="form-group">
              <label for="nama">Nama Penyakit</label>
              <input type="text" name="nama" value="{{ $penyakit->nama }}" class="form-control" id="nama" placeholder="Enter Penyakit">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
    </div>
  </div>
        
   
    

@stop