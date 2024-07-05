<?php
require_once ('pdo.php');

function insertCart($quantity, $id_user, $id_product) {
  $sql = "INSERT INTO `cart`(`quantity`, `id_user`, `id_product`) VALUES (?,?,?)";
  execute($sql, $quantity, $id_user, $id_product);
}
function selectItemByIdUser($id) {
  $sql = "SELECT * FROM `cart` INNER JOIN `products` ON `cart`.`id_product` = `products`.`id` WHERE `cart`.`id_user` = '$id'";
  return query($sql);
}
