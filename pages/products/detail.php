<?php
require($_SERVER['DOCUMENT_ROOT'] . '/PDO/product.php');
require($_SERVER['DOCUMENT_ROOT'] . '/PDO/comment.php');
require($_SERVER['DOCUMENT_ROOT'] . '/PDO/cart.php');
$id = $_GET['id'];
session_start();
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
  <style>
    .slick-slide .slick-active{
      width: 100% !important;
    }
    .transform {
      transform: translate3d(0, 0px, 0px) !important;
    }
  </style>
</head>
<body>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/header.php')
?>
<section class="breadscrumb-section pt-0">
  <div class="container-fluid-lg">
    <div class="row">
      <div class="col-12">
        <div class="breadscrumb-contain">
          <h2><?php echo $_GET['name'] ?></h2>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="/home">
                  <i class="fa-solid fa-house"></i>
                </a>
              </li>
              <li class="breadcrumb-item active"><?php echo $_GET['name'] ?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
$result = commoditySelectAll("`id` = $id");
if ($result) {
  foreach ($result as $value) {
    $unit_price = $value['unit_price'];
    $price = number_format($unit_price, 0, '', ',');
    $discount = $value['discount'];
    $priceNew = (int)$unit_price;
    $discountNew = (int)$discount === 0 ? 1 : $discount;
    $priceOff = number_format($priceNew / ((100 - $discountNew) / 100), 0);
    $db = $value['image'];
    $img = json_decode($db);
    ?>
    <section class="product-section">
      <div class="container-fluid-lg">
        <div class="row">
          <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
            <div class="row g-4">
              <div class="col-xl-6 wow fadeInUp">
                <div class="product-left-box">
                  <div class="row g-2">
                    <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                      <div class="product-main-2 no-arrow">
                        <?php foreach ($img as $valueImg) : ?>
                          <div>
                            <div class="slider-image">
                              <img src="<?= $valueImg ?>"
                                   data-zoom-image="https://themes.pixelstrap.com/fastkart/assets/images/product/category/1.jpg"
                                   class="img-fluid image_zoom_cls-0 blur-up lazyload"
                                   alt="">
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                      <div class="left-slider-image-2 left-slider no-arrow slick-top">
                        <?php foreach ($img as $valueImg) : ?>
                          <div>
                            <div class="slider-image">
                              <img src="<?= $valueImg ?>"
                                   class="img-fluid image_zoom_cls-0 blur-up lazyload"
                                   alt="">
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 wow fadeInUp">
                <div class="right-box-contain">
                  <h2 class="name"><?php echo $value['name'] ?></h2>
                  <div class="price-rating">
                    <h3 class="theme-color price">
                      <?php echo $price . ' đ' ?>
                      <del class="text-content"><?php echo $priceOff . ' đ' ?></del>
                      <span
                              class="offer theme-color">(<?php echo (int)$discount ?>% off)</span></h3>
                    <div class="product-rating custom-rate">
                      <ul class="rating">
                        <li>
                          <i data-feather="star" class="fill"></i>
                        </li>
                        <li>
                          <i data-feather="star" class="fill"></i>
                        </li>
                        <li>
                          <i data-feather="star" class="fill"></i>
                        </li>
                        <li>
                          <i data-feather="star" class="fill"></i>
                        </li>
                        <li>
                          <i data-feather="star"></i>
                        </li>
                      </ul>
                      <span class="review"><?php echo $value['view'] ?> Customer Review</span>
                    </div>
                  </div>
                  <div class="note-box product-packge">
                    <form method="post">
                      <div class="cart_qty qty-box">
                        <div class="input-group">
                          <button type="button" class="qty-left-minus"
                                  data-type="minus" data-field="">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                          </button>
                          <input class="form-control input-number qty-input"
                                  type="text" name="quantity" value="0" style="height: 32.3px !important;">
                          <button type="button" class="qty-right-plus"
                                  data-type="plus" data-field="">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                          </button>
                        </div>
                      </div>
                      <button type="submit" name="add-cart" class="btn btn-md bg-dark cart-button text-white w-100">
                        Add To Cart
                      </button>
                    </form>
                    <?php
                    if (isset($_POST['add-cart'])) {
                      $id_product = (int) $_GET['id'];
                      insertCart((int) $_POST['quantity'], $_SESSION['idUser'], $id_product);
                    }
                    ?>
                  </div>
                  <div class="paymnet-option">
                    <div class="product-title">
                      <h4>Guaranteed Safe Checkout</h4>
                    </div>
                    <ul>
                      <li>
                        <a href="javascript:void(0)">
                          <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/1.svg"
                               class="blur-up lazyload" alt="">
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0)">
                          <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/2.svg"
                               class="blur-up lazyload" alt="">
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0)">
                          <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/3.svg"
                               class="blur-up lazyload" alt="">
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0)">
                          <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/4.svg"
                               class="blur-up lazyload" alt="">
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0)">
                          <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/5.svg"
                               class="blur-up lazyload" alt="">
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
            <div class="right-sidebar-box">
              <div class="vendor-box">
                <div class="verndor-contain">
                  <div class="vendor-image">
                    <img src="../../resources/images/Sunny-Shop.png" class="blur-up lazyload" alt="">
                  </div>
                  <div class="vendor-name">
                    <h5 class="fw-500">Sunny Co.</h5>
                    <div class="product-rating mt-1">
                      <ul class="rating">
                        <li>
                          <i data-feather="star" class="fill"></i>
                        </li>
                        <li>
                          <i data-feather="star" class="fill"></i>
                        </li>
                        <li>
                          <i data-feather="star" class="fill"></i>
                        </li>
                        <li>
                          <i data-feather="star" class="fill"></i>
                        </li>
                        <li>
                          <i data-feather="star"></i>
                        </li>
                      </ul>
                      <span>(36 Reviews)</span>
                    </div>
                  </div>
                </div>
                <div class="vendor-list">
                  <ul>
                    <li>
                      <div class="address-contact">
                        <i data-feather="map-pin"></i>
                        <h5>Address: <span class="text-content">65 Sơn Thủy 3, Hoà Hải, Ngũ Hành Sơn, Đà Nẵng 550000, Vietnam</span>
                        </h5>
                      </div>
                    </li>
                    <li>
                      <div class="address-contact">
                        <i data-feather="headphones"></i>
                        <h5>Contact Seller: <span class="text-content">(+84)-123-456-789</span></h5>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="pt-25">
                <div class="hot-line-number">
                  <h5>Hotline Order:</h5>
                  <h6>Mon - Fri: 07:00 am - 11:30PM</h6>
                  <h3>(+1) 123 456 789</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container-fluid-lg">
        <div class="row">
          <div class="col-12">
            <div class="product-section-box m-0">
              <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="false">Description</button>
                  </li>
                  <li class="nav-item" role="presentation">
                      <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Review</button>
                  </li>
              </ul>
              <div class="tab-content custom-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                  <div class="product-description">
                    <div class="nav-desh">
                      <p><?php echo $value['description'] ?></p>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="review-box">
                        <div class="row g-4">
                            <div class="col-xl-6">
                                <div class="review-title">
                                    <h4 class="fw-500">Customer reviews</h4>
                                </div>

                                <div class="d-flex">
                                    <div class="product-rating">
                                        <ul class="rating">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star fill"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star fill"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star fill"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                            </li>
                                        </ul>
                                    </div>
                                    <h6 class="ms-3">4.2 Out Of 5</h6>
                                </div>

                                <div class="rating-box">
                                    <ul>
                                        <li>
                                            <div class="rating-list">
                                                <h5>5 Star</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 68%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                        68%
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="rating-list">
                                                <h5>4 Star</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 67%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                        67%
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="rating-list">
                                                <h5>3 Star</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 42%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                        42%
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="rating-list">
                                                <h5>2 Star</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                        30%
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="rating-list">
                                                <h5>1 Star</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 24%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                        24%
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="review-title">
                                    <h4 class="fw-500">Add a review</h4>
                                </div>
                                <div class="row g-4">
                                    <form method="post" >
                                      <div class="col-12">
                                        <div class="form-floating theme-form-floating">
                                          <?php
                                            if (isset($_POST['yourComment'])) {
                                              if ($_SESSION['idUser']) {
                                                insertComment($_POST['yourComment'], (int) $id, $_SESSION['idUser']);
                                              } else {
                                                echo '<script type="text/javascript">window.location.replace("/login")</script>';
                                              }
                                            }
                                          ?>
                                          <textarea name="yourComment" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                                          <label for="floatingTextarea2">Write Your review</label>
                                        </div>
                                      </div>
                                      <button class="btn btn-md bg-dark cart-button text-white w-100">
                                        Submit
                                      </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="review-title">
                                    <h4 class="fw-500">Customer questions &amp; answers</h4>
                                </div>
                                <div class="review-people">
                                    <ul class="review-list">
                                      <?php
                                        $result = selectAllCommentAndUser((int) $id);
                                          if ($result) {
                                            foreach ($result as $values) {
                                              $content = $values['content'];
                                              $createAt = $values['create_at'];
                                              $fullName = $values['full_name'];
                                      ?>
                                        <li>
                                            <div class="people-box">
                                                <div>
                                                    <div class="people-image">
                                                        <img src="data:image/png;base64,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" class="img-fluid blur-up lazyloaded" alt="">
                                                    </div>
                                                </div>
                                                <div class="people-comment">
                                                    <a class="name" href="javascript:void(0)"><?= $fullName ?></a>
                                                    <div class="date-time">
                                                        <h6 class="text-content"><?= $createAt ?></h6>

                                                        <div class="product-rating">
                                                            <ul class="rating">
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star fill"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star fill"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star fill"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="reply">
                                                        <p><?= $content ?><a href="javascript:void(0)">Reply</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                        }
                                      }
                                      ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
  }
}
require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/footer.php')
?>
</body>
</html>
