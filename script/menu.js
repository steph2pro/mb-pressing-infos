let menue=document.querySelector("#lab");
let section=document.querySelector("section");
let e=true;
menue.addEventListener('click',function(){
	section.style.marginTop='500px';
	
	if (e) {
		
		e=false
	}else{
		section.style.marginTop='0px';
		e=true;
	}
})