<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SISTEM PAKAR ISPA</title>
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


      <div class="" style="position: relative">
        <img src="{{ asset('img/fusion-medical-animation-rnr8D3FNUNY-unsplash.jpg')}}" style="background-size: cover; height: 88vh; width: 100%; object-fit: cover;" alt="">
        <div style="position: absolute; top: 20%; right: 0; margin: 3rem 4rem;">

            <div class="card shadow">
                <div class="card-body" style="padding: 2rem">

                    <h5 style="text-align: center; margin-bottom: 1rem;">Form Login</h5>
                    <form action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                
                        {{-- Email field --}}
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                            <input type="text" name="email" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                          </div>
                        
                          <div class="">
                              <button type="submit" class="btn btn-primary">Login</button>
                          </div>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-light.bg-gradient d-flex justify-content-center">
        <p>Copyright &copy; Riza Nurfat Risyam | {{ date('Y') }}</p>
    </footer>

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