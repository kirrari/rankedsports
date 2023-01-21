<?php 
$mysql = new mysqli('localhost:8889', 'root', 'root', 'kursach');
$result = mysqli_query($mysql, "SELECT * FROM `sports`");

if ($mysql -> connect_error) {
  die("Connection failed: " . $mysql -> connect_error);
} 

$results = [];
  
while ($name = mysqli_fetch_assoc($result)) {
  array_push($results, [
    $name['ObjectName'], 
    $name['AdmArea'], 
    $name['District'], 
    $name['Address'],
    $name['Email'],
    $name['WebSite'],
    $name['HelpPhone'],
    $name['HasEquipmentRental'],
    $name['HasTechService'],
    $name['HasDressingRoom'],
    $name['HasEatery'],
    $name['HasToilet'],
    $name['HasWifi'],
    $name['HasCashMachine'],
    $name['HasFirstAidPost'],
    $name['HasMusic'],
    $name['UsagePeriodWinter'],
    $name['Lighting'],
    $name['SurfaceTypeWinter'],
    $name['Paid'],
    $name['DisabilityFriendly'],
    $name['ServicesWinter'],
  ]);
}

$stringResults = [];

for ($i = 0; $i < count($results); $i++) {
  array_push($stringResults, implode('|', $results[$i]));
}

$str = "";

for ($i = 1; $i < count($stringResults); $i++) {
  $str = $str . $stringResults[$i] . 'sep';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>RankedSports</title>
</head>

<body>
  <div class="wrapper">
    <header class="header">
      <div class="header__logo">
        <img src="../assets/logo.svg" alt="logo" class="header__icon">
        <a href="../index.html" class="header__title">RANKEDSPORTS</a>
      </div>
      <div class="header__content">
        <a href="#" class="header__item">ФИТНЕС КЛУБЫ</a>
        <a href="#" class="header__item">ДВОРЦЫ СПОРТА</a>
        <a href="#" class="header__item">ДОСУГОВЫЕ ЦЕНТРЫ</a>
        <a href="#" class="header__item">СПОРТЗАЛЫ</a>
      </div>
    </header>
    <main class="page">
      <div class="page__main">
        <div class="main__toolbar">
          <input type="text" class="main__search">
        </div>
        <div class="main__content">
          <!-- <div class="main__item">hello</div> -->
        </div>
      </div>
    </main>
    <footer class="footer">
      <div class="footer__container">
        <div class="footer__copy">Copyright © 2023 All rights reserved</div>
      </div>
    </footer>
  </div>
  <script src="../scripts/script.js"></script>
  <script>
    const mainContent = document.querySelector('.main__content');
    const data = extractData('<?php echo $str ?>');

    function render(elements) {
      mainContent.innerHTML = "";

      elements.forEach(params => {
        let item = document.createElement('div');

        item.classList.add('main__item');
        item.innerHTML = params[0];

        mainContent.append(item);
      })
    }
  
    render(data);

    const mainSearch = document.querySelector('.main__search');

    mainSearch.addEventListener('keyup', () => {
      const filteredData = data.filter(gym => gym[0].toLowerCase().includes(mainSearch.value.toLowerCase()));
      render(filteredData);
    })
  </script>
</body>

</html>