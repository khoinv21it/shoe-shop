<?php

function typeInsert($name) {
  $sql = "INSERT INTO `type`(`name`) VALUES (?)";
  execute($sql, $name);
}

function typeUpdate($name, $id) {
  $sql = "UPDATE `type` SET `name`=? WHERE `id`=?";
  execute($sql, $name, $id);
}

function typeDelete($id) {
  $sql = "DELETE FROM `type` WHERE `id`=?";
  if(is_array($id)){
    foreach ($id as $idItem) {
      execute($sql, $idItem);
    }
  } else{
    execute($sql, $id);
  }
}

/**
 * @return array
 */

function typeSelectAll() {
  $sql = "SELECT * FROM `type`";
  return query($sql);
}

function typeSelectById($id) {
  $sql = "SELECT * FROM `type` WHERE `id`=?";
  return queryOne($sql, $id);
}

function typeExist($id) {
  $sql = "SELECT count(*) FROM `type` WHERE `id`=?";
  return queryValue($sql, $id) > 0;
}
