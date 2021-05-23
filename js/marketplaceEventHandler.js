//Animation show block
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

//Select option
function selectOption(arrOption) {
    for (let i = 0; i < arrOption.length; i++) {
        arrOption[i].addEventListener('click', function() {
            toParameter("categoria",  $(arrOption[i]).attr("categoria_id"));
        });
    }
}

//Left button slider
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

//Right button slider
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

//Contacts
function setEventContacts() {
    document.getElementById('contactLink').onclick = function() {
        let contactWindow = document.getElementById('contactWind');
        let wrapperContacts = document.getElementById('wrapperContacts');

        if (contactWindow.style.maxHeight) {
            contactWindow.style.padding = "0 40px";
            contactWindow.style.maxHeight = null;
            wrapperContacts.classList.remove('active_contacts');
        } else {
            contactWindow.style.padding = "40px 40px";
            contactWindow.style.maxHeight = contactWindow.scrollHeight + "px";
            wrapperContacts.classList.add('active_contacts');
        }
    }
}

export { sidebarBlockShow, selectOption, setLeftValue, setRightValue, setEventContacts };