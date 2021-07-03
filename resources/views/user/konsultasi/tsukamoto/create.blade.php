@extends('layouts.user')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
          <p>{{ Auth::user()->name }} | Konsultasi</p>
        </div>
        <div class="card-body">
            <form action="{{ route('konsultasi-tsukamoto.store') }}" method="post">
                @csrf
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
        </div>
      </div>
</div>


@endsection