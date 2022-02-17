let aboutUs = document.getElementById("about-us");
    let seatsAndPrices = document.getElementById("seats-and-prices");
    let nowShowing = document.getElementById("now-showing");

    console.log("test")
    window.addEventListener('scroll', (e) => {

    console.log("Y = "+window.scrollY);
    console.log("screen height"+window.innerHeight);

    //check for the about us section
    if(window.scrollY < window.innerHeight){
    aboutUs.style.textDecoration = "underline"
}else{
    aboutUs.style.textDecoration = "none"
}

    //check for the seats and prices section
    if(window.scrollY > window.innerHeight && window.scrollY < window.innerHeight*2){
    seatsAndPrices.style.textDecoration = "underline"
}else{
    seatsAndPrices.style.textDecoration = "none"
}

    //check for the now showing section
    if(window.scrollY > window.innerHeight*2){
    nowShowing.style.textDecoration = "underline"
}else{
    nowShowing.style.textDecoration = "none"
}
})
