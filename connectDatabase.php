<?php
function ConnectMysql($host, $port, $user, $password)
{
  $dsn = "mysql:host=" . $host . "; port=" . $port;
  try {
    $pdo_connection = new PDO($dsn, $user, $password);
    return $pdo_connection;
  } catch (\Throwable $th) {
    return $th->getMessage();
  }
}

function CreateDatabaseTableUsers($data)
{
  $data = explode(",", $data);
  [$host, $port, $user, $password] = $data;
  $user = trim($user);
  $password = trim($password);

  $pdo_connection = ConnectMysql($host, $port, $user, $password);
  try {
    $dummy_data = [
      [1, "usuario1", "login1", "senha1"],
      [2, "usuario2", "login2", "senha2"],
      [3, "usuario3", "login3", "senha3"],
      [4, "usuario4", "login4", "senha4"],
      [5, "usuario5", "login5", "senha5"],
      [6, "usuario6", "login6", "senha6"],
      [7, "usuario7", "login7", "senha7"],
      [8, "usuario8", "login8", "senha8"],
      [9, "usuario9", "login9", "senha9"],
      [10, "usuario10", "login10", "senha10"],
      [11, "usuario11", "login11", "senha11"],
      [12, "usuario12", "login12", "senha12"],
      [13, "usuario13", "login13", "senha13"],
      [14, "usuario14", "login14", "senha14"],
      [15, "usuario15", "login15", "senha15"],
      [16, "usuario16", "login16", "senha16"]
    ];
    $pdo_connection->query("CREATE DATABASE IF NOT EXISTS desafio");
    $pdo_connection->query("use desafio");
    $pdo_connection->query("CREATE TABLE IF NOT EXISTS usuarios (id INT NOT NULL AUTO_INCREMENT,
                            nome VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, senha VARCHAR(255) NOT NULL, PRIMARY KEY (id))");
    $insert = $pdo_connection->prepare("INSERT INTO usuarios (id, nome, login, senha) VALUES (?,?,?,?)");
    $pdo_connection->beginTransaction();
    foreach ($dummy_data as $row) {
      $insert->execute($row);
    }
    $pdo_connection->commit();
    return $pdo_connection;
  } catch (\Throwable $th) {
    echo $th->getMessage();
  }
}

function ListarUsuario($data)
{
  $user_id = explode(",", $data);
  $user_id = trim(end($user_id));
  $db = CreateDatabaseTableUsers($data);
  $query = $db->prepare("SELECT * FROM usuarios WHERE id = :id");
  $query->execute(['id' => $user_id]);
  $user = $query->fetch(PDO::FETCH_ASSOC);
  $response = join(", ", $user);
  if (!$response) $response = "Nenhum usuário encontrado!";
  return [$response, "Resultado da consulta: "];
}

function GetUsersPaginate5($data)
{
  $page = explode(",", $data);
  $page = trim(end($page));
  $db = CreateDatabaseTableUsers($data);
  $page = (($page - 1) * 5);
  $query = $db->prepare("SELECT * FROM usuarios LIMIT 5 OFFSET " . $page);
  $query->execute(['offset' => $page]);
  $users = $query->fetchAll(PDO::FETCH_ASSOC);
  // var_dump($users);
  if (!$users) return ["Nenhum dado encontrado!", "Resultado da consulta: "];
  $response = array_map(function ($user, $index) {
    if ($index == 0) return "id - nome - login - senha <br><br>" . join(" - ", $user);
    return join(" - ", $user);
  }, $users, array_keys($users));
  $response = join("<br><br>", $response);
  return [$response, "Resultado da consulta: "];
}
