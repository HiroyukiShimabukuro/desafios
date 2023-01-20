<?php

$challenges = [
  1 => "Sum",
  2 => "DateDifference",
  3 => "CreateDatabaseTableUsers",
  4 => "GetUsersPaginate5",
  5 => "toAmerican",
  6 => "toggleDate",
];
$params = $_GET['date'];

[$result, $message] = $challenges[$_GET['challenge']]($params);

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
  $origin = date_create($date);
  $now = date_create(date("Y-m-d"));

  $interval = date_diff($origin, $now);

  $formatedInterval = $interval->format('%R%a dias');

  $message = "A diferença entre o dia " . $date . " e hoje é: ";

  return [$formatedInterval, $message];
}

?>

<article>
  <?= $message ?>
  <?= $result ?>
</article>