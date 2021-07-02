<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">SISTEM PAKAR ISPA</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav d-flex justify-content-end" style="width: 100%">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('page.petunjuk') }}">Petunjuk</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('page.informasi') }}">Informasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalaboutme">About me</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
              </ul>
          </div>
        </div>
      </nav>

     <!-- Modal -->
<div class="modal fade" id="modalaboutme" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">About me</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                <img src="https://thumbs.dreamstime.com/b/profile-icon-male-avatar-portrait-casual-person-silhouette-face-flat-design-vector-46846325.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <table class="table table-borderless">
                      <tr>
                          <td>Nama</td>
                          <td>Riza Nurfat Risyam</td>
                      </tr>
                      <tr>
                          <td>NOBP</td>
                          <td>17101152630138</td>
                      </tr>
                  </table>
                  
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="card">
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>