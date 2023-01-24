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
        <a href="fitness.php" class="header__item colored">ФИТНЕС КЛУБЫ</a>
        <a href="palaces.php" class="header__item">ДВОРЦЫ СПОРТА</a>
        <a href="complexes.php" class="header__item">КОМПЛЕКСЫ</a>
        <a href="index.php" class="header__item">ПЕРСОНАЛЬНЫЙ ПОДБОР</a>
      </div>
    </header>
    <main class="page">
      <div class="page__description">
        <h1 class="description__title">Фитнес клубы</h1>
        <div class="description__container">
          <div class="description__info">
            <p class="description__text"><b>Фитнес-клуб</b> — оздоровительное, развлекательное и социальное учреждение, которое предназначено для занятий спортом и физических нагрузок. Оно объединяет в себе разные типы тренировок и оздоровительных процедур.</p>
            <p class="description__text">В большинстве фитнес-клубов работают персональные тренеры и диетологи, которые будут обучать клиентов пользоваться оборудованием или составлять план питания и тренировок, подходящие для достижения их целей.</p>
            <p class="description__text">Фитнес-клубы, как правило, занимают большие площади, но также могут быть средними или маленькими. Все зависит от количества предоставляемых услуг, направленностей тренировок и зон для них.</p>
          </div>
          <img src="../assets/fitness.jpeg" alt="fitness" class="description__img">
        </div>
      </div>
      <div class="page__main">
      <div class="main__toolbar">
          <label for="main-search" class="main__search--title">Поиск</label>
          <input type="text" class="main__search" id="main-search">
          <label for="main-rating-select">Рейтинг:</label>
          <select name="main-rating-select" id="main-rating-select">
            <option value="0">Не выбрано</option>
            <option value="5">5 звёзд</option>
            <option value="4">4 звезды</option>
            <option value="3">3 звезды</option>
            <option value="2">2 звезды</option>
            <option value="1">1 звезда</option>
          </select>
          <label for="main-paid-select">Платно/бесплатно</label>
          <select name="main-paid-select" id="main-paid-select">
            <option value="none">Не выбрано</option>
            <option value="free">Бесплатно</option>
            <option value="paid">Платно</option>
          </select>
          <label for="main-disability-select">Приспособленность для занятий инвалидов</label>
          <select name="main-disability-select" id="main-disability-select">
            <option value="none">Не выбрано</option>
            <option value="partly">Частично приспособлен</option>
            <option value="oda">Приспособлен для лиц с нарушением ОДА</option>
            <option value="fully">Приспособлен для всех групп инвалидов</option>
          </select>
          <div class="main__input">
            <label for="hasDressingRoom">Наличие раздевалки</label>
            <input type="checkbox" name="hasDressingRoom" id="hasDressingRoom" class="main__checkbox">
          </div>
          <div class="main__input">
            <label for="hasEatery">Наличие точки питания</label>
            <input type="checkbox" name="hasEatery" id="hasEatery" class="main__checkbox">
          </div>
          <div class="main__input">
            <label for="hasToilet">Наличие туалета</label>
            <input type="checkbox" name="hasToilet" id="hasToilet" class="main__checkbox">
          </div>
          <div class="main__input">
            <label for="hasWifi">Наличие точки Wi-Fi</label>
            <input type="checkbox" name="hasWifi" id="hasWifi" class="main__checkbox">
          </div>
          <div class="main__input">
            <label for="hasCashMachine">Наличие банкомата</label>
            <input type="checkbox" name="hasCashMachine" id="hasCashMachine" class="main__checkbox">
          </div>
          <div class="main__input">
            <label for="hasFirstAidPost">Наличие медпункта</label>
            <input type="checkbox" name="hasFirstAidPost" id="hasFirstAidPost" class="main__checkbox">
          </div>
          <div class="main__input">
            <label for="hasMusic">Наличие музыкального сопровождения</label>
            <input type="checkbox" name="hasMusic" id="hasMusic" class="main__checkbox">
          </div>
          <div class="main__input">
            <label for="hasEquipmentRental">Возможность проката оборудования</label>
            <input type="checkbox" name="hasEquipmentRental" id="hasEquipmentRental" class="main__checkbox">
          </div>
          <div class="main__input">
            <label for="hasTechService">Наличие сервиса технического обслуживания</label>
            <input type="checkbox" name="hasTechService" id="hasTechService" class="main__checkbox">
          </div>
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

    const mainSearch = document.querySelector('.main__search');
    const mainRatingSelect = document.querySelector('#main-rating-select');
    const mainPaidSelect = document.querySelector('#main-paid-select');
    const mainDisabilitySelect = document.querySelector('#main-disability-select');
    const checkboxes = document.querySelectorAll('.main__checkbox');

    function render(elements) {
      mainContent.innerHTML = "";

      for (let i = 0; i < elements.length - 1; i++) {
        const params = [...elements[i]];

        if (!params[0].toLowerCase().includes('фитнес')) continue;
        if (!params[0].toLowerCase().includes(mainSearch.value.toLowerCase())) continue;

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

        let next = false;

        for (let j = 0; j < checkboxes.length; j++) {
          if (gym[checkboxes[j].name] === "нет" && checkboxes[j].checked === true) {
            next = true;
          }
        }

        if (next) continue;

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

        if (+mainRatingSelect.value === 1 && gym.rating >= 55) continue;
        if (+mainRatingSelect.value === 2 && (gym.rating >= 70 || gym.rating < 55)) continue;
        if (+mainRatingSelect.value === 3 && (gym.rating >= 85 || gym.rating < 70)) continue;
        if (+mainRatingSelect.value === 4 && (gym.rating >= 100 || gym.rating < 85)) continue;
        if (+mainRatingSelect.value === 5 && gym.rating < 100) continue;

        if (mainPaidSelect.value === "paid" && gym.paid === "бесплатно") continue;
        if (mainPaidSelect.value === "free" && gym.paid === "платно") continue;

        if (mainDisabilitySelect.value === "partly" && gym.disabilityFriendly !== "частично приспособлен") continue;
        if (mainDisabilitySelect.value === "oda" && gym.disabilityFriendly !== "приспособлен для лиц с нарушением ОДА") continue;
        if (mainDisabilitySelect.value === "fully" && gym.disabilityFriendly !== "приспособлен для всех групп инвалидов") continue;

        const item = document.createElement('div');

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

        mainContent.append(item);
      }
    
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

    mainSearch.addEventListener('keyup', () => {
      render(data);
    })

    mainRatingSelect.addEventListener('change', () => {
      render(data);
    })

    mainPaidSelect.addEventListener('change', () => {
      render(data);
    })

    mainDisabilitySelect.addEventListener('change', () => {
      render(data);
    })

    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', (event) => {
        render(data);
      })
    })
  </script>
</body>

</html>