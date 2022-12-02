<?php 

include "db.php";
$result = mysqli_query($mysql, "SELECT * FROM `images`");

$pictures = [];
  
while ($name = mysqli_fetch_assoc($result)) {
  array_push($pictures, [$name['src'], $name['title']]);
}

$src1 = $pictures[0][0];
$title1 = $pictures[0][1];
$src2 = $pictures[1][0];
$title2 = $pictures[1][1];
$src3 = $pictures[2][0];
$title3 = $pictures[2][1];
$src4 = $pictures[3][0];
$title4 = $pictures[3][1];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css">

  <title>Spin City Records</title>
</head>

<body>
  <header class="header">
    <div class="header__content container">
      <nav class="header__navigation">
        <img class="header__logo" src="/assets/logo.png" alt="logo">
        <ul class="header__anchors">
          <li class="header__anchor"><a class="basket-btn">Корзина</a></li>
          <li class="header__anchor"><a href="index.php">Главная</a></li>
          <li class="header__anchor"><a href="production.php">Магазин</a></li>
          <li class="header__anchor"><a href="authorization.php">Авторизация</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main class="page">
    <section class="page__production">
      <div class="production__container container">
      <h1 class="production__title title">Наша продукция</h1>
      <div class="production__items">
            <div class="production__item">
              <img class="item__img" src=<?php echo $src1 ?> alt="">
              <button class="item__button" name="Пластинка Warlord" data-price="1999">Добавить в корзину</button>
              <p class="item__description">Виниловая пластинка "Warlord",<br><span class="colored">Yung Lean</span></p>
              <p class="item__description">1 999 р.</p>
            </div>
            <div class="production__item">
              <img class="item__img" src=<?php echo $src2 ?> alt="">
              <button class="item__button" name="Коллекционная пластинка Starz" data-price="4999">Добавить в корзину</button>
              <p class="item__description">Коллекционная виниловая пластинка "Starz",<br><span class="colored">Yung
                  Lean</span></p>
              <p class="item__description">4 999 р.</p>
            </div>
            <div class="production__item">
              <img class="item__img" src=<?php echo $src4 ?> alt="">
              <button class="item__button" name="Пластинка Poison Ivy" data-price="2999">Добавить в корзину</button>
              <p class="item__description">Виниловая пластинка "Poison Ivy",<br><span class="colored">Yung Lean</span>
              </p>
              <p class="item__description">2 999 р.</p>
            </div>
            <div class="production__item">
              <img class="item__img" src=<?php echo $src3 ?> alt="">
              <button class="item__button" name="Пластинка Unknown Memory" data-price="3999">Добавить в корзину</button>
              <p class="item__description">Виниловая пластинка "Unknown Memory",<br><span class="colored">Yung Lean</span>
              </p>
              <p class="item__description">3 999 р.</p>
            </div>
          </div>
        </div>
    </section>
    <div class="basket">
      <div class="basket__content">
        <h3 class="basket__title title">Итого: <span class="basket__value">0</span> р.</h3>
        <p class="basket__description">Нажмите на элемент, чтобы его удалить</p>
        <div class="basket__content"></div>
    </div>
    </div>  
  </main>
  <footer class="footer">
    <div class="footer__content container">
      <div class="footer__contacts">
        <div class="contacts__item">8 (495) 962-73-72</div>
        <div class="contacts__item">spincity@records.ru</div>
        <div class="contacts__item">м. Арбатская (Филевская), Большой Афанасьевский переулок д. 35-37, строение 4</div>
      </div>
      <div class="footer__copy">© 2022 <span class="colored">records.ru</span> — магазин виниловых пластинок.</div>
    </div>
  </footer>
  <script src="script.js"></script>
</body>

</html>