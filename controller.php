<?php

$challenges = [
  1 => ["function" => "Sum", "params" => ""],
  2 => ["function" => "DateDifference", "params" => ["date"]],
  3 => ["function" => "CreateDatabaseTableUsers", "params" => ["host", "user", "password"]],
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

function CreateDatabaseTableUsers($data)
{
  $data = explode(",", $data);
  [$host, $user, $password] = $data;
  $connection = new PDO("");
}

?>

<article>
  <?= $message ?>
  <?= $result ?>
</article>