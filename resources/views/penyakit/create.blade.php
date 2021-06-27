@extends('adminlte::page')

@section('title', 'Sistem Pakar ISPA')

@section('content_header')
    <div class="d-flex justify-content-between">
        <div>
            <h3>Tambah Penyakit ISPA</h3>
        </div>
    </div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-6">

            
        <form method="POST" action="{{ route('penyakit.store') }}">
            @csrf
            <div class="form-group">
              <label for="kode">Kode Penyakit</label>
              <input type="text" name="kode" class="form-control" id="kode" placeholder="Enter Kode Penyakit">
              
            </div>
            <div class="form-group">
              <label for="nama">Nama Penyakit</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter Penyakit">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
    </div>
  </div>
        
   
    

@stop