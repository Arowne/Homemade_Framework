var confirmer=document.getElementById('Confirmer');
//########VARIABLE D'INSERTION##########//

// Nom/Prenom
var Nom=document.getElementById('Nom');
var Nom_v= /^[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇÉÈÊËÎÏÔŒÙÛÜŸ\s-']+$/;

var Prenom=document.getElementById('Prenom');
var Prenom_v= /^[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇÉÈÊËÎÏÔŒÙÛÜŸ\s-']+$/;

// Surnom
var Surnom=document.getElementById('Surnom');
var Surnom_v= /^[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇÉÈÊËÎÏÔŒÙÛÜŸ\s-']+$/;

// Reponse secret
var Question_secret=document.getElementById('secretQ');

// Reponse secret
var Reponse_secret=document.getElementById('Reponse_secret');

//Date de naissance 
var n_annee=document.getElementById('n_annee');
var n_mois=document.getElementById('n_mois');
var n_jour=document.getElementById('n_jour');

// Email/Confirmation Email
var Email=document.getElementById('Email');
var Email_v=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var ConfEmail=document.getElementById('ConfEmail');

// Mots de passe/Confirmation Mots de passe
var Mdp=document.getElementById('Mdp');
var ConfMdp=document.getElementById('ConfMdp');

// Adresse: Numero de rue/Nom rue
var Numerorue=document.getElementById('Numerorue');
var Nomrue=document.getElementById('Nomrue');
var Nomrue_v= /^[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇÉÈÊËÎÏÔŒÙÛÜŸ\s-']+$/;
//Ville
var Ville=document.getElementById('Ville');
var Ville_v= /^[0-9a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇÉÈÊËÎÏÔŒÙÛÜŸ\s-']+$/;

// Code postale
var CP=document.getElementById('CP');

// Numero de telephone
var b_numerotel=document.getElementById('tel1');
var num_tel2=document.getElementById('tel2');
var num_tel3=document.getElementById('tel3');
var num_tel4=document.getElementById('tel4');
var num_tel5=document.getElementById('tel5');

// Mots de passe famille 
var Mdpfamille=document.getElementById('Mdpfamille');
//Confirmation Mots de passe famille 
var ConfMdpfamille=document.getElementById('ConfMdpfamille');

/*Abonnement*/
var abonnement=document.getElementById('abonnement');



// variable message d'erreur
var err_mess1=document.getElementById('err-mess1'); 
var err_mess2=document.getElementById('err-mess2');
var err_mess3=document.getElementById('err-mess3');
var err_mess4=document.getElementById('err-mess4');
var err_mess5=document.getElementById('err-mess5');
var err_mess6=document.getElementById('err-mess6');
var err_mess7=document.getElementById('err-mess7');
var err_mess8=document.getElementById('err-mess8');
var err_mess9=document.getElementById('err-mess9');
var err_mess10=document.getElementById('err-mess10');
var err_mess11=document.getElementById('err-mess11');
var err_mess12=document.getElementById('err-mess12');
var err_mess13=document.getElementById('err-mess13');
var err_mess14=document.getElementById('err-mess14');
var err_mess15=document.getElementById('err-mess15');
var err_mess16=document.getElementById('err-mess16');

function f_civilite(e){
	if (document.getElementById('Monsieur').checked==false && document.getElementById('Madame').checked==false) {
		e.preventDefault();
		err_mess1.style.display="block";
		err_mess1.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrée votre civilité";
	}else{
		err_mess1.style.display="none";
	}
}
function f_nom(e){
	if (Nom.value=="") {
		e.preventDefault();
		err_mess2.style.display="block";
		err_mess2.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer votre nom";
	}
	else if(Nom_v.test(Nom.value)==false){
		err_mess2.style.display="block";
		err_mess2.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer un nom valide sans caracteres speciaux hormis les caracteres speciaux suivant : ('-)";
		e.preventDefault();
	}
	else{
		err_mess2.style.display="none";
	}
}
function f_prenom(e){
	if (Prenom.value=="") {
		err_mess3.style.display="block";
		err_mess3.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer votre prenom";
		e.preventDefault();
	}
	else if(Prenom_v.test(Prenom.value)==false)
	{
		err_mess3.style.display="block";
		err_mess3.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer un prenom valide sans caracteres speciaux hormis les caracteres speciaux suivant : ('-)";
		e.preventDefault();
	}else{
		err_mess3.style.display="none";
	}
}
function f_surnom(e){
	if (Surnom.value=="") {
		err_mess4.style.display="block";
		err_mess4.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer votre surnom/pseudo";
		e.preventDefault();
	}
	else if(Surnom_v.test(Surnom.value)==false){
		err_mess4.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer un surnom/pseudovalide sans caracteres speciaux hormis les caracteres speciaux suivant : ('-)";
	}
	else{
		err_mess4.style.display="none";
	}
}
function f_date(e){
	if (n_annee.value=="" || n_mois.value=="" || n_jour.value=="") {
		err_mess5.style.display="block";
		err_mess5.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer votre date de naissance";
		e.preventDefault();
	}
	else{
		err_mess5.style.display="none";
	}
}
function f_email(e){
	if (Email.value=="") {
		err_mess6.style.display="block";
		err_mess6.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer votre email";
		e.preventDefault();
	}
	else if (Email_v.test(Email.value)==false) {
		err_mess6.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer un email valide exemple: exemple@exemple.fr";
	}
	else{
		err_mess6.style.display="none";
	}
}
function f_ConfEmail(e){
	if (ConfEmail.value=="") {
		err_mess7.style.display="block";
		err_mess7.innerHTML="<i class='fas fa-times-circle'></i>Veuillez confirmer votre email";
		e.preventDefault();	
	}
	else if (Email.value!=ConfEmail.value) {
		err_mess7.style.display="block";
		err_mess7.innerHTML="<i class='fas fa-times-circle'></i>Votre email de confirmation doit etre identique a votre email";
		e.preventDefault();	
	}
	else{
		err_mess7.style.display="none";
	}
}
function f_Mdp(e){
	if (Mdp.value=="") {
		err_mess8.style.display="block";
		err_mess8.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer votre mots de passe";
		e.preventDefault();	

	}else{
		err_mess8.style.display="none";
	}
}
function f_ConfMdp(e){
	if (ConfMdp.value=="") {
		err_mess9.style.display="block";
		err_mess9.innerHTML="<i class='fas fa-times-circle'></i>Veuillez confirmer votre mots de passe";	
		e.preventDefault();	
	}
	else if(Mdp.value!=ConfMdp.value){
		err_mess9.style.display="block";
		err_mess9.innerHTML="<i class='fas fa-times-circle'></i>Votre mots de passe de confirmation doit etre identique a votre mots de passe";	
		e.preventDefault();	
	}
	else{
		err_mess9.style.display="none";
	}
}
function f_adresse(e){
	if (Numerorue.value==""||Nomrue.value=="" || isNaN(Numerorue.value)) {
		err_mess10.style.display="block";
		err_mess10.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer une adresse valide complete(<i>N° de rue / bis-ter-quater...(facultatif) /Nom de votre voie</i>)";
		e.preventDefault();	
	}else if(Nomrue_v.test(Nomrue.value)==false){
		err_mess10.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer un nom de rue valide sans caracteres speciaux hormis les caracteres speciaux suivant : ('-)";
	}else{
		err_mess10.style.display="none";
	}
}
function f_ville(e){
	if (Ville.value=="") {
		e.preventDefault();	
		err_mess11.style.display="block";
		err_mess11.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer votre le nom de votre ville";
	}
	else if(Ville_v.test(Ville.value)==false){
		err_mess11.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer un surnom/pseudovalide sans caracteres speciaux hormis les caracteres speciaux suivant : ('-)";
	}
	else{
		err_mess11.style.display="none";
	}
}
function f_CP(e){
	if (CP.value=="") {
		e.preventDefault();	
		err_mess12.style.display="block";
		err_mess12.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer votre code postal";
	}
	else if (CP.value.length!=5 || isNaN(CP.value)) {
		e.preventDefault();	
		err_mess12.style.display="block";
		err_mess12.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrée votre code postal dans un format valide <i>exemple:75000</i>";
	}else{
		err_mess12.style.display="none";
	}
}
	// NUmero de telephone 
function f_tel(e){
	if (b_numerotel.value!="06") {
		err_mess13.style.display="block";
		err_mess13.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer un numero de telephone valide au format : 06-XX-XX-XX-XX";
		e.preventDefault();	
	}
	else if (b_numerotel.value.length!=2 || num_tel2.value.length!=2 || num_tel3.value.length!=2 || num_tel4.value.length!=2 || num_tel5.value.length!=2) {
		err_mess13.style.display="block";
		err_mess13.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer un numero de telephone valide au format : 06-XX-XX-XX-XX";
		e.preventDefault();	
	}
	else if (isNaN(b_numerotel.value) || isNaN(num_tel2.value) || isNaN(num_tel3.value) || isNaN(num_tel4.value) || isNaN(num_tel5.value)) {
		err_mess13.style.display="block";
		err_mess13.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entrer un numero de telephone valide au format : 06-XX-XX-XX-XX";
		e.preventDefault();	
	}
	else{
		err_mess13.style.display="none";
	}
}

function f_quest_sec(e){
	if (Question_secret.value=="") {
		e.preventDefault();
		err_mess14.style.display="block";
		err_mess14.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entré une question secrete";
	}
	else{
		err_mess14.style.display="none";
	}
}

function f_rep_sec(e){
	if (Reponse_secret.value=="") {
		e.preventDefault();
		err_mess15.style.display="block";
		err_mess15.innerHTML="<i class='fas fa-times-circle'></i>Veuillez entré une reponse secrete";
	}
	else{
		err_mess15.style.display="none";
	}
}
function f_abo(e){
	if (abonnement.value=="") {
		e.preventDefault();
		err_mess16.style.display="block";
		err_mess16.innerHTML="<i class='fas fa-times-circle'></i>Veuillez choisir votre abonnement";
	}
	else{
		err_mess16.style.display="none";
	}
}


// confirmer.addEventListener('click',f_validiter);
confirmer.addEventListener('click',f_civilite);
confirmer.addEventListener('click',f_nom);
confirmer.addEventListener('click',f_prenom);
confirmer.addEventListener('click',f_surnom);
confirmer.addEventListener('click',f_date);
confirmer.addEventListener('click',f_email);
confirmer.addEventListener('click',f_ConfEmail);
confirmer.addEventListener('click',f_Mdp);
confirmer.addEventListener('click',f_ConfMdp);
confirmer.addEventListener('click',f_adresse);
confirmer.addEventListener('click',f_ville);
confirmer.addEventListener('click',f_CP);
confirmer.addEventListener('click',f_tel);
confirmer.addEventListener('click',f_rep_sec);
confirmer.addEventListener('click',f_quest_sec);
confirmer.addEventListener('click',f_abo);

Nom.addEventListener('blur',f_nom);
Prenom.addEventListener('blur',f_prenom);
Surnom.addEventListener('blur',f_surnom);
Email.addEventListener('blur',f_email);
ConfEmail.addEventListener('blur',f_ConfEmail);
Mdp.addEventListener('blur',f_Mdp);
ConfMdp.addEventListener('blur',f_ConfMdp);
Nomrue.addEventListener('blur',f_adresse);
Numerorue.addEventListener('blur',f_adresse);
Ville.addEventListener('blur',f_ville);
CP.addEventListener('blur',f_CP);
b_numerotel.addEventListener('blur',f_tel);
num_tel2.addEventListener('blur',f_tel);
num_tel3.addEventListener('blur',f_tel);
num_tel4.addEventListener('blur',f_tel);
num_tel5.addEventListener('blur',f_tel);
Reponse_secret.addEventListener('blur',f_rep_sec);