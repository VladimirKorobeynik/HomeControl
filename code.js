//Плавное перемещение
const anchous = document.querySelectorAll('a[href*="#"]')

for (let anchor of anchous) {
  anchor.addEventListener('click', function (e) {
    e.preventDefault()//Отменяет стандартное перемещение браузера
    
    const blockID = anchor.getAttribute('href').substr(1)
    
    document.getElementById(blockID).scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    })
  })
}

//Возврат на верх страницы
let upButton = document.getElementById("upBtn");
let stat = 0;
let isShowStat = false;

window.onscroll = function () {
  if (window.pageYOffset > 50) {
    upButton.style.zIndex = 10;
    upButton.style.opacity = 1;
  } else {
    upButton.style.zIndex = -1;
    upButton.style.opacity = 0;
  }
  
  //Test update stat
  if (window.pageYOffset > 800) {
    if (!isShowStat) {
      upStat(stat);
      isShowStat = true;
    }
  }
}

//Test update stat
function upStat(stat) {
  let timerId = setInterval(function() {

    let statArr = document.getElementsByClassName("stat_count");

    for (let i = 0; i < statArr.length; i++) {
      statArr[i].innerHTML = stat;
    }

    if (stat == 33) {
      clearInterval(timerId);
    }
    stat++;
  }, 35);
}


//Button up
upButton.onclick = function () {
  document.getElementById("header").scrollIntoView({
    behavior: 'smooth',
    block: 'start'
  })
}
