///index.html hamberger-menu
const mainMenu = document.querySelector('.mainMenu');

const openMenu = document.querySelector('.openMenu');
const closeMenu = document.querySelector('.closeMenu');


openMenu.addEventListener('click', show);
closeMenu.addEventListener('click', close);

function show() {
    mainMenu.style.display = 'flex';
    mainMenu.style.top = '0';
}
function close() {
    mainMenu.style.top = '-100%';
}


//studentinfo.html  select year
window.onload = function () {
    var year = document.getElementById("year");
    var currentYear = (new Date()).getFullYear();

    for (var i = 2015; i <= currentYear; i++) {
        var option = document.createElement("OPTION");
        option.innerHTML = i;
        if (i === currentYear) option.selected = true;
        year.appendChild(option);
    }
};

var slides = document.querySelector('.slider-items').children;
var nextSlide = document.querySelector(".right-slide");
var prevSlide = document.querySelector(".left-slide");

var totalSlides = slides.length;
var index =0;

nextSlide.onclick=function(){
    next("next");
}
prevSlide.onclick=function(){
    next("prev");
}
function next(direction){
    if(direction=="next"){
        index++;
        if(index==totalSlides){
            index = 0;
        }
    }
        else{
            if(index==0){
                index=totalSlides -1;
            }
            else{
                index--;
            }
        }

    for(i=0; i < slides.length;i++){
        setInterval(2000);
        slides[i].classList.remove("active");
        setInterval(() => {
            
        }, 2000);
    }
    slides[index].classList.add("active")
}

// function validateForm(){
	
// 	var symbolNo=document.neb.symbol;
// 	var dob=document.neb.dob;
	
// 	if(symbolNo.value=="") {
// 		alert("Please enter the vaild symbol number and search again !!!");
// 		symbolNo.focus();
// 		return false;
// 	}
	
// 	if(dob.value==""){
// 		alert("Please enter the vaild Date of Birth !!!");
// 		dob.focus();
// 		return false;
// 	}
	
// return true;
// }
