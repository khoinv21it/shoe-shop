<?php
require_once ('pdo.php');

function insertComment($content, $id_product, $id_user) {
  $createAt = date('Y-m-d');
  $sql = "INSERT INTO `comment`(`content`, `id_product`, `id_user`, `create_at`) VALUES (?,?,?,?)";
  execute($sql, $content, $id_product, $id_user, $createAt);
}

function commentStatistical() {
  $sql = "select max(comment.create_at) as newest, min(comment.create_at) as oldest, count(comment.id) as amount, products.name, products.id from products join comment on products.id = comment.id_product GROUP by comment.id_product";
  return query($sql);
}

function commentUpdate($name, $price, $discount, $description, $view, $type, $id) {
  $sql = "UPDATE `products` SET `name`=?,`unit_price`=?,`discount`=?,`description`=?,`view`=?,`id_type`=? WHERE `id`=?";
  execute($sql, $name, $price, $discount, $description, $view, $type, $id);
}

function commentDelete($id) {
  $sql = "DELETE FROM `products` WHERE `id`=?";
  if(is_array($id)){
    foreach ($id as $idItem) {
      execute($sql, $idItem);
    }
  } else{
    execute($sql, $id);
  }
}


function selectAllCommentAndUser($idProduct) {
  $sql = "SELECT * FROM `comment` INNER JOIN user ON user.id = comment.id_user WHERE id_product = $idProduct;";
  return query($sql);
}

/**
 * @param $special
 * @return array
 */


function commentSelectAll($special = 1) {
  $sql = "SELECT * FROM `comment` WHERE $special";
  return query($sql);
}

function commentSelectById($id) {
  $sql = "SELECT * FROM `products` WHERE `id`=?";
  return queryOne($sql, $id);
}

function commentExist($id) {
  $sql = "SELECT count(*) FROM `products` WHERE `id`=?";
  return queryValue($sql, $id) > 0;
}
