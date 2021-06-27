
@extends('adminlte::page')

@section('title', 'Sistem Pakar ISPA')

@section('content_header')
    <div class="d-flex justify-content-between">
        <div>
            <h3>Tambah Aturan ISPA</h3>
        </div>
    </div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-6">

            
        <form method="POST" action="{{ route('aturan.store') }}">
            @csrf
            <div class="form-group">
              <label for="kode">Kode Penyakit</label>
              <input type="text" name="kode" class="form-control" id="kode" placeholder="Enter Kode Aturan">
              
            </div>

            <div class="form-group">
                <label for="">Pilih Gejala</label>
                <select class="form-control js-example-basic-multiple" name="gejala_id[]" multiple="multiple">
                    @foreach ($gejala as $row)
                    <option value="{{ $row->id }}">[{{$row->kode}}]{{ $row->nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- @foreach ($gejala as $item)
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="checkbox" name="gejala_id[]" value="{{ $item->kode }}">
                  </div>
                </div>
                <input type="text" class="form-control" value="{{ $item->nama }}" disabled>
            </div>
            @endforeach --}}

            <div class="form-group">
                <label for="nama">Penyakit</label>
                <select name="penyakit_id" id="" class="form-control">
                    <option value="">Pilih Penyakit</option>t
                    @foreach ($penyakit as $row)
                        <option value="{{ $row->id }}">{{ $row->nama }}</option>
                    @endforeach
                </select>
              </div>

            <div class="form-group">
              <label for="nama">Nilai CF</label>
              <input type="text" name="cf" class="form-control" id="nama" placeholder="Enter Nilai CF">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
    </div>
  </div>
        
   
    

@stop

@section('js')
    <script> 
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
@stop