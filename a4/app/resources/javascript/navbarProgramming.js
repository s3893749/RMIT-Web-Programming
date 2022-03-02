    let aboutUs = document.getElementById("about-us");
    let seatsAndPrices = document.getElementById("seats-and-prices");
    let nowShowing = document.getElementById("now-showing");
    linkClick();


    window.addEventListener('scroll', (e) => {

        //check for the about us section
        if(window.scrollY < window.innerHeight-100){
        aboutUs.style.textDecoration = "underline"
        }else{
            aboutUs.style.textDecoration = "none"
        }

        //check for the seats and prices section
        if(window.scrollY > window.innerHeight-100 && window.scrollY < window.innerHeight*2-100){
        seatsAndPrices.style.textDecoration = "underline"
        }else{
            seatsAndPrices.style.textDecoration = "none"
        }

        //check for the now showing section
        if(window.scrollY > window.innerHeight*2-100){
        nowShowing.style.textDecoration = "underline"
        }else{
            nowShowing.style.textDecoration = "none"
        }
    });

    //wait and check for url changes
    window.addEventListener('popstate', function (event){
        linkClick();
    })

    //call this function once on document load, then if the URL changes
    function linkClick(){
        let link = window.location.href.split("#");

        if(link[1] !== null){

            if(link[1] === "now-showing"){
                setTimeout(function () {
                    window.scrollTo(0, window.innerHeight*2-77);
                },2);
            }

            if(link[1] === "seats-and-prices"){
                setTimeout(function () {
                    window.scrollTo(0, window.innerHeight-77);
                },2);
            }

            if(link[1] === "about-us"){
                setTimeout(function () {
                    window.scrollTo(0, 0);
                },2);
            }

        }
    }






