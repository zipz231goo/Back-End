<!DOCTYPE html>
<html lang="ua">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Backend-розробка</title>
</head>
<body style="margin: 15px; ">
  <h1>Лабораторна робота №2</h1>

  <hr>
  <h2>Завдання 1 - 1</h2>

  <form method="post">
    <label>
      Текст 
      <input type="text" name="text">
    </label></br>
    <label>
      Знайти 
      <input type="text" name="search">
    </label></br>
    <label>
      Замінити 
      <input type="text" name="change">
    </label></br>
    <button type="submit" name="replace_submit">Замінити</button></br>
  </form>

  <?php
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST['replace_submit'])){
    $text = $_POST['text'];
    $search = $_POST['search'];
    $change = $_POST['change'];
    $result = preg_replace('/'. preg_quote($search, '/').'/', $change, $text, 1);
    echo "<p class='result'>Результат: $result</p>";
  }
  ?>

  <hr>
  <h2>Завдання 1 - 2</h2>

  <form method="post">
    <label>
      Назви міст (через пробіл): 
      <input type="text" name="cities">
    </label>
    <button type="submit" name="sort_submit">Сортувати за абеткою</button><br>
  </form>

  <?php
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST['sort_submit'])){
      $cities = $_POST['cities'];
      $cities_array = explode(' ', $cities);
      sort($cities_array);
      $sort = implode(' ', $cities_array);
      echo "<p>Відсортовані міста: $sort</p>";
  }
  ?>

  <hr>
  <h2>Завдання 1 - 3</h2>

  <form method="post">
    <label>
      Вказати шлях до файлу:
      <input type="text" name="file">
    </label>
    <button type="submit" name="file_submit">Отримати ім'я файлу</button><br>
  </form>

  <?php
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST['file_submit'])){
      $file_path = $_POST['file'];
      $file_name = pathinfo( $file_path, PATHINFO_FILENAME);
      echo "<p>Ім'я файлу без розширення: $file_name</p>";
  }
  ?>

  <hr>
  <h2>Завдання 1 - 4</h2>
  
  <form method="post">
  <label>
    Вказати першу дату:
    <input type="date" name="date1"><br>
  </label>
  <label>
    Вказати другу дату:
    <input type="date" name="date2"><br>
  </label>
  <button type="submit" name="date_submit">Отримати кількість днів</button><br>
  </form>

  <?php
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST['date_submit'])){
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $diff = abs(strtotime($date2) - strtotime($date1))/86400;
    echo "<p>Кількість днів між датами: $diff</p>";
  }
  ?>

  <hr>
  <h2>Завдання 1 - 5</h2>

  <form method="post">
    <label>
      Вказати довжину пароля:
      <input type="number" name="password_length" min="4" max="20"><br>
    </label>
    <button type="submit" name="password_submit">Отримати пароль</button><br>
  </form>

  <?php
  function strongPass($pass){
    return preg_match('/[A-Z]/', $pass) &&
      preg_match('/[a-z]/', $pass) &&
      preg_match('/[0-9]/', $pass) &&
      preg_match('/[\+\-\*&%\^\$\[\];,\.\/\(\)]/', $pass) &&
      strlen($pass) > 8;
  }

  if($_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST['password_submit'])){
    $length = (int)$_POST['password_length'];
    $char = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM[\+\-\*&%\^\$\[\];,\.\/\(\)]1234567890';
    $password = substr(str_shuffle($char), 0, $length);
    echo "Ваш пароль: ".$password;
    $strong = strongPass($password) ? "Пароль міцний" : "Пароль слабкий";
    echo "<br>".$strong;
  }
  ?>

  <hr>
  <h2>Завдання 2 - 1</h2>

  <?php
  function duplicateSearch(array $array) {
    $counts = array_count_values($array);
    $duplicates = array_filter($counts, function($count) {
        return $count > 1;
    });

    if (!empty($duplicates)) {
        echo "Елементи що повторюються: " . implode(", ", array_keys($duplicates));
    } else {
        echo "Елементи що повторюються не знайдено.";
    }
  }

  $arr = [1, "один", "one", "een", "one", "I", "один", "перший", "first", "1"];
  print_r($arr);
  duplicateSearch($arr);
  ?>

  <hr>
  <h2>Завдання 2 - 2</h2>

  <?php
  function generatePetName($syllables, $length = 3) {
    $name = "";
    for ($i = 0; $i < $length; $i++) {
        $name .= $syllables[array_rand($syllables)];
    }    
    return ucfirst($name);
  }

  $syllables = ["мо", "ка", "лу", "фі", "зо", "ра", "мі", "то"];


  echo "<p>";
  echo "Кішка ". generatePetName($syllables) ."</br>";
  echo "Cобака ". generatePetName($syllables) ."</br>";
  echo "Хом'як ". generatePetName($syllables) ."</br>";
  echo "</p>";
  ?>

  <hr>
  <h2>Завдання 2 - 3</h2>
  
  <?php

  function createArray() {
    $length = rand(3, 7);
    $array = [];

    for ($i = 0; $i < $length; $i++) {
        $array[] = rand(10, 20);
    }

    return $array;
  }

  function mergeAndProcessArrays($arr1, $arr2) {
    $mergedArray = array_merge($arr1, $arr2);
    $uniqueArray = array_unique($mergedArray);
    sort($uniqueArray);
    return $uniqueArray;
  }

  $array1 = createArray();
  $array2 = createArray();

  $resultArray = mergeAndProcessArrays($array1, $array2);
  print_r($resultArray);
  ?>

  <hr>
  <h2>Завдання 2 - 4</h2>

  <?php
  $userArr = [
    "Alex" => 25,
    "Willam" => 24,
    "Dmytro" => 22,
    "Barbara" => 26,
  ];

  function sortUsers($array, $sortBy = 'name') {
    if ($sortBy == 'age') {
        asort($array);
    } else if ($sortBy == 'name') {
        ksort($array);
    }
    return $array;
}

  echo "Вихідний масив: </br>";
  print_r($userArr);

  $sortedByAge = sortUsers($userArr, 'age');
  echo "</br>Сортування за віком:</br>";
  print_r($sortedByAge);

  $sortedByName = sortUsers($userArr, 'name');
  echo "</br>Сортування за іменами:</br>";
  print_r($sortedByName);
  ?>

</body>
</html>