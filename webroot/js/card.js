window.onload = function(){

	var button = document.querySelectorAll('button');
	var slideIndex = 1;
	showSlide(slideIndex);

	function plusSlide(n){
	 showSlide(slideIndex += n);
	}

	function showSlide(n){
		var i;
		var progDiv = document.querySelectorAll('.carroussel-prog');
/*		e.preventDefault();*/
		
		if (n > progDiv.length) { slideIndex = 1; }
		if (n < 1) { slideIndex = progDiv.length; }
		for (var i = 0; i < progDiv.length; i++) {
			progDiv[i].style.display="none";
		}
		progDiv[slideIndex-1].style.display = "block";
	}

	button[0].addEventListener('click',function(){
		plusSlide(-1);
	});

	button[1].addEventListener('click',function(){
		plusSlide(1);
	});

	var radioS = document.querySelectorAll(".radio-seance");
	var reserved = document.querySelector('#submit');
	var uncheck = 0; 

	function  checkedRadio(e){
		for (var i = 0; i < radioS.length; i++) {
			if (radioS[i].checked) {
				uncheck = 1;
			}
		}
		if (uncheck == 0) {
			e.preventDefault();
			alert("Veuillez choisir un creneaux");
		}
	}

	reserved.addEventListener('click', checkedRadio);
}