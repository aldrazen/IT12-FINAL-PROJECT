<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="images/x-icon" href="../images/logo-bg.jpg" />
  <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css" />
  <script src="../Bootstrap/js/bootstrap.js"></script>
  <script src="../script.js"></script>
  <link rel="stylesheet" href="../customerStyles/login.css" />
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
  <title>User Login</title>
</head>

<body>
  <div class="background-img d-flex align-items-center justify-content-center flex-column">
    <img class="logo" src="../images/logo-bg.jpg" alt="logo" />
    <h3 class="text-white">Login</h3>
    <div class="container-fluid mt-3 d-flex flex-column align-items-center">
      <form action="../customer-database/loginDB.php" method="post">
        <div class="form-outline mb-3">
          <label for="Username" class="form-label">Name</label>
          <input type="text" class="form-control rounded-4 py-2 bg-transparent border-4" name="Username" id="Username"
            required />
        </div>

        <div class="form-outline">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control rounded-4 py-2 bg-transparent border-4" name="password"
            id="password" required />
        </div>
        <button type="submit" name="login" class="login py-2 w-100 mt-4 rounded-4">
          Log in
        </button>
      </form>
    </div>
    <button class="goBack mt-3 bi bi-arrow-90deg-left rounded-3 px-2 py-1" onclick="goToHome()">
      Return
    </button>
    <p class="new mt-3">
      New to TopShelf?<a class="toSignUp" href="customerRegister.php">
        Sign up</a>
    </p>
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
          <button class="btn sign-up px-5 py-3 w-50">SIGN ME UP!</button>
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
        <img class="footer-logo" src="images/logo-bg.jpg" alt="" />
      </div>
    </div>
  </div>
</footer>

</html>