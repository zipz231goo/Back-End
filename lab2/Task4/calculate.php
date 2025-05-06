<?php
require_once "function/func.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["x"]) && isset($_POST["y"])) {
    $x = $_POST["x"];
    $y = $_POST["y"];

    if (is_numeric($x) && is_numeric($y)) {
      $x = (float)$x;
      $y = (float)$y;

      $power = power($x, $y);
      $factorial = factorial($x);
      $myTg = fnMyTg($x);
      $sinX = fnSin($x);
      $cosX = fnCos($x);
      $tanX = fnTg($x);

      echo "<table border='1' style='text-align: center;'>";
      echo "<tr><th>x<sup>y</sup></th><th>x!</th><th>my_tg(x)</th><th>sin(x)</th><th>cos(x)</th><th>tg(x)</th></tr>";
      echo "<tr>";
      echo "<td style='padding: 8px;'>$power</td>";
      echo "<td style='padding: 8px;'>$factorial</td>";
      echo "<td style='padding: 8px;'>$myTg</td>";
      echo "<td style='padding: 8px;'>$sinX</td>";
      echo "<td style='padding: 8px;'>$cosX</td>";
      echo "<td style='padding: 8px;'>$tanX</td>";
      echo "</tr>";
      echo "</table>";
    } else {
        echo "<p style='color: red;'>Помилка: Введені значення мають бути числовими.</p>";
    }
  } else {
    echo "<p style='color: red;'>Помилка: Будь ласка, введіть значення для x і y.</p>";
  }
}
?>