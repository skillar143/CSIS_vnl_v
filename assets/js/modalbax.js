//  get elements
var modal = document.getElementById('modal-box');
var modal1 = document.getElementById('modal-box1');
var stdmBtn = document.getElementById('stdsm');
var tchrmBtn = document.getElementById('tchrsm');
var clsBtn = document.getElementById('cls');
var clsBtn1 = document.getElementById('cls1');


//mouse click
stdmBtn.addEventListener('click', stdm);
tchrmBtn.addEventListener('click', tchrm);
clsBtn.addEventListener('click', clsm,);
clsBtn1.addEventListener('click', clsm1,);


// function

function clsm(){ 
    modal.style.display = 'none'; 
}   
function clsm1(){ 
    modal1.style.display = 'none'; 
}  
function stdm(){
    modal.style.display = 'block' ;
}
function tchrm(){
    modal1.style.display = 'block';
}