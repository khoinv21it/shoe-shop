<?php
require($_SERVER['DOCUMENT_ROOT'] . '/PDO/product.php');
require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/admin/helmet.php');
$idDelete = (int) $_GET['IdDelete'];
?>
<body class="g-sidenav-show bg-gray-100">
<div class="min-height-300 bg-primary position-absolute w-100"></div>
<?php
if ($idDelete) {
  commodityDelete($idDelete);
  echo '<script type="text/javascript">toastr.success("Delete Successfully")</script>';
}
if (isset($_POST['btn-update'])) {
  $idUpdate = (int) $_GET['IdUpdate'];
  $name = $_POST['nameProduct'];
  $price = floatval($_POST['priceProduct']);
  $discount = floatval($_POST['discountProduct']);
  $description = $_POST['descriptionProduct'];
  $view = (int) $_POST['viewProduct'];
  $type = (int) $_POST['type'];
  commodityUpdate($name, $price, $discount, $description, $view, $type, $idUpdate);
  echo '<script type="text/javascript">toastr.success("Update Successfully")</script>';
}
require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/admin/navbar-vertical.php');
?>
<main class="main-content position-relative border-radius-lg ">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
       data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="/admin">Pages</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Product</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Product</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
              <i class="fa fa-bell cursor-pointer"></i>
            </a>
          </li>
          <li class="nav-item px-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-white p-0">
              <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
            </a>
          </li>
          <li class="nav-item dropdown pe-2 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
               aria-expanded="false">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none">Sign In</span>
            </a>
            <ul class="mt-0 dropdown-menu dropdown-menu-end px-2 py-1 me-sm-n4" aria-labelledby="dropdownMenuButton">
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <p class="m-0">logout</p>
                  </div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
    require $VIEW_NAME;
  ?>
</main>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/admin/script.php');
?>
</body>
</html>
