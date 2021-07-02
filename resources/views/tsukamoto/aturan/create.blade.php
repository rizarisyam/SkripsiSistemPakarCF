
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

            
        <form method="POST" action="{{ route('aturan-tsukamoto.store') }}">
            @csrf
            <div class="form-group">
              <label for="kode">Kode Penyakit</label>
              <input type="text" name="kode" class="form-control" id="kode" placeholder="Enter Kode Aturan">
              
            </div>

            <div class="form-group">
                <label for="">Gejala</label>
            </div>

            @foreach ($gejala as $row)
            {{-- <label for="basic-url" style="margin-top: .5rem">Your vanity URL</label> --}}
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">[{{ $row->kode}}]{{ $row->nama }}</span>
            </div>
            <select name="himpunan_id[]" id="" class="custom-select">
                @foreach ($row->himpunan as $himpunan)
                
                <option value="{{ $himpunan->id }}">{{ $himpunan->himpunan }}</option>
                @endforeach
            </select>
            
            </div>
            @endforeach

            

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