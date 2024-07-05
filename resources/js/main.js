const prev = document.getElementsByClassName('slick-prev');
const next = document.getElementsByClassName('slick-next');

const lengthPrev = prev.length;
if (lengthPrev) {
    for (let i = 0; i < lengthPrev; i++) {
        next[i].classList.remove('slick-arrow');
        next[i].style = '    display: block;\n' +
            '    z-index: 7;\n' +
            '    background-color: rgba(0, 0, 0, 0.5);\n' +
            '    width: 50px;\n' +
            '    height: 50px;\n' +
            '    border-radius: 5px;\n' +
            '    right: 0;';
        prev[i].classList.remove('slick-arrow');
        prev[i].style = '    display: block;\n' +
            '    z-index: 7;\n' +
            '    background-color: rgba(0, 0, 0, 0.5);\n' +
            '    width: 50px;\n' +
            '    height: 50px;\n' +
            '    border-radius: 5px;\n' +
            '    left: 0;';
    }
}
