<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="images/x-icon" href="../images/logo-bg.jpg" />
  <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css" />
  <script src="../Bootstrap/js/bootstrap.js"></script>
  <script src="../script.js"></script>
  <link rel="stylesheet" href="../customerStyles/register.css" />
  <link rel="stylesheet" href="../customerStyles/footer.css" />
  <link rel="preconnect" href="../https://fonts.googleapis.com" />
  <link rel="preconnect" href="../https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:wght@400;700&display=swap"
    rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Baskervville&family=Krona+One&family=Roboto:wght@400;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <title>Admin</title>
</head>

<body>
  <div class="background-img d-flex align-items-center justify-content-center flex-column">
    <img class="logo" src="../images/logo-bg.jpg" alt="logo" />
    <h3 class="text-white">Admin Sign up</h3>
    <div class="container w-50 mt-3">
      <form action="../admin-database/adminRegisterDB.php" method="post">
        <div class="row mt-2">
          <div class="col-lg-6 mt-2">
            <div class="form-outline">
              <label for="fullname" class="form-label">Full Name</label>
              <input type="text" class="form-control rounded-4 py-2 bg-transparent border-4" name="fullname"
                id="fullname" required>
            </div>
          </div>

          <div class="col-lg-6 mt-2">
            <div class="form-outline">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control rounded-4 py-2 bg-transparent border-4" name="username"
                id="username" required>
            </div>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-lg-6">
            <div class="form-outline">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control rounded-4 py-2 bg-transparent border-4" name="password"
                id="password" required>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-outline">
              <label for="confirmPassword" class="form-label">Confirm Password</label>
              <input type="password" class="form-control rounded-4 py-2 bg-transparent border-4" name="confirmPassword"
                id="confirmPassword" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="text-center">
              <button type="submit" name="register" class="signup py-2 rounded-4 mt-lg-5 my-3 w-50">
                Sign up
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <button class="goBack bi bi-arrow-90deg-left rounded-3 px-2 py-1" onclick="adminLogin()">
      Return
    </button>
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