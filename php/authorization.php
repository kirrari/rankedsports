<?php 

include "db.php";
$result = mysqli_query($mysql, "SELECT * FROM `users`");

$users = [];
  
while ($user = mysqli_fetch_assoc($result)) {
  array_push($users, [$user['login'], $user['password']]);
}

$adminLogin = $users[0][0];
$adminPassword = $users[0][1];
$userLogin = $users[1][0];
$userPassword = $users[1][1];
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
    <section class="page__authorization">
      <div class="authorization__container container">
        <h1 class="authorization__title title">Авторизация</h1>
        <form class="authorization__form" action="index.php">
          <label for="login">Логин</label>
          <input class="authorization__input" type="text" name="login">
          <label for="password">Пароль</label>
          <input class="authorization__input" type="text" name="password">
          <input class="authorization__btn" type="submit">
        </form>
      </div>
    </section>
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
  <script src="auth.js"></script>
</body>

</html>