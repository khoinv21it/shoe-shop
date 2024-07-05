const btnSearchElement = document.querySelector('#btn-search');

console.log(btnSearchElement, 'btnSearchElement');

btnSearchElement.addEventListener('click', () => {
    const keyword = btnSearchElement.previousElementSibling.value;
    window.location.href = `/categories?search=${keyword}`;
});
