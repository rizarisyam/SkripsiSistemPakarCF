@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between">
        <div>
            <h3>Tambah Himpunan</h3>
        </div>
    </div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-6">

            
        <form method="POST" action="{{ route('himpunan.store') }}">
            @csrf
            <div class="form-group">
                <label for="">Gejala</label>
                <select name="gejala_id" id="" class="form-control">
                    <option value="">Pilih Gejala</option>
                    @foreach ($gejala as $row)
                        <option value="{{ $row->id }}">[{{ $row->kode}}]{{ $row->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
              <label for="himpunan">Himpunan</label>
              <input type="text" name="himpunan" class="form-control" id="himpunan" placeholder="Enter Himpunan">
              
            </div>
            <div class="form-group">
              <label for="semesta">Semesta</label>
              <input type="text" name="semesta" class="form-control" id="semesta" placeholder="Semesta">
            </div>

            <div class="form-group">
                <label for="domain">Domain</label>
                <input type="text" name="domain" class="form-control" id="domain" placeholder="Domain">
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
    </div>
  </div>
        
   
    

@stop