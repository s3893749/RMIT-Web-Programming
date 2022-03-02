//created by Jack Harris
window.addEventListener("DOMContentLoaded",function (){

    const slider = document.getElementById("imageSlider");
    const slides = slider.children;

    let slideCounter = 0;

    slides[0].style.display = "block";

    setInterval(()=>{
        slides[slideCounter].style.display = "none";

        if(slideCounter >= slides.length-1){
            slideCounter = 0;
        }else {
            slideCounter++;
        }

        slides[slideCounter].style.display = "block";
    },5000)

})

