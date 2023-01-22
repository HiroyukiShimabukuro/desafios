<?php
include('./connectDatabase.php');
include('./MyDate.php');

$challenges = [
  1 => ["function" => "Sum", "params" => []],
  2 => ["function" => "DateDifference", "params" => ["date"]],
  3 => ["function" => "ListarUsuario", "params" => ["host", "port", "user", "password", "user_id"]],
  4 => ["function" => "GetUsersPaginate5", "params" => ["host", "port", "user", "password", "p"]],
  5 => ["function" => "toAmerican", "params" => ["date"]],
  6 => ["function" => "toggleDate", "params" => ["date"]],
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
  // usando a classe
  // $dateAmerican = MyDate::toAmerican($date);

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

function toAmerican($data)
{
  $response = MyDate::toAmerican($data);
  return [$response, "Data formatada no formato americano: "];
}

function toggleDate($data)
{
  $response = MyDate::toggle($data);
  return [$response, "Data no novo formato: "];
}
?>
<?php include("./header.php") ?>

<link rel="stylesheet" href="style.css">
<article>
  <div class="container">
    <p>
      <?= $message ?>
    </p>
    <p>
      <?= $result ?>
    </p>
  </div>
</article>