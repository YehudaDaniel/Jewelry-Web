var ElcolorTo = document.querySelector(".ElcolorTo"); //nav bar element
var ElcolorFrom = document.querySelectorAll(".ElcolorFrom"); //nav bar's content elements
var scroll = window.requestAnimationFrame || function(callback){
    window.setTimeout(callback, 1000/60);
};
var DisplayedEl = document.querySelectorAll(".on-screen");
var mobcheck;

window.addEventListener("scroll", function(){
    var CvalueTo = 255-255 * window.pageYOffset/(document.body.scrollHeight/6); // window height / body height = for rgb color
    var CvalueFrom = 255 * window.pageYOffset/(document.body.scrollHeight/14); 

    ElcolorTo.style.background = "rgb(" + CvalueTo + "," + CvalueTo + "," + CvalueTo + ")";

    for(var i =0; i<ElcolorFrom.length; i++){
        ElcolorFrom[i].style.color = "rgb(" + CvalueFrom + "," + CvalueFrom + "," + CvalueFrom + ")";
    }
});

//check for Phone/PC
var isMobile = /iPhone|iPad|iPod|Android|BlackBerry|Windows Phone/i.test(navigator.userAgent);
if (isMobile) {
      mobcheck = true;
} else {
    mobcheck = false;
}

//window is phone function
window.addEventListener("load", function(){
    if(mobcheck){
        document.querySelector(".Callform").setAttribute("action", "tel:+97250-693-4657");
    }
});


// loop through the window every 1000/60

function loop(){
    DisplayedEl.forEach(function(elem){
        if(IsElementInViewport(elem)){
            elem.classList.add("visible");
        }else{
            elem.classList.remove("visible");
        }
    });
    scroll(loop);
}

loop();

function IsElementInViewport(el){
    if(typeof jQuery === "function" && el instanceof jQuery){
        el = el[0];
    }
    var rect = el.getBoundingClientRect();
    return (
        (rect.top <=0 && rect.bottom >= 0)
    ||
    (rect.bottom >=(window.innerHeight || document.documentElement.clientHeight)&&
    rect.top <=(window.innerHeight || document.documentElement.clientHeight))
    ||
    (rect.top >= 0 &&
        rect.bottom <=(window.innerHeight || document.documentElement.clientHeight))
    );
}