<?php
require_once ('pdo.php');

function productInsert($name, $price, $discount, $image, $description, $special, $view, $id_type) {
  $createAt = date('Y-m-d');
  $sql = "INSERT INTO `products`(`name`, `unit_price`, `discount`, `image`, `create_at`, `description`, `special`, `view`, `id_type`) VALUES (?,?,?,?,?,?,?,?,?)";
  execute($sql, $name, $price, $discount, $image, $createAt, $description, $special, $view, $id_type);
}

function commodityUpdate($name, $price, $discount, $description, $view, $type, $id) {
  $sql = "UPDATE `products` SET `name`=?,`unit_price`=?,`discount`=?,`description`=?,`view`=?,`id_type`=? WHERE `id`=?";
  execute($sql, $name, $price, $discount, $description, $view, $type, $id);
}

function commodityDelete($id) {
  $sql = "DELETE FROM `products` WHERE `id`=?";
  if(is_array($id)){
    foreach ($id as $idItem) {
      execute($sql, $idItem);
    }
  } else{
    execute($sql, $id);
  }
}

function commodityPagination($limit) {
  $sql = "SELECT * FROM `products` ORDER BY id DESC LIMIT $limit";
  return query($sql);
}

/**
 * @param $special
 * @return array
 */

function commoditySelectAll($special = 1) {
  $sql = "SELECT * FROM `products` WHERE $special";
  return query($sql);
}

function commoditySelectById($id) {
  $sql = "SELECT * FROM `products` WHERE `id`=?";
  return queryOne($sql, $id);
}

function commodityExist($id) {
  $sql = "SELECT count(*) FROM `products` WHERE `id`=?";
  return queryValue($sql, $id) > 0;
}
