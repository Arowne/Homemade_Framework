var errmess = document.querySelectorAll('.err-mess');
var input = document.querySelectorAll('input');
var span = document.querySelectorAll('span');
var textarea = document.querySelector('textarea');
console.log(textarea);
var button = document.querySelector('button');



function v_title(e){
	if (input[1].value == "") {
		e.preventDefault();
		errmess[0].style.display = 'block';
		errmess[0].style.color = 'red';
		errmess[0].innerHTML = "Veuillez entrée un titre de film";
	}
}
function v_duree(e){
	if(input[2].value == ""){
		e.preventDefault();
		errmess[1].style.display = 'block';
		errmess[1].style.color = 'red';
		errmess[1].innerHTML = "Veuillez signifiée la durée du film";
	}
}
function v_annee(e){
	if(input[3].value == ""){
		e.preventDefault();
		errmess[2].style.display = 'block';
		errmess[2].style.color = 'red';
		errmess[2].innerHTML = "Veuillez entrée l'année de production du film ";
	}
}
function v_debut(e){
	if(input[4].value == ""){
		e.preventDefault();
		errmess[3].style.display = 'block';
		errmess[3].style.color = 'red';
		errmess[3].innerHTML = "Veuillez entrée la date de debut d'affiche ";
	}
}
function v_fin(e){
	if(input[5].value == ""){
		e.preventDefault();
		errmess[4].style.display = 'block';
		errmess[4].style.color = 'red';
		errmess[4].style.marginLeft = '50px';
		errmess[4].innerHTML = "Veuillez entrée la date de fin d'affiche ";
	}
}
function v_distrib(e){
	if(input[6].value == ""){
		e.preventDefault();
		errmess[7].style.display = 'block';
		errmess[7].style.color = 'red';
		errmess[7].innerHTML = " Veuillez entrée le distributeur du film ";
	}
}

function v_am(e){
	if (input[7].value == "") {
		e.preventDefault();
		errmess[8].style.display = 'block';
		errmess[8].style.color = 'red';
		errmess[8].style.maxWidth = '1000px';
		errmess[8].innerHTML = " Veuillez entrée la programmation du matin,apres-midi et soir ";
	}
}
function v_pm(e){
	if (input[8].value == "") {
		e.preventDefault();
		errmess[8].style.display = 'block';
		errmess[8].style.color = 'red';
		errmess[8].style.maxWidth = '1000px';
		errmess[8].innerHTML = " Veuillez entrée la programmation du matin,apres-midi et soir ";
	}
}
function v_soir(e){
	if (input[9].value == "") {
		e.preventDefault();
		errmess[8].style.display = 'block';
		errmess[8].style.color = 'red';
		errmess[8].style.maxWidth = '1000px';
		errmess[8].innerHTML = " Veuillez entrée la programmation du matin,apres-midi et soir ";
	}
}
function v_i_min(e){
	e.preventDefault();
	var imageInfo1 = input[10].files[0];
	console.log(imageInfo1.name);
}
function v_i_moy(e){
	e.preventDefault();
	var imageInfo2 = input[11].files[0];
	console.log(imageInfo2.name);
}
function v_i_gran(e){
	e.preventDefault();
	var imageInfo3 = input[12].files[0];
	console.log(imageInfo3.name);
}
function v_resum(e){
	if (textarea.value == "") {
		e.preventDefault();
		errmess[13].style.display = 'block';
		errmess[13].style.color = 'red';
		errmess[13].style.maxWidth = '1000px';
		errmess[13].innerHTML = " Veuillez entrée un resumé au film ajouté ";
	}
}
var allF = [ v_title, v_duree, v_annee, v_debut, v_fin, v_distrib, v_am, v_pm, v_soir, v_i_min, v_i_moy, v_i_gran, v_resum];


for (var i = 0; i < input.length ; i++) {
	input[i].addEventListener('blur', allF[i]);
}
for (var i = 0; i < input.length ; i++) {
	button.addEventListener('click', allF[i]);
}