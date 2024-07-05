<?php
if (isset($_POST['logout'])) {
  $_SESSION['email'] = null;
  $_SESSION['fullName'] = null;
  $_SESSION['idUser'] = null;
  $_SESSION['role'] = null;
}
?>
<header class="pb-md-4 pb-0" style="background-color: #f8f8f8;">
  <div class="top-nav top-header sticky-header">
    <div class="container-fluid-lg">
      <div class="row">
        <div class="col-12">
          <div class="navbar-top">
            <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
              <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
            </button>
            <a href="/home" class="web-logo nav-logo">
              <img src="../../../resources/images/Sunny-Shop.png" class="img-fluid blur-up lazyload" alt="">
            </a>
            <div class="middle-box">
              <div class="search-box">
                <div class="input-group">
                  <input type="search" class="form-control" placeholder="I'm searching for..."
                         aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn" type="button" id="btn-search">
                    <i data-feather="search"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="rightside-box">
              <div class="search-full">
                <div class="input-group">
                  <span class="input-group-text">
                    <i data-feather="search" class="font-light"></i>
                  </span>
                  <input type="text" class="form-control search-type" placeholder="Search here..">
                  <span class="input-group-text close-search">
                    <i data-feather="x" class="font-light"></i>
                  </span>
                </div>
              </div>
              <ul class="right-side-menu">
                <li class="right-side">
                  <a href="wishlist.html" class="btn p-0 position-relative header-wishlist">
                    <i data-feather="heart"></i>
                  </a>
                </li>
                <li class="right-side">
                  <div class="onhover-dropdown header-badge">
                    <button type="button" class="btn p-0 position-relative header-wishlist">
                      <i data-feather="shopping-cart"></i>
                      <!-- <span class="position-absolute top-0 start-100 translate-middle badge">
                        0
                        <span class="visually-hidden">unread messages</span>
                      </span> -->
                    </button>
                    <div class="onhover-div">
                      <ul class="cart-list">
                        <li class="product-box-contain">
                          <p>No Product</p>
                        </li>
                      </ul>
                      <div class="price-box">
                        <h5>Total :</h5>
                        <h4 class="theme-color fw-bold">$0</h4>
                      </div>
                      <div class="button-group">
                        <a href="/cart" class="btn btn-sm cart-button">View Cart</a>
                        <a href="checkout.html" class="btn btn-sm cart-button theme-bg-color text-white">Checkout</a>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="right-side onhover-dropdown">
                  <div class="delivery-login-box">
                    <?php
                      if (!$_SESSION['fullName']) {
                        ?>
                          <div class="delivery-icon">
                            <i data-feather="user"></i>
                          </div>
                        <?php
                      } else {
                        ?>
                        <div class="my-account">
                          <h6>Hello,</h6>
                          <h5><?php echo $_SESSION['fullName'] ?></h5>
                        </div>
                        <?php
                      }
                    ?>
                  </div>
                  <div class="onhover-div onhover-div-login">
                    <form method="post">
                      <ul class="user-box-name">
                        <?php
                        if ($_SESSION['role']) {
                          ?>
                          <li class="product-box-contain">
                            <a href="/pages/admin/index.php">Administrators</a>
                          </li>
                          <li class="product-box-contain">
                            <a href="/forgot">Forgot Password</a>
                          </li>
                          <li class="product-box-contain">
                            <a><button class="btn-logout" name="logout">logout</button></a>
                          </li>
                          <?php
                        } else if ($_SESSION['fullName']) {
                          ?>
                          <li class="product-box-contain">
                            <a href="/forgot">Forgot Password</a>
                          </li>
                          <li class="product-box-contain">
                            <a><button class="btn-logout" name="logout">logout</button></a>
                          </li>
                          <?php
                        } else {
                          ?>
                          <li class="product-box-contain">
                            <i></i>
                            <a href="/login">Log In</a>
                          </li>
                          <li class="product-box-contain">
                            <a href="/signup">Register</a>
                          </li>
                          <?php
                        }
                        ?>
                      </ul>
                    </form>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid-lg">
    <div class="row">
      <div class="col-12">
        <div class="header-nav">
          <div class="header-nav-middle">
            <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
              <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                <div class="offcanvas-header navbar-shadow">
                  <h5>Menu</h5>
                  <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                          aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav">
                    <li class="nav-item dropdown dropdown-mega">
                      <a class="nav-link ps-xl-2 ps-0" href="/home">
                        Home
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#products"
                         data-bs-toggle="dropdown">Introduce</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link nav-link-2" href="/pages/contacT/form.php">Contact</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<script src="../../../resources/js/header.js"></script>
