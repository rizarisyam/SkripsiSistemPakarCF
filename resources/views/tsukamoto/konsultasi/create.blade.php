@extends('adminlte::page')

@section('title', 'Sistem Pakar ISPA')

@section('content_header')
    <h5>Konsultasi Metode Fuzzy Tsukamoto</h5>
@stop

@section('content')
<form action="{{ route('konsultasi-tsukamoto.store') }}" method="post">

    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Gejala</th>
        <th scope="col">Input</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($gejala as $row) 
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
           
            <td>
                <input type="hidden" name="gejala_id[]" value="{{ $row->id }}">
                {{ $row->nama }}
            </td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" name="fuzzy_user[]" value="0">
                </div>
            </td>
            
            @endforeach
        </tr>
      
    </tbody>
    <tfoot>
        
            <td colspan="3" class="" align="right">
                
                    @csrf
                    <button type="submit" class="btn btn-primary">Hitung</button>
                
            
            </td>
        
    </tfoot>
  </table>
</form>
@stop