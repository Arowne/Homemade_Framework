var errcnx =document.getElementById('err-messcnx');
var login= document.getElementById('email');
var password= document.getElementById('password');
var submit= document.getElementById('submit');


function v_account(e){

	if ( login.value==="" || password.value==="") {
		e.preventDefault();
		e.preventDefault();
		errcnx.style.display='block';
		errcnx.style.width='450px';
		errcnx.style.fontSize='10px';
		errcnx.textContent="Veuillez entrée l'email  et  mots de passe correspondant à votre compte MyCinema";
	}
}

submit.addEventListener('click', v_account);