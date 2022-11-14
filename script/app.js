let btn=document.querySelector('#btn');
let attention=document.querySelector('.attention');
let success=document.querySelector('.success');
let erreur=document.querySelector('.erreur');

function postMessage(event){
	//1. ont stop la soumition du formulaire pour empecher le rafrechissement
		event.preventDefault();
		 
	

	//2. ont recupere les donnee du formulaire
	const email = document.querySelector('#email');
	const sujet = document.querySelector('#sujet');
	const message = document.querySelector('#message');
	//3. on condittionne les donees
	const data = new FormData();
	data.append('email',email.value);
	data.append('sujet',sujet.value);
	data.append('message',message.value);
	
	//4. on configure la requete AJAX en POST et on envoie les donnees
	if (email.value !='' && sujet.value !='' && message.value !='') {

		btn.style.backgroundColor='dodgerblue';
		const requeteAjax = new XMLHttpRequest();
		requeteAjax.open('POST', 'send.php');

		requeteAjax.onload = function(){
			message.value='';
			message.focus();
			const resultat = JSON.parse(requeteAjax.responseText);
			
			if (resultat["status"]==="success") {
				erreur.style.display="none";
				success.style.display="block";
				attention.style.display='none';
			} else {erreur.style.display="none";
				success.style.display="block";
				erreur.style.display="block";
			}
		
		}

		requeteAjax.send(data);

	} else {
		btn.style.backgroundColor='firebrick';
		success.style.display="none";
		erreur.style.display="none";
		attention.style.display='block';
	}
}

document.querySelector('form').addEventListener('submit',postMessage);
