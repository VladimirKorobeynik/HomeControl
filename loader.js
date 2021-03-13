//Прелоадер
window.onload = function () {
    const preloader = document.getElementById('preloader');
    setTimeout(function () {
      if (!preloader.classList.contains('pageLoad')) {
        preloader.classList.add('pageLoad');
      }
    }, 500);
}