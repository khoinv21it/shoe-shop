<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/PDO/cart.php');
$id_user = $_SESSION['idUser'];
?>
<!doctype html>
<html lang="en">
<head>
  <title>Sunny Shop</title>
  <?php
    require('../templates/includes/helmet.php')
  ?>
  <style>
    .flex { display: flex;}
    .product-detail {
        width: 200px;
    }
    .product-image {
        width: 100% !important;
    }
    .product-image .img-fluid {
        width: 70px;
    }
    .name-product {
        margin-left: 12px;
        width: 100px;
        display: -webkit-box;
        white-space: normal;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        color: #111;
    }
    .name-product:hover {
        color: var(--theme-color);
    }
    .payment-select {
        display: flex;
        align-items: center;
    }
    .payment-select p {
        margin: 0;
        margin-left: 5px;
        color: #09a587;
    }
    .btn--remove {
        border: none;
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
        text-decoration: none;
        padding: 4px 8px;
        border-radius: 4px;
        margin-top: 5px;
    }
  </style>
</head>
<body>
    <?php
    require('../templates/includes/header.php')
    ?>
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Cart</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.php">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            <table class="table">
                                <tbody>
                                    <?php
                                    $result = selectItemByIdUser($id_user);
                                    if ($result) :
                                        foreach ($result as $value) :
                                            $unit_price = $value['unit_price'];
                                            $price = number_format($unit_price, 0, '', ',');
                                            $discount = $value['discount'];
                                            $priceNew = (int)$unit_price;
                                            $discountNew = (int)$discount === 0 ? 1 : $discount;
                                            $priceOff = number_format($priceNew / ((100 - $discountNew) / 100), 0);
                                            $img = json_decode($value['image']);
                                            $total = number_format($unit_price * $value['quantity'], 0, '', ',');
                                            ?>
                                            <tr class="product-box-contain">
                                                <td class="product-detail">
                                                    <div class="product border-0">
                                                        <a href="product-left.html" class="product-image flex">
                                                            <img src="<?= $img[0] ?>" class="img-fluid blur-up lazyload" alt="">
                                                            <p class="name-product"><?= $value['name'] ?></p>
                                                        </a>
                                                    </div>
                                                </td>

                                                <td class="price">
                                                    <h4 class="table-title text-content">Price</h4>
                                                    <div style="display:flex;">
                                                        <h5 class="price_new" data-value="<?= $unit_price ?>"><?= $price ?></h5>
                                                        <span>đ</span>
                                                    </div>
                                                    <h5><del class="text-content"><?= $priceOff. ' đ' ?></del></h5>
                                                </td>

                                                <td class="quantity">
                                                    <h4 class="table-title text-content">Qty</h4>
                                                    <div class="quantity-price">
                                                        <div class="cart_qty">
                                                            <div class="input-group">
                                                                <button type="button" class="btn btn-minus qty-left-minus"
                                                                    data-type="minus" data-field="">
                                                                    <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                                </button>
                                                                <input class="quantity form-control input-number" type="number"
                                                                    name="quantity" value="<?= $value['quantity'] ?>">
                                                                <button type="button" class="btn btn-plus qty-right-plus"
                                                                    data-type="plus" data-field="">
                                                                    <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="subtotal">
                                                    <h4 class="table-title text-content">Total</h4>
                                                    <h5 class="sub__total"><?= $total ?></h5>
                                                </td>

                                                <td class="save-remove">
                                                    <h4 class="table-title text-content">Action</h4>
                                                    <div class="payment-select">
                                                        <input class="select-product-item" type="checkbox" name="select">
                                                        <p>Payment</p>
                                                    </div>
                                                    <button class="btn--remove" href="javascript:void(0)">Remove</button>
                                                </td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Cart Total</h3>
                        </div>

                        <div class="summery-contain">
                            <div class="coupon-cart">
                                <h6 class="text-content mb-2">Coupon Apply</h6>
                                <div class="mb-3 coupon-box input-group">
                                    <input type="email" class="form-control" id="coupon-discount" placeholder="Enter Coupon Code Here...">
                                    <button type="button" class="btn-apply btn-apply-coupon">Apply</button>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 id="sub-total" class="price" data-value="0">0</h4>
                                    <h4>đ</h4>
                                </li>
                                <li>
                                    <h4>Coupon Discount</h4>
                                    <div style="margin-left: auto;display: flex;">
                                        <h4 style="margin-right: 5px;">(-)</h4>
                                        <h4 id="price-discount" class="price">0.00</h4>
                                        <h4>đ</h4>
                                    </div>
                                </li>

                                <li class="align-items-start">
                                    <h4>Shipping</h4>
                                    <h4 id="price-shipping" class="price text-end">15,000</h4>
                                    <h4>đ</h4>
                                </li>
                            </ul>
                        </div>

                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4>Total (VNĐ)</h4>
                                <h4 id="price-total" class="price theme-color">0</h4>
                                <h4 class="theme-color">đ</h4>
                            </li>
                        </ul>

                        <div class="button-group cart-button">
                            <ul>
                                <li>
                                    <button onclick="location.href = 'checkout.html';"
                                        class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                                </li>

                                <li>
                                    <button onclick="location.href = '/home';"
                                        class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    require('../templates/includes/footer.php')
    ?>
    <script src="../../resources/js/const.js"></script>
    <script src="../../resources/js/cart.js"></script>
</body>
</html>