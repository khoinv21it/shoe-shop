<?php
class DbConnect
{
  private $host = "db";
  private $port = "3306";
  private $db = "db";
  private $username = "user";
  private $password = "password";

  public function connect()
  {
    $conn = new PDO('mysql:dbname=' . $this->db . ';host=' . $this->host . ';port=' . $this->port, $this->username, $this->password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  }
}

/**
 * @param $sql
 * @return array
 */
function query($sql)
{
  $sql_args = array_slice(func_get_args(), 1);
  try {
    $db = new DbConnect();
    $conn = $db->connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
    $rows = $stmt->fetchAll();
    return $rows;
  } catch (PDOException $e) {
    throw $e;
  } finally {
    unset($conn);
  }
}

function execute($sql)
{
  $sql_args = array_slice(func_get_args(), 1);
  try {
    $db = new DbConnect();
    $conn = $db->connect();
    $conn->prepare($sql)->execute($sql_args);
  } catch (PDOException $e) {
    throw $e;
  } finally {
    unset($conn);
  }
}

function queryOne($sql)
{
  $sql_args = array_slice(func_get_args(), 1);
  try {
    $db = new DbConnect();
    $conn = $db->connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
  } catch (PDOException $e) {
    throw $e;
  } finally {
    unset($conn);
  }
}

function queryValue($sql)
{
  $sql_args = array_slice(func_get_args(), 1);
  try {
    $db = new DbConnect();
    $conn = $db->connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return array_values($row)[0];
  } catch (PDOException $e) {
    throw $e;
  } finally {
    unset($conn);
  }
}
