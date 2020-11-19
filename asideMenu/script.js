var aside = document.querySelector('aside');
var menu = document.querySelector('i');

menu.addEventListener('click', function(e){
  aside.classList.toggle('active');
  menu.style.display = 'none';
  e.stopPropagation();
});

window.addEventListener('click', function(){
  aside.classList.remove('active');
  menu.style.display = 'block';
});