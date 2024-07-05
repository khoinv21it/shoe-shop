<?php
require($_SERVER['DOCUMENT_ROOT'] . '/PDO/product.php');
session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <title><?php echo $_GET['filter'] ?></title>
  <?php
  require ($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/helmet.php');
  ?>
  <link rel="stylesheet" href="/resources/css/header.css">
</head>
<body>
<?php
require ($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/header.php');
?>
<section class="section-b-space shop-section">
  <div class="container-fluid-lg">
    <div class="row">
      <div class="col-xxl-3 col-lg-4">
        <div class="left-box wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
          <div class="shop-left-sidebar">
            <div class="back-button">
              <h3><i class="fa-solid fa-arrow-left"></i> Back</h3>
            </div>

            <div class="filter-category">
              <div class="filter-title">
                <h2>Filters</h2>
                <a href="javascript:void(0)">Clear All</a>
              </div>
              <ul>
                <li>
                  <a href="javascript:void(0)"><?php echo $_GET['search'] ?></a>
                </li>
                <li>
                  <a href="javascript:void(0)">Giày</a>
                </li>
              </ul>
            </div>
            <div class="accordion custome-accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                          aria-expanded="true" aria-controls="collapseOne">
                    <span>Categories</span>
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                  <div class="accordion-body">
                    <div class="form-floating theme-form-floating-2 search-box">
                      <input type="search" class="form-control" id="search" placeholder="Search ..">
                      <label for="search">Search</label>
                    </div>

                    <ul class="category-list custom-padding custom-height">
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="fruit">
                          <label class="form-check-label" for="fruit">
                            <span class="name">Fruits &amp; Vegetables</span>
                            <span class="number">(15)</span>
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="cake">
                          <label class="form-check-label" for="cake">
                            <span class="name">Bakery, Cake &amp; Dairy</span>
                            <span class="number">(12)</span>
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="behe">
                          <label class="form-check-label" for="behe">
                            <span class="name">Beverages</span>
                            <span class="number">(20)</span>
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="snacks">
                          <label class="form-check-label" for="snacks">
                            <span class="name">Snacks &amp; Branded Foods</span>
                            <span class="number">(05)</span>
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="beauty">
                          <label class="form-check-label" for="beauty">
                            <span class="name">Beauty &amp; Household</span>
                            <span class="number">(30)</span>
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="pets">
                          <label class="form-check-label" for="pets">
                            <span class="name">Kitchen, Garden &amp; Pets</span>
                            <span class="number">(50)</span>
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="egg">
                          <label class="form-check-label" for="egg">
                            <span class="name">Eggs, Meat &amp; Fish</span>
                            <span class="number">(19)</span>
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="food">
                          <label class="form-check-label" for="food">
                            <span class="name">Gourment &amp; World Food</span>
                            <span class="number">(30)</span>
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="care">
                          <label class="form-check-label" for="care">
                            <span class="name">Baby Care</span>
                            <span class="number">(20)</span>
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="fish">
                          <label class="form-check-label" for="fish">
                            <span class="name">Fish &amp; Seafood</span>
                            <span class="number">(10)</span>
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="marinades">
                          <label class="form-check-label" for="marinades">
                            <span class="name">Marinades</span>
                            <span class="number">(05)</span>
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="lamb">
                          <label class="form-check-label" for="lamb">
                            <span class="name">Mutton &amp; Lamb</span>
                            <span class="number">(09)</span>
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="other">
                          <label class="form-check-label" for="other">
                            <span class="name">Port &amp; other Meats</span>
                            <span class="number">(06)</span>
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="pour">
                          <label class="form-check-label" for="pour">
                            <span class="name">Pourltry</span>
                            <span class="number">(01)</span>
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                          <input class="checkbox_animated" type="checkbox" id="salami">
                          <label class="form-check-label" for="salami">
                            <span class="name">Sausages, bacon &amp; Salami</span>
                            <span class="number">(03)</span>
                          </label>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-9 col-lg-8">
        <div class="show-button">
          <div class="filter-button-group mt-0">
            <div class="filter-button d-inline-block d-lg-none">
              <a><i class="fa-solid fa-filter"></i> Filter Menu</a>
            </div>
          </div>
          <div class="top-filter-menu">
            <div class="grid-option">
              <ul>
                <li class="three-grid d-xxl-inline-block d-none">
                  <a href="javascript:void(0)">
                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid-3.svg" class="blur-up lazyloaded" alt="">
                  </a>
                </li>
                <li class="grid-btn active">
                  <a href="javascript:void(0)">
                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid-4.svg" class="blur-up d-lg-inline-block d-none lazyloaded" alt="">
                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid.svg" class="blur-up lazyload img-fluid d-lg-none d-inline-block" alt="">
                  </a>
                </li>
                <!-- <li class="list-btn">
                  <a href="javascript:void(0)">
                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/list.svg" class="blur-up lazyloaded" alt="">
                  </a>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
        <div class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
          <?php
          $filter = $_GET['search'];
          $result = commoditySelectAll("name LIKE '%$filter%'");
          if ($result) {
            foreach ($result as $value) {
              $price = number_format($value['unit_price'], 0, '', ',');
              $discount = $value['discount'];
              $priceNew = (int)$value['unit_price'];
              $discountNew = (int)$discount === 0 ? 1 : $discount;
              $priceOff = number_format($priceNew / ((100 - $discountNew) / 100), 0);
              $db = $value['image'];
              $img = json_decode($db);
              ?>
              <div>
                <div class="product-box-3 h-100 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                  <div class="product-header">
                    <div class="product-image">
                      <a href="/product.html?name=<?php echo $value['name'] ?>&id=<?php echo $value['id'] ?>">
                        <img src="<?php echo $img[0] ?>" class="img-fluid blur-up lazyloaded" alt="">
                      </a>
                      <ul class="product-option">
                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="View">
                          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-eye">
                              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                              <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                          </a>
                        </li>

                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Compare">
                          <a href="compare.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-refresh-cw">
                              <polyline points="23 4 23 10 17 10"></polyline>
                              <polyline points="1 20 1 14 7 14"></polyline>
                              <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                            </svg>
                          </a>
                        </li>

                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Wishlist">
                          <a href="wishlist.html" class="notifi-wishlist">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-heart">
                              <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="product-footer">
                    <div class="product-detail">
                      <span class="span-name"><?php echo $_GET['filter'] ?></span>
                      <a href="/product.html?name=<?php echo $value['name'] ?>&id=<?php echo $value['id'] ?>">
                        <h5 class="name"><?php echo $value['name'] ?></h5>
                      </a>
                      <p class="text-content mt-1 mb-2 product-content"><?php echo $value['description'] ?></p>
                      <div class="product-rating mt-2">
                        <ul class="rating">
                          <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-star fill">
                              <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                          </li>
                          <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-star fill">
                              <polygon
                                      points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                          </li>
                          <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-star fill">
                              <polygon
                                      points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                          </li>
                          <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-star fill">
                              <polygon
                                      points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                          </li>
                          <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-star">
                              <polygon
                                      points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                          </li>
                        </ul>
                        <span>(4.0)</span>
                      </div>
                      <h5 class="price"><span class="theme-color"><?php echo $price. ' đ' ?></span>
                        <del><?php echo $priceOff ?></del>
                      </h5>
                      <div class="add-to-cart-box bg-white">
                        <button class="btn btn-add-cart addcart-button">Add
                          <i class="fa-solid fa-plus bg-gray"></i></button>
                        <div class="cart_qty qty-box">
                          <div class="input-group bg-white">
                            <button type="button" class="qty-left-minus bg-gray" data-type="minus" data-field="">
                              <i class="fa fa-minus" aria-hidden="true"></i>
                            </button>
                            <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                            <button type="button" class="qty-right-plus bg-gray" data-type="plus" data-field="">
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
        <nav class="custome-pagination">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled">
              <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">
                <i class="fa-solid fa-angles-left"></i>
              </a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="javascript:void(0)">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="javascript:void(0)">
                <i class="fa-solid fa-angles-right"></i>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</section>
<?php
require ($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/footer.php');
?>
</body>
</html>
