<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mehrdad Amini">
    <title>Wedding</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <!-- Custom fonts for this template-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg bg-light" style="background-color: #ffff !important;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav  ms-auto mb-2 mb-lg-0 me-5">
                  <?php if(isset($_SESSION['level'])){
                  ?>
                    <a class="nav-link" href="logout.php">Logout</a>
                    <?php }else{ ?>
                    <a class="nav-link" href="login">Log in</a>
                    <a class="nav-link" href="">Register</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Page Wrapper -->
    <div id="wrapper">
        <section class="preview">
          <div class="container me-0 pe-0  pt-5">
              <div class="row pt-5 mx-0">
                <div class="col-sm-12 col-md-6 col-lg-6 ">
                    <h2 class="pt-5 fs-1">Website Undangan Pernikahan</h2>
                    <p class="pt-2 fs-4 mb-0">Masa aktif selamanya dan edit tanpa batas!</p>
                    <p class="fw-bolder fs-3">Fitur paling lengkap banyak preset siap pakai</p>
                    <button class="btn btn-danger btn-lg">Coba Sekarang</button>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 pe-0" >
                    <img src="{{url('products/banner.png')}}" alt="" class="w-100 d-inline-block" style="margin-top: -4.55rem !important;">
                </div>
              </div>
          </div>
        </section>
        <section class="theme ">
          <div class="container">
            <h2 class="pt-5 text-center">Theme On Website</h2>
            <div class="row pb-5">
              <div class="col-md-4 col-12 pt-4">
                <div class="card">
                  <img src="{{url('products/card.jpg')}}" alt="">
                  <div class="card-body">
                      <h4>Blue Floower</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12 pt-4">
                <div class="card">
                  <img src="{{url('products/card.jpg')}}" alt="">
                  <div class="card-body">
                      <h4>Blue Floower</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12 pt-4">
                <div class="card">
                  <img src="{{url('products/card.jpg')}}" alt="">
                  <div class="card-body">
                      <h4>Blue Floower</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12 pt-4">
                <div class="card">
                  <img src="{{url('products/card.jpg')}}" alt="">
                  <div class="card-body">
                      <h4>Blue Floower</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12 pt-4">
                <div class="card">
                  <img src="{{url('products/card.jpg')}}" alt="">
                  <div class="card-body">
                      <h4>Blue Floower</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12 pt-4">
                <div class="card">
                  <img src="{{url('products/card.jpg')}}" alt="">
                  <div class="card-body">
                      <h4>Blue Floower</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="why">
          <div class="container pb-5">
            <h4 class=" pt-5 text-center">Mengapa Undangan Digital?</h4>
            <p class="text-center">Manfaat yang anda dapatkan menggunakan undangan digital :</p>
            <div class="row py-5">
              <div class="col-12 col-md-3 p-0">
                  <div class="card border-0" style="background-color: #e6e7e8;">
                      <img src="{{url('products/invita_homepage_iconsavetime.svg')}}" alt="" class="w-75 mx-auto d-block pt-5">
                  </div>
              </div>
              <div class="col-12 col-md-3 p-0">
                <div class="card border-0" style="background-color: #f1f1f1;">
                  <img src="{{url('products/invita_homepage_iconsavetime.svg')}}" alt="" class="w-75 mx-auto d-block pt-5">
                </div>
              </div>
              <div class="col-12 col-md-3 p-0">
                <div class="card border-0" style="background-color: #e6e7e8;">
                  <img src="{{url('products/invita_homepage_iconsavetime.svg')}}" class="w-75 mx-auto d-block pt-5">
                </div>
            </div>
            <div class="col-12 col-md-3 p-0">
              <div class="card border-0" style="background-color: #f1f1f1;">
                <img src="{{url('products/invita_homepage_iconsavetime.svg')}}" class="w-75 mx-auto d-block pt-5">
              </div>
            </div>
            </div>
          </div>
        </section>
        <section class="sayThey">
          <div class="container pt-5">
            <h4 class="text-center pt-5">Apa Kata Mereka?</h4>
            <p class="text-center">Cari Tahu Apa Kata Mereka Yang Telah Mmebuat Undangan Digital</p>
            <div class="row py-5 ">
              <div class="col-12 col-md-6">
                  <<img src="{{url('products/invita_homepage_iconsavetime.svg')}}" alt="" class="mx-auto d-block">
                  <h5 class="text-center">Fredi Wong</h5>
                  <p class="text-center">Thanks Invita.id for the great support in making us easier to share our digital invitation to our lovely guest. We can share any of our wedding vibe just put everything inside the invitation. It can be theme-customized with all data for couples such as; our love story, our prewed photography, our guest list reservations, wishes and still so many thigs to add. Thanks for made it happened!</p>
              </div>
              <div class="col-12 col-md-6">
                <img src="{{url('products/test.png')}}" alt="" class="w-75 mx-auto d-block">
              </div>
            </div>
          </div>
        </section>
    </div>
</body>
</html>