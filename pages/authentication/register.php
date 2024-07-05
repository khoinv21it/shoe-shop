<?php
require($_SERVER['DOCUMENT_ROOT'] . '/PDO/user.php');
session_start();
$error = false;
  if(isset($_POST['btn-sign-up'])) {
    $result = clientSelectAll('email, role');
    foreach($result as $value) {
      if ($_POST['email'] === $value['email']) {
        $error = true;
      } else {

      };
    }
    if (!$error) {
      $_SESSION['role'] = null;
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['fullName'] = $_POST['fullName'];
      $result = clientSelectAll('id', '1 ORDER BY id DESC LIMIT 1');
      if ($result) {
        foreach ($result as $valueId) {
          $id = (int) substr($valueId['id'], 2);
        }
      }
      $_SESSION[''] = 'SN'.($id + 1);
      clientInsert('SN'.($id + 1), $_POST['password'], $_POST['fullName'], $_POST['email']);
      header('Location: /home');
    };
  }
?>
<!doctype html>
<html lang="en">
<head>
  <title>Sunny Shop</title>
  <?php
  require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/helmet.php')
  ?>
  <link rel="stylesheet" href="/resources/css/header.css">
  <link rel="stylesheet" href="/resources/css/slide.css">
</head>
<body>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/header.php');
?>
<section class="breadscrumb-section pt-0">
  <div class="container-fluid-lg">
    <div class="row">
      <div class="col-12">
        <div class="breadscrumb-contain">
          <h2 class="mb-2">Log In</h2>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="/home">
                  <i class="fa-solid fa-house"></i>
                </a>
              </li>
              <li class="breadcrumb-item active">Log In</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="log-in-section section-b-space">
  <div class="container-fluid-lg w-100">
    <div class="row">
      <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
        <div class="image-contain">
          <img src="https://themes.pixelstrap.com/fastkart/assets/images/inner-page/sign-up.png" class="img-fluid"
               alt="">
        </div>
      </div>
      <div class="col-xxl-4 col-xl-5 col-lg-6 me-auto">
        <div class="log-in-box">
          <div class="log-in-title">
            <h3>Welcome To Fastkart</h3>
            <h4>Create New Account</h4>
            <?php if ($error) echo "<h4 style='color: red'>Email tồn tại</h4>";?>
          </div>
          <div class="input-box">
            <form method="post" class="row g-4">
              <div class="col-12">
                <div class="form-floating theme-form-floating">
                  <input type="text" class="form-control" id="fullName" placeholder="Full Name" name="fullName">
                  <label for="fullName">Full Name</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating theme-form-floating">
                  <input type="email" class="form-control" id="email" placeholder="Email Address" name="email">
                  <label for="email">Email Address</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating theme-form-floating">
                  <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="col-12">
                <div class="forgot-box">
                  <div class="form-check ps-0 m-0 remember-box">
                    <input class="checkbox_animated check-box" type="checkbox"
                           id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">I agree with
                      <span>Terms</span> and <span>Privacy</span></label>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-animation w-100" type="submit" name="btn-sign-up">Sign Up</button>
              </div>
            </form>
          </div>
          <div class="other-log-in">
            <h6>or</h6>
          </div>
          <div class="log-in-button">
            <ul>
              <li>
                <a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&amp;flowEntry=ServiceLogin" class="btn google-button w-100">
                  <img src="https://themes.pixelstrap.com/fastkart/assets/images/inner-page/google.png" class="blur-up lazyload" alt="">
                  Sign up with Google
                </a>
              </li>
              <li>
                <a href="https://www.facebook.com/" class="btn google-button w-100">
                  <img src="https://themes.pixelstrap.com/fastkart/assets/images/inner-page/facebook.png" class="blur-up lazyload" alt=""> Sign up with Facebook
                </a>
              </li>
            </ul>
          </div>
          <div class="other-log-in">
            <h6></h6>
          </div>
          <div class="sign-up-box">
            <h4>Already have an account?</h4>
            <a href="/login">Log In</a>
          </div>
        </div>
      </div>
      <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
    </div>
  </div>
</section>
<script src="https://themes.pixelstrap.com/fastkart/assets/js/feather/feather.min.js"></script>
<script src="https://themes.pixelstrap.com/fastkart/assets/js/feather/feather-icon.js"></script>
<script src="https://themes.pixelstrap.com/fastkart/assets/js/lazysizes.min.js"></script>
</body>
</html>
