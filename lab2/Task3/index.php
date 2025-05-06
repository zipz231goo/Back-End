<!DOCTYPE html>
<html lang="ua">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Backend-розробка</title>
  <link rel="stylesheet" href="styles.css">

  <?php
    session_start();
    include ("lang.php");

    $lang = $_GET['lang'] ?? ($_COOKIE['lang'] ?? 'ua');
    setcookie('lang', $lang, time() + (180 * 24 * 60 * 60));

    $name = $_SESSION['name'] ?? '';
    $password = $_SESSION['password'] ?? '';
    $email = $_SESSION['email'] ?? '';
    $gender = $_SESSION['gender'] ?? '';
    $city = $_SESSION['city'] ?? '';
    $favorites = $_SESSION['favorites'] ?? [];
    $about = $_SESSION['about'] ?? '';
  ?>
</head>
<body style="margin: 15px; ">
  <h1>Лабораторна робота №2, завдання 3</h1>
  <p><?php echo $texts[$lang]['language_in_the_moment'];?></p>
  <div class="lang-wrap">
    <a class="lang-link <?php echo ($lang == 'ua') ? 'active' : '';?>" href="index.php?lang=ua">
      <img src="./images/icons/ua.svg" alt="Українська">
    </a>
    <a class="lang-link <?php echo ($lang == 'pl') ? 'active' : '';?>" href="index.php?lang=pl"> 
      <img src="./images/icons/pl.svg" alt="Poland">
    </a>
    <a class="lang-link <?php echo ($lang == 'en') ? 'active' : '';?>" href="index.php?lang=en">
      <img src="./images/icons/gb.svg" alt="enlish">
    </a>
    <a class="lang-link <?php echo ($lang == 'de') ? 'active' : '';?>" href="index.php?lang=de"> 
      <img src="./images/icons/de.svg" alt="Deutsch">
    </a>
    <a class="lang-link <?php echo ($lang == 'fr') ? 'active' : '';?>" href="index.php?lang=fr"> 
      <img src="./images/icons/fr.svg" alt="Français">
    </a>
  </div>
  <div class="form">
    <div>
      <?php
      if (isset($_SESSION['error'])) {
        echo "<p style='color: red;'>".$_SESSION['error']."</p>";
        unset($_SESSION['error']);
      }
      ?>
    </div>
    <form id="registrationForm" action="script.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <label>
          <span><?php echo $texts[$lang]['login']; ?></span>
          <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
        </label>
      </div>
      <div class="row">
        <label>
          <span><?php echo $texts[$lang]['password']; ?></span>
          <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
        </label>
      </div>
      <div class="row">
        <label>
          <span><?php echo $texts[$lang]['confirm_password']; ?></span>
          <input type="password" name="confirm_password" required>
        </label>
      </div>
      <div class="row">
        <label>
          <span><?php echo $texts[$lang]['email']; ?></span>
          <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        </label>
      </div>
      <div class="row">
        <span><?php echo $texts[$lang]['gender']; ?></span>
        <label>
          <input type="radio" name="gender" value="чоловік" <?php echo ($gender == 'male') ? 'checked' : ''; ?>> 
          <?php echo $texts[$lang]['male']; ?>
        </label>
        <label>
          <input type="radio" name="gender" value="жінка" <?php echo ($gender == 'female') ? 'checked' : ''; ?>> 
          <?php echo $texts[$lang]['female']; ?>
        </label>
      </div>
      <div class="row">
        <label>
          <span><?php echo $texts[$lang]['city']; ?></span>
          <select name="city">
            <option value="Житомир" <?php echo ($city == 'city1') ? 'selected' : ''; ?>> <?php echo $texts[$lang]['city1']; ?></option>
            <option value="Київ" <?php echo ($city == 'city2') ? 'selected' : ''; ?>> <?php echo $texts[$lang]['city2']; ?></option>
            <option value="Варшава" <?php echo ($city == 'city3') ? 'selected' : ''; ?>> <?php echo $texts[$lang]['city3']; ?></option>
            <option value="Лондон" <?php echo ($city == 'city4') ? 'selected' : ''; ?>> <?php echo $texts[$lang]['city4']; ?></option>
            <option value="Берлін" <?php echo ($city == 'city5') ? 'selected' : ''; ?>> <?php echo $texts[$lang]['city5']; ?></option>
            <option value="Париж" <?php echo ($city == 'city6') ? 'selected' : ''; ?>> <?php echo $texts[$lang]['city6']; ?></option>
          </select>
        </label>
      </div>
      <div class="row">
        <span><?php echo $texts[$lang]['games']; ?></span>
        <div>
          <label>
            <input type="checkbox" name="favorites[]" value="<?php echo $texts[$lang]['game1']; ?>" <?php echo ($favorites == 'game1') ? 'checked' : ''; ?>>
            <?php echo $texts[$lang]['game1']; ?> <br>
          </label>
          <label>
            <input type="checkbox" name="favorites[]" value="<?php echo $texts[$lang]['game2']; ?>" <?php echo ($favorites == 'game2') ? 'checked' : ''; ?>>
            <?php echo $texts[$lang]['game2']; ?> <br>
          </label>
          <label>
            <input type="checkbox" name="favorites[]" value="<?php echo $texts[$lang]['game3']; ?>" <?php echo ($favorites == 'game3') ? 'checked' : ''; ?>>
            <?php echo $texts[$lang]['game3']; ?> <br>
          </label>
          <label>
            <input type="checkbox" name="favorites[]" value="<?php echo $texts[$lang]['game4']; ?>" <?php echo ($favorites == 'game4') ? 'checked' : ''; ?>>
            <?php echo $texts[$lang]['game4']; ?> <br>
          </label>
          <label>
            <input type="checkbox" name="favorites[]" value="<?php echo $texts[$lang]['game5']; ?>" <?php echo ($favorites == 'game5') ? 'checked' : ''; ?>> 
            <?php echo $texts[$lang]['game5']; ?>
          </label>
        </div>
      </div>
      <div class="row">
        <label>
          <span><?php echo $texts[$lang]['about']; ?></span>
          <textarea name="about" rows="4" cols="20"><?php echo htmlspecialchars($about); ?></textarea>
        </label>
      </div>
      <div class="row">
        <label>
          <span><?php echo $texts[$lang]['photo']; ?></span>
          <input type="file" name="photo">
        </label>
      </div>
      <div class="row">
        <button type="submit"><?php echo $texts[$lang]['register']; ?></button>
      </div>
    </form>
  </div>

</body>
</html>