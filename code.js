//Плавное перемещение
const anchous= document.querySelectorAll('a[href*="#"]')

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