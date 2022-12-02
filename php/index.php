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
          <li class="header__anchor"><a href="index.php">Главная</a></li>
          <li class="header__anchor"><a href="production.php">Магазин</a></li>
          <li class="header__anchor"><a href="authorization.php">Авторизация</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main class="page">
    <div class="page__content container">
      <section class="page__intro">
        <div class="intro__container container">
          <h1 class="intro__title title">Магазин <span class="colored">виниловых</span> пластинок </h1>
          <p class="intro__text text">Приглашаем в наш магазин виниловых пластинок. Если вы начинающий меломан и вам по
            душе
            виниловый звук, если
            вы искушенный аудиофил и любитель проверенных временем виниловых записей, если вы коллекционер раритетных
            виниловых пластинок или ищете оригинальный подарок – в любом случае, среди более чем 20 000 пластинок,
            которые мы предлагаем к продаже, вы сможете подыскать что-либо в нашем магазине виниловых пластинок.</p>
          <p class="intro__text text">Большой ассортимент винила сопровождается широким ценовым диапазоном. В нашем
            магазине
            вы сможете найти как
            недорогие пластинки, по цене до трехсот рублей, так и раритетные издания на виниле, стоимость которых
            начинается от десяти тысяч рублей. Кроме этого, магазин располагает широким ассортиментом виниловых
            пластинок среднего ценового диапазона.</p>
          <p class="intro__text text">Купить виниловые пластинки в нашем магазине очень просто и удобно. Он расположен в
            центре Москвы, недалеко
            от метро Арбатская и 1 минуте ходьбы от Старого Арбата. Это просторное, светлое помещение, с удобным
            зонированием и великолепными возможностями для поиска виниловых пластинок.</p>
          <p class="intro__text text">До встречи в <span class="colored">Spin City Records!</span></p>
        </div>
      </section>
      <section class="page__production">
        <div class="production__container container">
          <h2 class="production__title title">Продукция, с которой мы работаем</h2>
          <div class="production__items">
            <div class="production__item">
              <img class="item__img" src=<?php echo $src1 ?> alt="">
              <p class="item__description">Виниловая пластинка "Warlord",<br><span class="colored">Yung Lean</span></p>
              <p class="item__description">1 999 р.</p>
            </div>
            <div class="production__item">
              <img class="item__img" src=<?php echo $src2 ?> alt="">
              <p class="item__description">Коллекционная виниловая пластинка "Starz",<br><span class="colored">Yung
                  Lean</span></p>
              <p class="item__description">4 999 р.</p>
            </div>
            <div class="production__item">
              <img class="item__img" src=<?php echo $src4 ?> alt="">
              <p class="item__description">Виниловая пластинка "Poison Ivy",<br><span class="colored">Yung Lean</span>
              <p class="item__description">2 999 р.</p>
              </p>
            </div>
          </div>
        </div>
      </section>
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
</body>

</html>