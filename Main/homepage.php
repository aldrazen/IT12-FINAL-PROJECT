<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="images/x-icon" href="../images/logo-bg.jpg" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css" />
  <script src="../Bootstrap/js/bootstrap.js"></script>
  <script src="../script.js"></script>
  <link rel="stylesheet" href="../homePageStyles/navbar.css" />
  <link rel="stylesheet" href="../homePageStyles/content.css" />
  <link rel="stylesheet" href="../homePageStyles/footer.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:wght@400;700&display=swap"
    rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Baskervville&family=Krona+One&family=Roboto:wght@400;700&display=swap"
    rel="stylesheet" />
  <title>TopShelf Co.</title>
</head>

<body>
  <div class="container-fluid p-0">
    <div class="card bg-black rounded-0 p-0 m-0 overflow-hidden">
      <div class="card-img-overlay p-0">
        <div class="image-shadow h-100 p-0">
          <nav class="navbar navbar-expand-md mb-3 pt-lg-4">
            <div class="container-xxl flex-wrap flex-md-nowrap" aria-label="Main Navigation">
              <a href="homepage.php"><img class="ts-logo navbar-brand rounded-4" src="../images/logo-bg.jpg"
                  alt="Logo" /></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-1"></i>
              </button>
              <div class="right-section collapse navbar-collapse align-items-center" id="navbarCollapse">
                <ul class="navbar-nav d-flex flex-row flex-wrap py-md-0 text-center">
                  <li class="nav-item col-4 col-md-auto">
                    <a class="nav-link activee p-3 larger-text" href="">HOME</a>
                  </li>
                  <li class="nav-item col-4 col-md-auto">
                    <a class="nav-link p-3 normal-text" href="shop.php">SHOP</a>
                  </li>
                  <li class="nav-item col-4 col-md-auto">
                    <a class="nav-link p-3 normal-text" href="">ABOUT</a>
                  </li>
                </ul>
              </div>
              <div class="collapse navbar-collapse align-items-center justify-content-end" id="navbarCollapse">
                <div class="right-section d-flex flex-row flex-wrap py-md-0 text-center">
                  <div class="icon-container col-4 col-md-auto ">
                    <i class="bi bi-search fs-3"></i>
                  </div>
                  <div class="icon-container col-4 col-md-auto px-4">
                    <i class="bi bi-bag fs-3" onclick="login()"></i>
                  </div>
                  <div class="icon-container col-4 col-md-auto ">
                    <i class="bi bi-person-circle fs-3" onclick="login()"></i>
                  </div>
                </div>
              </div>
            </div>
          </nav>
          <div class="d-flex h-100 align-items-center">
            <div class="container-xxl mt-sm-5">
              <h1 class="card-title d-flex justify-content-center mb-0">
                YOUR FAVORITES ARE BACK!
              </h1>
              <p class="card-subtitle d-flex justify-content-center mb-0">
                Shop these Original TopShelf Co. bestsellers!
              </p>
            </div>
          </div>
        </div>
      </div>
      <img class="card-img h-100" src="../images/cover.jpg" alt="" />
    </div>
  </div>
  <div class="content my-sm-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 mt-5 mb-sm-4">
          <h1 class="display-1">NEW ARRIVAL</h1>
          <p class="fs-2 mt-3">
            Perfect your appearance with a Trendy Style. Find your trendy
            style here.
          </p>
          <button class="btn shop-now px-5 py-4 mb-3" onclick="login()">
            SHOP NOW
          </button>
        </div>
        <div class="col-lg-7">
          <div class="row">
            <div class="col-lg-6">
              <div class="card bg-white py-2 px-4">
                <img class="card-img" src="../images/island-black.jpg" alt="" />
              </div>
              <div class="description d-flex justify-content-around my-2">
                <p>JOINT ISLAND</p>
                <p>₱ 600.00</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card bg-white py-2 px-4">
                <img class="card-img" src="../images/honey.jpg" alt="" />
              </div>
              <div class="description d-flex justify-content-around my-2">
                <p>FORBIDDEN HONEY</p>
                <p>₱ 650.00</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="card bg-white py-2 px-4">
                <img class="card-img" src="../images/grenade.jpg" alt="" />
              </div>
              <div class="description d-flex justify-content-around my-2">
                <p>GRENADE BUDS</p>
                <p>₱ 650.00</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card bg-white py-2 px-4">
                <img class="card-img" src="../images/island-white.jpg" alt="" />
              </div>
              <div class="description d-flex justify-content-around my-2">
                <p>BONG ISLAND</p>
                <p>₱ 600.00</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container my-5">
      <div class="row row-gap-3">
        <div class="col-lg-7">
          <div class="card p-0 h-100">
            <img class="card-img h-100" src="../images/duo-white.jpg" alt="" />
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card p-0 h-100">
            <img class="card-img h-100" src="../images/solo-white.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<footer>
  <div class="container-fluid bg-black">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-6 mb-4">
          <h1 class="display-3 text-white">
            FREE SHIPPING ON YOUR FIRST ORDER!
          </h1>
          <button class="btn sign-up px-5 py-3 w-50" onclick="register()">
            SIGN ME UP!
          </button>
        </div>
        <div class="col-lg-6">
          <h4>You can connect with us through the following:</h4>
          <div class="col-lg bi bi-facebook fs-3 text-white">
            <a href="https://www.facebook.com/profile.php?id=100092420918245" target="_blank"
              class="social-media">facebook</a>
          </div>
          <div class="col-lg bi bi-instagram fs-3 text-white">
            <a href="https://www.instagram.com/" target="_blank" class="social-media">instagram</a>
          </div>
          <div class="col-lg bi bi-tiktok fs-3 text-white">
            <a href="https://www.tiktok.com/@topshelfco_" target="_blank" class="social-media">tiktok</a>
          </div>
        </div>
      </div>
      <div class="logo-container mt-5 d-flex justify-content-center align-items-center">
        <img class="footer-logo" src="../images/logo-bg.jpg" alt="" />
      </div>
    </div>
  </div>
</footer>

</html>