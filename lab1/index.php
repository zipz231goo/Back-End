<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Backend-розробка</title>
</head>
<body style="margin: 15px; ">
  <h1>Лабораторна робота №1</h1>
  <hr>
  <h2>Завдання 2</h2>
  <?php
    echo "<pre>Полину в мріях в купель океану,
Відчую <b>шовковистість</b> глибини,
  Чарівні мушлі з дна собі дістану,
    Щоб <b><i>взимку</i></b>
      <u>тішили</u>
        мене
          вони…</pre>";?>

  <hr>
  <h2>Завдання 3</h2>
  <?php
    $sum = 1750;
    $exchangeRate = 0.024;  
  ?>
  <div><?php echo $sum ." грн. можна обміняти на ". $sum*$exchangeRate ." usd"; ?></div>
  <hr>
  <h2>Завдання 4</h2>
  <?php 
  $monthNumber = 4;
  $seasonName = "";
  if ($monthNumber > 2 && $monthNumber < 6){
    $seasonName = "Весна";    
  }
  else if ($monthNumber > 5 && $monthNumber < 9){
    $seasonName = "Літо";    
  }
  else if ($monthNumber > 8 && $monthNumber < 12){
    $seasonName = "Осінь";    
  }
  else if ($monthNumber == 1 || $monthNumber == 2 || $monthNumber == 12){
    $seasonName = "Зима";
  }
  ?>
  <div><?php echo $monthNumber ."-й місяць року означає, що зараз ". $seasonName; ?></div>
  <hr>
  <h2>Завдання 5</h2>
  <div>
  <?php 
  $letter = "Б";

  switch($letter) {
    case "А":
    case "Е":
    case "Є":
    case "И":
    case "І":
    case "Ї":
    case "О":
    case "У":
    case "Ю":
    case "Я":
        echo "Буква ". $letter ." - голосна";
        break;
    default: 
      echo "Буква ". $letter ." - приголосна";
  }
  ?>
  </div>
  <hr>
  <h2>Завдання 6</h2>
  <?php
  $number = mt_rand(100, 999);
  $didit1 = floor($number/100);
  $didit2 = floor(($number % 100)/10);
  $didit3 = $number % 10;
  ?>
  <div>
    Дано випадкове тризначне число: 
    <?php echo $number; ?> </br>

    1. Сума його цифр: 
    <?php 
    $sum = $didit1 + $didit2 + $didit3;
    echo $sum; 
    ?></br>

    2. Число, отримане виписуванням в зворотному порядку цифр даного тризначного натурального числа: 
    <?php 
    $reverseNum = $didit3 * 100 + $didit2 * 10 + $didit1;
    echo $reverseNum; 
    ?> </br>

    3. Переставлено цифри так, щоб нове число виявилося найбільшим з можливих:
    <?php
    $maxSum = max($didit1, $didit2, $didit3) * 100 + ($didit1 + $didit2 + $didit3 - max($didit1, $didit2, $didit3) - min($didit1, $didit2, $didit3)) * 10 + min($didit1, $didit2, $didit3);
    echo $maxSum; 
    ?> </br>
  </div>
  <hr>
  <h2>Завдання 7</h2>
  <h3>Частина 1</h3>
  <?php
  function colorTable($n){
    echo "<table border='1' cellpadding='10'>";
    for($i = 0; $i < $n; $i++){
      echo "<tr>";
      for($j = 0; $j < $n; $j++){
        $red = mt_rand(0, 255);
        $green = mt_rand(0, 255);
        $blue = mt_rand(0, 255);
        echo "<td style='background-color:rgb($red, $green, $blue)'>($i, $j)</td>";
      }
      echo "</tr>";
    }
      echo "</table>";
  }

  colorTable(6);
  ?>
  <h3>Частина 2</h3>
  <style>
    .bg-black{
      background-color: black;
      position: relative;
      width: 500px;
      height: 500px;
    }
    .red-block{
      background-color: red;
      position: absolute;
      border:1px solid white;
    }
  </style>
  <?php
  function redSquers($n){
    echo "<div class='bg-black'>";
    for($i = 0; $i < $n; $i++){
      $left = mt_rand(0, 400);
      $top = mt_rand(0, 400);
      $size = mt_rand(20, 100);
      echo "<div class='red-block' style='left:{$left}px; top:{$top}px; width:{$size}px; height:{$size}px;'></div>";
    }
    echo "</div>";
  }

  redSquers(5);
  ?>

</body>
</html>