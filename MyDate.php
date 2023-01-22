<?php
class MyDate
{
  public static function toAmerican($date)
  {
    try {
      $convertedDate = DateTime::createFromFormat("d/m/Y", $date)->format("Y-m-d");
      return $convertedDate;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }

  public static function toBrazilian($date)
  {
    try {
      $convertedDate = date_create($date)->format("d/m/Y");
      return $convertedDate;
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }

  public static function toggle($date)
  {
    try {
      $americanPattern = "/([\d]{4})\-([\d]{2})\-([\d]{2})$/i";
      $brazilianPattern = "/([\d]{2})\/([\d]{2})\/([\d]{4})$/i";
      $american = preg_match($americanPattern, $date);
      $brazilian = preg_match($brazilianPattern, $date);
      if ($american) return self::toBrazilian($date);
      if ($brazilian) return self::toAmerican($date);
      throw new Exception("Formato de data inválido!");
    } catch (\Throwable $th) {
      return $th->getMessage();
    }
  }
}
