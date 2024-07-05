const quantityElement = document.getElementsByClassName('quantity');
const btnPlus = document.getElementsByClassName('btn-plus');
const btnMinus = document.getElementsByClassName('btn-minus');
const selectProductElement = document.getElementsByClassName('select-product-item');
const btnCouponDiscount = document.querySelector('.btn-apply-coupon');
const priceDiscountElement = document.getElementById('price-discount');
const priceTotalElement = document.getElementById('price-total');
const priceShippingElement = document.getElementById('price-shipping');
const totalElement = document.getElementById('sub-total');
const itemLenght = selectProductElement.length;

function formatMoney(number) {
  return number.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
}

function formatMoneyToNumber(number) {
  return Number(number.toString().replace(",", ""));
}

for (let i = 0; i < itemLenght; i++) {
  quantityElement[i].addEventListener('change' , () => {
    const quantityValue = Number(quantityElement[i].value);

    const parent = quantityElement[i].parentElement.parentElement.parentElement.parentElement;

    const parentSubTotal = parent.nextElementSibling;

    const subTotal = parentSubTotal.getElementsByClassName('.sub__total');
    
    const priceElement = parent.previousElementSibling.querySelector('.price_new');

    const price = formatMoneyToNumber(priceElement.innerHTML);

    const total = price * Number(quantityValue);
  
    subTotal.innerHTML = formatMoney(total);
  
    if (quantityValue > 9) quantityElement.value = 9;
  
    if (quantityValue < 1) quantityElement.value = 0;
  })
  
}

for (let i = 0; i < itemLenght; i++) {
  btnMinus[i].addEventListener('click', () => {
    const parent = btnMinus[i].parentElement.parentElement.parentElement.parentElement;
    
    const subTotal = parent.nextElementSibling.querySelector('.sub__total');
    
    const priceElement = parent.previousElementSibling.querySelector('.price_new');

    const price = +priceElement.dataset.value
    
    const quantityElement = btnMinus[i].nextElementSibling;

    const quantityValue = Number(quantityElement.value);

    if (quantityValue > 1) {
      const total = price * Number(quantityValue - 1);
      
      btnMinus[i].nextElementSibling.value = quantityValue - 1;
      
      subTotal.innerHTML = formatMoney(total);
    }
  })
  
}

for (let i = 0; i < itemLenght; i++) {
  btnPlus[i].addEventListener('click', () => {
    const parent = btnPlus[i].parentElement.parentElement.parentElement.parentElement;

    const subTotal = parent.nextElementSibling.querySelector('.sub__total');
    
    const priceElement = parent.previousElementSibling.querySelector('.price_new');

    const price = +priceElement.dataset.value;
    
    const quantityElement = btnPlus[i].previousElementSibling;

    const quantityValue = Number(quantityElement.value);
  
    if (quantityValue < 10) {
      const total = price * Number(quantityValue);

      subTotal.innerHTML = formatMoney(total);
    }
  })
  
}

for (let i = 0; i < itemLenght; i++) {
  selectProductElement[i].addEventListener('change', ({ target: { checked } }) => {
    const subTotalElement = document.getElementById('sub-total');
    const priceShippinglElement = document.getElementById('price-shipping');
    const priceShippingValue = formatMoneyToNumber(priceShippinglElement.innerHTML);
    const subTotalValueOrigin = formatMoneyToNumber(subTotalElement.innerHTML);
    
    const total = selectProductElement[i].parentElement.parentElement.previousElementSibling.querySelector('.sub__total');

    const totalValue = formatMoneyToNumber(total.innerHTML);

    if (checked) {priceShippinglElement
      const priceSub = formatMoney(subTotalValueOrigin + totalValue);
      const price = formatMoney(subTotalValueOrigin + totalValue + priceShippingValue);
      subTotalElement.innerHTML = priceSub;
      priceTotalElement.innerHTML = price;
    } else {
      const priceSub = formatMoney(subTotalValueOrigin - totalValue);
      const price = formatMoney(subTotalValueOrigin - totalValue + priceShippingValue);
      subTotalElement.innerHTML = priceSub;
      if (price === '15,000') {
        priceTotalElement.innerHTML = 0;
      }
    }
  });
}

btnCouponDiscount.addEventListener('click', () => {
  const coupon = btnCouponDiscount.previousElementSibling.value;
  const subTotal = document.getElementById('sub-total');
  const subTotalValue = formatMoneyToNumber(subTotal.innerHTML);
  const priceShippingValue = formatMoneyToNumber(priceShippingElement.innerHTML);

  if (coupon === 'GROCERY1920' && subTotalValue > 199000) {
    priceDiscountElement.innerHTML = formatMoney(subTotalValue * (10 / 100));
    priceTotalElement.innerHTML = formatMoney(subTotalValue - (subTotalValue * (10 / 100)) + priceShippingValue);
  }
})