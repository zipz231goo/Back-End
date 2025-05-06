<?php
session_start();
include ("lang.php");

$lang = $_GET['lang'] ?? ($_COOKIE['lang'] ?? 'ua');
setcookie('lang', $lang, time() + (180 * 24 * 60 * 60));
?>

<style>
    *{
        box-sizing: border-box;
    }
    .content{
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        max-width: 768px;
        width: 100%;
    }
    .row{
        display: flex;
        margin-bottom: 4px;
    }
    .row > div:first-child{
        min-width: 220px;
        display: flex;
        justify-content: end;
        color: gray;
        align-items: center;
        margin-right: 10px;
    }
</style>

<div class="content">
    <div class="row">
        <div>
            <?php echo $texts[$lang]['login']; ?>: 
        </div>
        <div>
            <?php echo htmlspecialchars($_SESSION['name'] ?? ''); ?>
        </div>
    </div>
    <div class="row">
        <div>
            <?php echo $texts[$lang]['email']; ?>: 
        </div>
        <div>
            <?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?>
        </div>
    </div>
    <div class="row">
        <div>
            <?php echo $texts[$lang]['gender']; ?>: 
        </div>
        
        <div>
            <?php echo htmlspecialchars($_SESSION['gender'] ?? ''); ?>
        </div>
    </div>
    <div class="row">
        <div>
            <?php echo $texts[$lang]['city']; ?>: 
        </div>
        
        <div>
            <?php echo htmlspecialchars($_SESSION['city'] ?? ''); ?>
        </div>
    </div>
    <div class="row">
        <div>
            <?php echo $texts[$lang]['games']; ?>: 
        </div>
        
        <div>
            <?php echo htmlspecialchars(implode(', ', (array) $_SESSION['favorites'] ?? [])); ?>
        </div>
    </div>
    <div class="row">
        <div>
            <?php echo $texts[$lang]['about']; ?>
        </div>
        
        <div>
            <?php echo nl2br(htmlspecialchars($_SESSION['about'] ?? '')); ?>
        </div>
    </div>
    <div class="row">
        <div>
            <?php if (!empty($_SESSION['photo'])): ?><?php echo $texts[$lang]['photo']; ?>
        </div>
        <div>
            <img src="<?php echo $_SESSION['photo']; ?>" alt="Фото" width="350"></p>
            <?php endif; ?>
        </div>
    </div>
    <a href="index.php?lang=<?php echo $lang; ?>"><?php echo $texts[$lang]['back']; ?></a>
</div>