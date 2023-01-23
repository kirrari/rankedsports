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
        <a href="../index.html" class="header__title--secondary">RANKEDSPORTS</a>
      </div>
      <div class="header__content">
        <a href="fitness.php" class="header__item">ФИТНЕС КЛУБЫ</a>
        <a href="palaces.php" class="header__item">ДВОРЦЫ СПОРТА</a>
        <a href="complexes.php" class="header__item">КОМПЛЕКСЫ</a>
        <a href="index.php" class="header__item">ПЕРСОНАЛЬНЫЙ ПОДБОР</a>
      </div>
    </header>
    <main class="page">
      <div class="page__description">
        <h1 class="description__title">Фитнес клубы</h1>
        <div class="description__container">
          <div class="description__text"></div>
          <img src="" alt="" class="description__img">
        </div>
      </div>
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

        const gym = {
          objectName: params[0],
          admArea: params[1],
          district: params[2],
          address: params[3],
          email: params[4],
          website: params[5],
          helpPhone: params[6],
          hasEquipmentRental: params[7],
          hasTechService: params[8],
          hasDressingRoom: params[9],
          hasEatery: params[10],
          hasToilet: params[11],
          hasWifi: params[12],
          hasCashMachine: params[13],
          hasFirstAidPost: params[14],
          hasMusic: params[15],
          usagePeriodWinter: params[16],
          lighting: params[17],
          surfaceTypeWinter: params[18],
          paid: params[19],
          disabilityFriendly: params[20],
          servicesWinter: params[21],
          rating: 0
        }

        if (gym.hasEquipmentRental === "да") gym.rating += 10;
        if (gym.hasTechService === "да") gym.rating += 5;
        if (gym.hasDressingRoom === "да") gym.rating += 20;
        if (gym.hasEatery === "да") gym.rating += 15;
        if (gym.hasToilet === "да") gym.rating += 20;
        if (gym.hasWifi === "да") gym.rating += 15;
        if (gym.hasCashMachine === "да") gym.rating += 5;
        if (gym.hasFirstAidPost === "да") gym.rating += 15;
        if (gym.hasMusic === "да") gym.rating += 10;
        if (gym.disabilityFriendly === "частично приспособлен" || 
          gym.disabilityFriendly === "приспособлен для лиц с нарушением ОДА") {
            gym.rating += 10;
          } else if (gym.disabilityFriendly === "приспособлен для всех групп инвалидов") {
            gym.rating += 15;
        }

        item.classList.add('main__item');
        item.innerHTML = 
        `
          <div class="main__info">
          <p class="main__name">${gym.objectName}</p>
          <p class="main__description">${gym.address} | <span class="paid">${gym.paid}<span></p>
          </div>
        `;

        if (gym.rating >= 100) {
          item.innerHTML += `
            <div class="main__rating">
              <img class="main__star" src="../assets/star.svg">
              <img class="main__star" src="../assets/star.svg">
              <img class="main__star" src="../assets/star.svg">
              <img class="main__star" src="../assets/star.svg">
              <img class="main__star" src="../assets/star.svg">
            </div>            
          `
        } else if (gym.rating >= 85) {
          item.innerHTML += `
            <div class="main__rating">
              <img class="main__star" src="../assets/star.svg">
              <img class="main__star" src="../assets/star.svg">
              <img class="main__star" src="../assets/star.svg">
              <img class="main__star" src="../assets/star.svg">
            </div>
          `
        } else if (gym.rating >= 70) {
          item.innerHTML += `
            <div class="main__rating">
              <img class="main__star" src="../assets/star.svg">
              <img class="main__star" src="../assets/star.svg">
              <img class="main__star" src="../assets/star.svg">
            </div>
          `
        } else if (gym.rating >= 55) {
          item.innerHTML += `
            <div class="main__rating">
              <img class="main__star" src="../assets/star.svg">
              <img class="main__star" src="../assets/star.svg">
            </div>
          `
        } else {
          item.innerHTML += `
            <div class="main__rating">
              <img class="main__star" src="../assets/star.svg">
            </div>
          `
        }
          
        item.innerHTML += 
        `
          </div>
          <ul class="main__about hidden">
            <li class="about__item">Административный округ: ${gym.admArea === "" ? "информация отсутствует :(" : gym.admArea}</li>
            <li class="about__item">Район: ${gym.district === "" ? "информация отсутствует :(" : gym.district}</li>
            <li class="about__item">Адрес электронной почты: ${gym.email === "" ? "информация отсутствует :(" : gym.email}</li>
            <li class="about__item">Адрес сайта: ${gym.website === "" ? "информация отсутствует :(" : gym.website}</li>
            <li class="about__item">Справочный телефон: ${gym.helpPhone === "" ? "информация отсутствует :(" : gym.helpPhone}</li>
            <li class="about__item">Наличие раздевалки: ${gym.hasDressingRoom === "" ? "информация отсутствует :(" : gym.hasDressingRoom}</li>
            <li class="about__item">Наличие точки питания: ${gym.hasEatery === "" ? "информация отсутствует :(" : gym.hasEatery}</li>
            <li class="about__item">Наличие туалета: ${gym.hasToilet === "" ? "информация отсутствует :(" : gym.hasToilet}</li>
            <li class="about__item">Наличие точки Wi-Fi: ${gym.hasWifi === "" ? "информация отсутствует :(" : gym.hasWifi}</li>
            <li class="about__item">Наличие банкомата: ${gym.hasCashMachine === "" ? "информация отсутствует :(" : gym.hasCashMachine}</li>
            <li class="about__item">Наличие медпункта: ${gym.hasFirstAidPost === "" ? "информация отсутствует :(" : gym.hasFirstAidPost}</li>
            <li class="about__item">Наличие звукового сопровождения: ${gym.hasMusic === "" ? "информация отсутствует :(" : gym.hasMusic}</li>
            <li class="about__item">Освещение: ${gym.lighting === "" ? "информация отсутствует :(" : gym.lighting}</li>
            <li class="about__item">Приспособленность для занятий инвалидов: ${gym.disabilityFriendly === "" ? "информация отсутствует :(" : gym.disabilityFriendly}</li>
            <li class="about__item">Возможность проката оборудования: ${gym.hasEquipmentRental === "" ? "информация отсутствует :(" : gym.hasEquipmentRental}</li>
            <li class="about__item">Наличие сервиса технического обслуживания: ${gym.hasTechService === "" ? "информация отсутствует :(" : gym.hasTechService}</li>
            <li class="about__item">Период эксплуатации в зимний период: ${gym.usagePeriodWinter === "" ? "информация отсутствует :(" : gym.usagePeriodWinter}</li>
            <li class="about__item">Покрытие в зимний период: ${gym.surfaceTypeWinter === "" ? "информация отсутствует :(" : gym.surfaceTypeWinter}</li>
            <li class="about__item">Услуги, предоставляемые в зимний период: ${gym.servicesWinter === "" ? "информация отсутствует :(" : gym.servicesWinter}</li>
          </ul>
        `;

        if (gym.objectName.toLowerCase().includes('фитнес')) {
          mainContent.append(item);
        }
      })

      const mainItems = document.querySelectorAll('.main__item');

      mainItems.forEach(item => {
        item.addEventListener('click', (event) => {
          const gym = event.currentTarget;
          const about = gym.children[2];

          gym.classList.toggle('active--gym');
          about.classList.toggle('hidden');
        })
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