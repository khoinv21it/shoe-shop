<?php
require($_SERVER['DOCUMENT_ROOT'] . '/PDO/product.php');
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
</head>
<body>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/header.php');
?>
<section class="product-section">
  <div class="container-fluid-lg">
    <div class="row g-sm-4 g-3">
      <div class="col-xxl-3 col-xl-4 d-none d-xl-block">
        <div class="p-sticky">
          <div class="category-menu">
            <h3>Categories</h3>
            <ul>
              <li>
                <div class="category-list">
                  <h5>
                    <a href="<?php echo '/categories?search=Jordan' ?>">Nike</a>
                  </h5>
                </div>
              </li>
              <li>
                <div class="category-list">
                  <h5>
                    <a href="<?php echo '/categories?search=Adidas' ?>">Adidas</a>
                  </h5>
                </div>
              </li>
              <li class="pb-3">
                <div class="category-list">
                  <h5>
                    <a href="<?php echo '/categories?search=MLB' ?>">MLB</a>
                  </h5>
                </div>
              </li>
            </ul>
          </div>
          <div class="category-menu">
            <h3>Treanding Products</h3>
            <ul class="product-list border-0 p-0 d-block">
              <?php
              $result = commoditySelectAll('`special` = 1');
              if ($result) {
                foreach ($result as $value) {
                  $unit_price = number_format($value['unit_price'], 0);
                  $db = $value['image'];
                  $img = json_decode($db);
                  ?>
                  <li>
                    <div class="offer-product">
                      <a href="/product.html?name=<?php echo $value['name'] ?>&id=<?php echo $value['id'] ?>" class="offer-image">
                        <img src="<?php echo $img[0] ?>"
                             class="blur-up lazyload" alt="">
                      </a>
                      <div class="offer-detail">
                        <div>
                          <a href="product-left.html" class="text-title">
                            <h6 class="name"><?php echo $value['name'] ?></h6>
                          </a>
                          <h6 class="price theme-color"><?php echo $unit_price ?> đ</h6>
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
      <div class="col-xxl-9 col-xl-8">
        <div class="slider-3-blog ratio_65 no-arrow product-wrapper">
          <div>
            <div class="blog-box">
              <div class="blog-box-image">
                <a href="#" class="blog-image" style="height: 200px;">
                  <img src="https://static.hemera.vn/zoom/878/Uploaded/Minhtn/2020_05_06/1_WXVN.jpg"
                       class="bg-img blur-up lazyload" alt="">
                </a>
              </div>
            </div>
          </div>
          <div>
            <div class="blog-box">
              <div class="blog-box-image">
                <a href="#" class="blog-image" style="height: 200px;">
                  <img src="https://www.caoto.vn/images/slider-2.png"
                       class="bg-img blur-up lazyload" alt="">
                </a>
              </div>
            </div>
          </div>
          <div>
            <div class="blog-box">
              <div class="blog-box-image">
                <a href="#" class="blog-image" style="height: 200px;">
                  <img src="http://file.hstatic.net/1000405402/collection/hodu_banner_74967190cca44ef19878da20c1f0b00b.png"
                       class="bg-img blur-up lazyload" alt="">
                </a>
              </div>
            </div>
          </div>
          <div>
            <div class="blog-box">
              <div class="blog-box-image">
                <a href="#" class="blog-image" style="height: 200px;">
                  <img src="https://thietke6d.com/wp-content/uploads/2021/05/banner-quang-cao-giay-6.png"
                       class="bg-img blur-up lazyload" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="products" class="title title-flex mt-3">
          <div>
            <h2>Today's Hottest Product</h2>
            <span class="title-leaf" style="width:370px;margin:0;"></span>
          </div>
        </div>
        <div class="section-b-space">
          <div class="product-border border-row overflow-hidden">
            <div class="product-box-slider no-arrow">
              <?php
              $result = commoditySelectAll();
              if ($result) {
                foreach ($result as $value) {
                  $name = $value['name'];
                  $unit_price = $value['unit_price'];
                  $price = number_format($unit_price, 0, '', ',');
                  $discount = $value['discount'];
                  $priceNew = (int)$unit_price;
                  $discountNew = (int)$discount === 0 ? 1 : $discount;
                  $priceOff = number_format($priceNew / ((100 - $discountNew) / 100), 0);
                  $db = $value['image'];
                  $img = json_decode($db);
                  ?>
                  <div class="row m-0">
                    <div class="col-12">
                      <div class="product-box">
                        <div class="product-image">
                          <a href="/product.html?name=<?php echo $name ?>&id=<?php echo $value['id'] ?>">
                            <img src="<?php echo $img[0] ?>"
                                 class="img-fluid blur-up lazyload" alt="">
                          </a>
                          <ul class="product-option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                title="View">
                              <a href="javascript:void(0)" data-bs-toggle="modal"
                                 data-bs-target="#view">
                                <i data-feather="eye"></i>
                              </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Compare">
                              <a href="compare.html">
                                <i data-feather="refresh-cw"></i>
                              </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Wishlist">
                              <a href="wishlist.html" class="notifi-wishlist">
                                <i data-feather="heart"></i>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <div class="product-detail">
                          <a href="/product.html?<?php echo $name ?>&<?php echo $value['id'] ?>">
                            <h6 class="name"><?php echo $name ?></h6>
                          </a>
                          <h5 class="sold text-content">
                            <span class="theme-color price"><?php echo $price. 'đ' ?></span>
                            <del><?php echo $priceOff ?></del>
                          </h5>
                          <div class="product-rating mt-2">
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
                            <h6 class="theme-color">In Stock</h6>
                          </div>
                          <div class="add-to-cart-box">
                            <button class="btn btn-add-cart addcart-button">
                              Add
                              <i class="fa-solid fa-plus"></i>
                            </button>
                            <div class="cart_qty qty-box">
                              <div class="input-group">
                                <button type="button" class="qty-left-minus"
                                        data-type="minus" data-field="">
                                  <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                                <input class="form-control input-number qty-input"
                                       type="text" name="quantity" value="0" style="height: 32.3px !important">
                                <button type="button" class="qty-right-plus"
                                        data-type="plus" data-field="">
                                  <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              }
              ?>
            </div>
          </div>
        </div>
        <div class="title d-block">
          <h2>Top Search</h2>
          <span class="title-leaf"></span>
        </div>
        <div class="product-border overflow-hidden wow fadeInUp">
          <div class="product-box-slider no-arrow">
            <?php
              $result = commoditySelectAll("name LIKE '%Air Jordan%'");
              if ($result) {
                foreach ($result as $value) {
                  $price = number_format($value['unit_price'], 0, '', ',');
                  $name = $value['name'];
                  $discount = $value['discount'];
                  $priceNew = (int)$unit_price;
                  $discountNew = (int)$discount === 0 ? 1 : $discount;
                  $priceOff = number_format((int)$unit_price / ((100 - $discountNew) / 100), 0);
                  $db = $value['image'];
                  $img = json_decode($db);
                  ?>
                  <div>
                    <div class="row m-0">
                      <div class="col-12 px-0">
                        <div class="product-box">
                          <div class="product-image">
                            <a href="/product.html?name=<?php echo $name ?>&id=<?php echo $value['id'] ?>">
                              <img src="<?php echo $img[0] ?>" class="img-fluid blur-up lazyload" alt="">
                            </a>
                            <ul class="product-option">
                              <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                   data-bs-target="#view">
                                  <i data-feather="eye"></i>
                                </a>
                              </li>
                              <li data-bs-toggle="tooltip" data-bs-placement="top"
                                  title="Compare">
                                <a href="javascript:void(0)">
                                  <i data-feather="refresh-cw"></i>
                                </a>
                              </li>
                              <li data-bs-toggle="tooltip" data-bs-placement="top"
                                  title="Wishlist">
                                <a href="javascript:void(0)" class="notifi-wishlist">
                                  <i data-feather="heart"></i>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <div class="product-detail">
                            <a href="/product.html?name=<?php echo $name ?>&id=<?php echo $value['id'] ?>">
                              <h6 class="name"><?php echo $name ?></h6>
                            </a>
                            <h5 class="sold text-content">
                              <span class="theme-color price"><?php echo $price. ' đ' ?></span>
                              <del><?php echo $priceOff ?></del>
                            </h5>
                            <div class="product-rating mt-2">
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

                              <h6 class="theme-color">In Stock</h6>
                            </div>
                            <div class="add-to-cart-box">
                              <button class="btn btn-add-cart addcart-button">Add
                                <i class="fa-solid fa-plus"></i></button>
                              <div class="cart_qty qty-box">
                                <div class="input-group">
                                  <button type="button" class="qty-left-minus"
                                          data-type="minus" data-field="">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                  </button>
                                  <input class="form-control input-number qty-input"
                                         type="text" name="quantity" value="0"style="height: 32.3px !important">
                                  <button type="button" class="qty-right-plus"
                                          data-type="plus" data-field="">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/footer.php')
?>
<script src="../../resources/js/main.js"></script>
</body>
</html>
