@extends('layouts.user')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
          <p>{{ Auth::user()->name }} | Konsultasi</p>
        </div>
        <div class="card-body">
            <form action="{{ route('konsultasi.store') }}" method="post">
                @csrf
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Gejala</th>
                    <th scope="col">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @foreach ($gejala as $row) 
                    <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                   <td>{{ $row->kode }}</td>
                    <td>
                        <input type="hidden" name="gejala_id[]" value="{{ $row->id }}">
                        {{ $row->nama }}
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-4">
        
                            
                        <div class="form-group">
                            <select name="nilai[]" class="form-control" id="">
                                <option value="0">Tidak Yakin [0]</option>
                                <option value="0.2">Kurang Yakin [0.2]</option>
                                <option value="0.4">Sedikit Yakin [0.4]</option>
                                <option value="0.6">Cukup Yakin [0.6]</option>
                                <option value="0.8">Yakin [0.8]</option>
                                <option value="1.0">Sangat Yakin [1.0]</option>
                            </select>
                        </div>
        
                        
                    </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Konsultasi</button>
        </div>
    </form> 
        </div>
      </div>
</div>


{{-- <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Gejala</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('konsultasi.store') }}" method="post">
            @foreach ($gejala as $row) 
            <tr>
            <th scope="row">{{ $loop->iteration }}</th>
           
            <td>
                <input type="hidden" name="gejala_id[]" value="{{ $row->id }}">
                {{ $row->nama }}
            </td>
            <td>
                <div class="row">
                    <div class="col-4">

                    
                <div class="form-group">
                    <select name="nilai[]" class="form-control" id="">
                        <option value="0">Tidak Yakin [0]</option>
                        <option value="0.2">Kurang Yakin [0.2]</option>
                        <option value="0.4">Sedikit Yakin [0.4]</option>
                        <option value="0.6">Cukup Yakin [0.6]</option>
                        <option value="0.8">Yakin [0.8]</option>
                        <option value="1.0">Sangat Yakin [1.0]</option>
                    </select>
                </div>

                
            </div>
                </div>
            </td>
        </tr>
        @endforeach
        
    </form>
    </tbody>
    <tfoot>
        
            <td colspan="3" class="" align="right">
                
                    @csrf
                    <button type="submit" class="btn btn-primary">Hitung</button>
                
            
            </td>
        
    </tfoot>
  </table> --}}
@endsection