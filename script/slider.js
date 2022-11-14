
var img_slider=document.getElementsByClassName('image_slider');
let etape=0;
let nbre_img=img_slider.length;
let precedent=document.querySelector(".precedent");
let suivant=document.querySelector(".suivant");

function remove_active_img() {
	for (var i = 0; i < nbre_img; i++) {
		img_slider[i].classList.remove('active');
	}
	
}
suivant.addEventListener("click",function(){
		etape++;
		if (etape>=nbre_img) {etape=0;}
		remove_active_img();
		img_slider[etape].classList.add('active');
	});
precedent.addEventListener('click',function(){
	etape--;
	if (etape<0) {etape=nbre_img;}
	remove_active_img();
	img_slider[etape].classList.add('active');

});
setInterval(function(){
	etape++;
	if (etape>=nbre_img) {etape=0;}
	remove_active_img();
	img_slider[etape].classList.add('active');
},3000);