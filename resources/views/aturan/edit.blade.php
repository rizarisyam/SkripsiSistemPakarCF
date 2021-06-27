
@extends('adminlte::page')

@section('title', 'Sistem Pakar ISPA')

@section('content_header')
    <div class="d-flex justify-content-between">
        <div>
            <h3>Edit Aturan ISPA</h3>
        </div>
    </div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-6">

            
        <form method="POST" action="{{ route('aturan.update', $aturan->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="kode">Kode Aturan</label>
              <input type="text" name="kode" value="{{ $aturan->kode }}" class="form-control" id="kode" placeholder="Enter Kode Aturan">
              
            </div>

            <div class="form-group">
                <label for="">Pilih Gejala</label>
                <select class="form-control js-example-basic-multiple" name="gejala_id[]" multiple="multiple">
                    @foreach ($gejala as $row)
                    <option value="{{ $row->id }}">[{{$row->kode}}]{{ $row->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nama">Penyakit</label>
                <select name="penyakit_id" id="" class="form-control">
                    <option value="">Pilih Penyakit</option>t
                    @foreach ($penyakit as $row)
                        <option value="{{ $row->id }}" {{($row->nama == $aturan->penyakit->nama) ? 'selected' : ''}}>{{ $row->nama }}</option>
                    @endforeach
                </select>
              </div>

            <div class="form-group">
              <label for="nama">Nilai CF</label>
              <input type="text" value="{{ number_format($aturan->cf, 2) }}" name="cf" class="form-control" id="nama" placeholder="Enter Nilai CF">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
    </div>
  </div>

  @section('js')
    <script> 
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
@stop
        
   
    

@stop