var cartButton = document.getElementById('cart-btn');
var maximiseButton = document.getElementById('maximise');
var minimiseButton = document.querySelector('#minimise');
var cartContainer = document.querySelector('.cart-container');
var btnNotification = document.querySelectorAll('.btn-notification');

minimiseButton.addEventListener('click', function(){
	cartContainer.classList.remove('cart-active');
	cartContainer.classList.remove('cart-active-max');
});
maximiseButton.addEventListener('click', function(){
	cartContainer.classList.toggle('cart-active-max');
});



cartButton.addEventListener('click', function(){
	cartContainer.classList.toggle('cart-active');
});

// for(var i = 0; i < btnNotification.length; i++){
// 	btnNotification[i].addEventListener('click', function(){
// 		cartButton.classList.add('cart-notification');
// 	});
// }

