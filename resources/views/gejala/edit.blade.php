@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between">
        <div>
            <h3>Edit Gejala</h3>
        </div>
    </div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-6">

            
        <form method="POST" action="{{ route('gejala.update', $gejala->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="kode">Kode Gejala</label>
              <input type="text" name="kode" value="{{$gejala->kode}}" class="form-control" id="kode" placeholder="Enter Kode Gejala">
              
            </div>
            <div class="form-group">
              <label for="nama">Nama Gejala</label>
              <input type="text" name="nama" value="{{ $gejala->nama }}" class="form-control" id="nama" placeholder="Enter Gejala">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
    </div>
  </div>
        
   
    

@stop