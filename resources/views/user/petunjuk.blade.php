@extends('layouts.user')

@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
          Petunjuk penggunaan aplikasi sistem pakar
        </div>
        <div class="card-body">


            <ul>
                <p>Berikut langkah-langkah dalam menggunakan aplikasi sistem pakar</p>
                <li>Pengguna diharus terdaftar dahulu pada sistem</li>
                <li>Setelah terdaftar pengguna bisa langsung login ke sistem</li>
                <li>Pengguna bisa langsung ke menu konsultasi, untuk langsung berkonsultasi dengan sistem</li>
                <li>Di halaman konsultasi pengguna akan ditanyai beberapa pertanyaan seputar ISPA</li>
                <li>Selajutnya pengguna tinggal menjawab sesuai apa yang anda rasakan</li>
                <li>Setelah me click tombom hitung sistem akan melakukan proses perhitungan dalam hitungan detik jawaban terhadap konsultasi akan keluar</li>
                <li>Pengguna bisa langsung mencetak laporan hasil konsultasi</li>
                <li>Jika telah selesai konsultasi, pengguna bisa langsung keluar atau logout dari sistem</li>
            </ul>
        </div>

        <ul>
            {{-- <li>Sumber : https://tirto.id/kenali-gejala-penyebab-hingga-pengobatan-penyakit-ispa-eeQv</li> --}}
        </ul>
      </div>
  </div>
  
@endsection