<?php

$challenges = [
  1 => ["function" => "Sum", "params" => ""],
  2 => ["function" => "DateDifference", "params" => ["date"]],
  3 => ["function" => "ListarUsuario", "params" => ["host", "port", "user", "password", "user_id"]],
  4 => ["function" => "GetUsersPaginate5", "params" => []],
  5 => ["function" => "toAmerican", "params" => []],
  6 => ["function" => "toggleDate", "params" => []],
];
$params = array_map(function ($el) {
  return $_GET[$el];
}, $challenges[$_GET['challenge']]['params']);

$params = implode(', ', $params);
[$result, $message] = $challenges[$_GET['challenge']]['function']($params);

function Sum()
{
  $values = array(1, 3, 5, 9, 12, 10);
  $acumulator = 0;
  foreach ($values as $value) {
    $acumulator += $value;
  }
  $message = "O resultado da soma é: ";
  return [$acumulator, $message];
}

function DateDifference($date)
{
  $dateAmerican = convertDateBRtoAmerican($date);

  $origin = date_create($dateAmerican);
  $now = date_create(date("Y-m-d"));

  $interval = date_diff($origin, $now);

  $formatedInterval = $interval->format('%R%a dias');

  $message = "A diferença entre o dia " . $date . " e hoje é: ";

  return [$formatedInterval, $message];
}

function convertDateBRtoAmerican($date)
{
  $explodedDate = explode('/', $date);

  $day = $explodedDate[0];
  $month = $explodedDate[1];
  $year = $explodedDate[2];
  return $year . '-' . $month . '-' . $day;
}

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

?>

<article>
  <?= $message ?>
  <?= $result ?>
</article>