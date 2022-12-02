const basket = document.querySelector('.basket');
const basketBtn = document.querySelector('.basket-btn');
const itemButtons = document.querySelectorAll('.item__button');
const basketContent = document.querySelector('.basket__content');
const basketValue = document.querySelector('.basket__value');
const authForm = document.querySelector('.authorization__form');

console.log(authForm);

let price = 0;

basketBtn.addEventListener('click', (event) => {
  event.preventDefault();

  basket.classList.toggle('slide');
});

itemButtons.forEach((button) => {
  button.addEventListener('click', (event) => {
    event.preventDefault();
    const basketItem = document.createElement('a');

    price += +event.target.dataset.price;
    basketItem.dataset.price = event.target.dataset.price;

    basketItem.innerHTML = event.target.name;
    basketItem.classList.add('basket__item');

    basketItem.addEventListener('click', (event) => {
      price -= +event.target.dataset.price;
      basketValue.innerHTML = price;
      basketItem.remove();
    });

    basketValue.innerHTML = price;

    basketContent.appendChild(basketItem);
  });
});
