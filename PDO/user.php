<?php
require_once ('pdo.php');

function clientChangePassword($value, $email) {
  $sql = "UPDATE `user` SET `password`=? WHERE email=?";
  execute($sql, $value, $email);
}

function clientInsert($id, $password, $name, $email) {
  $img = '["https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNL_ZnOTpXSvhf1UaK7beHey2BX42U6solRA&usqp=CAU"]';
  $sql = "INSERT INTO `user`(`id`, `password`, `full_name`, `active`, `image`, `email`, `role`) VALUES (?,?,?,1,?,?,0)";
  execute($sql, $id, $password, $name, $img, $email);
}

function clientUpdate($name, $id) {
  $sql = "UPDATE `user` SET `name`=? WHERE `id`=?";
  execute($sql, $name, $id);
}

function clientDelete($id) {
  $sql = "DELETE FROM `user` WHERE `id`=?";
  if(is_array($id)){
    foreach ($id as $idItem) {
      execute($sql, $idItem);
    }
  } else{
    execute($sql, $id);
  }
}

/**
 * @param int $where
 * @param $cols
 * @return array
 */

function clientSelectAll($cols = '*', $where = 1) {
  $sql = "SELECT $cols FROM `user` WHERE $where";
  return query($sql);
}

function clientSelectById($id) {
  $sql = "SELECT * FROM `user` WHERE `id`=?";
  return queryOne($sql, $id);
}

function clientExist($id) {
  $sql = "SELECT count(*) FROM `user` WHERE `id`=?";
  return queryValue($sql, $id) > 0;
}
