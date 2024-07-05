<?php
session_start();
/* Định nghĩa đường dẫn chứa ảnh sử dụng trong upload */
$IMAGE_DIR = $_SERVER["DOCUMENT_ROOT"] . "$ROOT_URL/content/images";
/*
* 2 biến toàn cục cần thiết để chia sẻ giữa controller và view */
$VIEW_NAME = "index.php"; $MESSAGE = '';
/*
 * Kiểm tra sự tồn tại của một tham số trong request
 * @param string $fieldname là tên tham số cần kiểm tra * @return boolean true tồn tại
 */
function exist_param($fieldName) {
  return array_key_exists($fieldName, $_REQUEST);
}
/*
 * Lưu file upload vào thư mục
 * @param string $fieldName là tên trường file * @param string $target_dir thư mục lưu file * @return tên file upload
 */
function save_file($fieldName, $target_dir){
  $file_uploaded = $_FILES[$fieldName];
  $file_name = basename($file_uploaded["name"]);
  $target_path = $target_dir . $file_name;
  move_uploaded_file($file_uploaded["tmp_name"], $target_path);
  return $file_name;
}

/**
* Tạo cookie
* @param string $name là tên cookie
* @param string $value là giá trị cookie
* @param int $day là số ngày tồn tại cookie
 */
function addCookie($name, $value, $day){
  setcookie($name, $value, time() + (86400 * $day), "/");
}
/**
 * Xóa cookie
 * @param string $name là tên cookie
 */
function delete_cookie($name){
  addCookie($name, '', -1);
}
/**
 * Đọc giá trị cookie
 * @param string $name là tên cookie
 * @return string giá trị của cookie
 */
function get_cookie($name){
  return $_COOKIE[$name]??'';
}
/*
 * Kiểm tra đăng nhập và vai trò sử dụng.
 * Các php trong admin hoặc php yêu cầu phải được đăng nhập mới được * phép sử dụng thì cần thiết phải gọi hàm này trước
 */
function checkLogin() {
  global $SITE_URL;
  if(isset($_SESSION['user'])) {
    if($_SESSION['user']['vai_tro'] == 1){
      return;
    }
    if(strpos($_SERVER["REQUEST_URI"], '/admin/') == FALSE){
      return;
    }
  }
  $_SESSION['request_uri'] = $_SERVER["REQUEST_URI"]; header("location: $SITE_URL/tai-khoan/dang-nhap.php");
}
