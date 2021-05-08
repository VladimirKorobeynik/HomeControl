function sidebarBlockShow(mainBlock, moreBlock, arrow) {
    moreBlock.style.maxHeight = moreBlock.scrollHeight + "px";
    arrow.style.transform = "rotate(0deg)";
    mainBlock.addEventListener('click', function() {
        if (moreBlock.style.maxHeight) {
            moreBlock.style.maxHeight = null;
            arrow.style.transform = "rotate(-90deg)";
        } else {
            moreBlock.style.maxHeight = moreBlock.scrollHeight + "px";
            arrow.style.transform = "rotate(0deg)";
        }
    });
}

function selectOption(arrOption) {
    let oldSelected;
    for (let i = 0; i < arrOption.length; i++) {
        arrOption[i].addEventListener('click', function() {
            let selectedElem = i;
            let countSelectedElem = document.getElementsByClassName('selected_categ_option');

            if (countSelectedElem.length == 0) {
                arrOption[selectedElem].classList.add('selected_categ_option');
                oldSelected = selectedElem;
            } else if (selectedElem == oldSelected) {
                arrOption[oldSelected].classList.remove('selected_categ_option');
            } else {
                arrOption[oldSelected].classList.remove('selected_categ_option');
                arrOption[selectedElem].classList.add('selected_categ_option');
                oldSelected = selectedElem;
            }
        });
    }
}

function setLeftValue(leftInput, rightInput, leftTumbler, range, minPriceInput) {
    let field = leftInput;
    let min = parseInt(field.min);
    let max = parseInt(field.max);

    field.value = Math.min(parseInt(field.value), parseInt(rightInput.value) - 1);

    let percent = ((field.value - min) / (max - min)) * 100;

    leftTumbler.style.left = percent + '%';
    range.style.left = percent + '%';

    minPriceInput.value = field.value;
}

function setRightValue(leftInput, rightInput, rightTumbler, range, maxPriceInput) {
    let field = rightInput;
    console.log(field);
    let min = parseInt(field.min);
    let max = parseInt(field.max);

    field.value = Math.max(parseInt(field.value), parseInt(leftInput.value));

    let percent = ((field.value - min) / (max - min)) * 100;

    rightTumbler.style.right = (100 - percent) + '%';
    range.style.right = (100 - percent) + '%';

    maxPriceInput.value = field.value;

}

export { sidebarBlockShow, selectOption, setLeftValue, setRightValue };