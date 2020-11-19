var alertDanger = document.querySelectorAll('.alert-danger');
const alertSuccess = document.querySelector('.alert-success');
const alert = document.querySelector('#alert');

setTimeout(function(){
	for(var i = 0; i < alertDanger.length; i++){
		alertDanger[i].classList.add('visible');
	}
}, 5000);

setTimeout(function(){
	alertSuccess.classList.add('visible');
}, 5000);

setTimeout(function(){
	alert.classList.add('invisible');
}, 5000);