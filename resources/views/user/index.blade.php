@extends('layouts.user')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container">
        <h3>SISTEM PAKAR ISPA</h3>
        <hr>
    </div>
@stop

@section('content')
<div class="container p-3">
    <div class="card">
        <h5 class="card-header">Informasi mengenai penyakit ISPA</h5>
        <div class="card-body">
          <h5 class="card-title">ISPA</h5>
          <div class="mb-3 mt-3">
              <img style="width: 30%" src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1592449361/attached_image/ispa-0-alodokter.jpg" alt="">
          </div>
          <p class="card-text">Infeksi saluran pernapasan akut atau ISPA adalah infeksi di saluran pernapasan, yang menimbulkan gejala batuk, pilek, disertai dengan demam. ISPA sangat mudah menular dan dapat dialami oleh siapa saja, terutama anak-anak dan lansia.</p>
          <p class="card-text">Sesuai dengan namanya, ISPA akan menimbulkan peradangan pada saluran pernapasan, mulai dari hidung hingga paru-paru. Kebanyakan ISPA disebabkan oleh virus, sehingga dapat sembuh dengan sendirinya tanpa pengobatan khusus dan antibiotik.
            ISPA dapat menyerang saluran napas atas maupun saluran napas bawah. Beberapa penyakit yang termasuk ke dalam ISPA adalah common cold, sinusitis, radang tenggorokan akut, laringitis akut, pneumonia, dan COVID-19.

            Penularan virus atau bakteri penyebab ISPA dapat terjadi melalui kontak dengan percikan air liur orang yang terinfeksi. Virus atau bakteri dalam percikan liur akan menyebar melalui udara, masuk ke hidung atau mulut orang lain.
            
            Selain kontak langsung dengan percikan liur penderita, virus juga dapat menyebar melalui sentuhan dengan benda yang terkontaminasi, atau berjabat tangan dengan penderita.
          </p>
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


