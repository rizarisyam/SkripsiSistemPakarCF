@extends('layouts.user')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container">
        <h3>SISTEM PAKAR ISPA</h3>
        <hr>
    </div>
@stop

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fas fa-vial"></i>
        <span class="count-numbers">{{$gejala->count()}}</span>
        <span class="count-name">Gejala</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fas fa-disease"></i>
        <span class="count-numbers">{{$penyakit->count()}}</span>
        <span class="count-name">Penyakit</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fas fa-brain"></i>
        <span class="count-numbers">{{$aturan->count()}}</span>
        <span class="count-name">Aturan</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-users"></i>
        <span class="count-numbers">{{$users->count()}}</span>
        <span class="count-name">Pengguna</span>
      </div>
    </div>
    <div class="col-md-3">
        <div class="card-counter info">
            <i class="fas fa-notes-medical"></i>
          <span class="count-numbers">{{$konsul->count() }}</span>
          <span class="count-name">Konsultasi</span>
        </div>
      </div>
  </div>
</div>
@stop


    <style>
        .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
    </style>


