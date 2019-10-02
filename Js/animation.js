
//Funzione che gestisce le animazioni
function AnimationSlide() {
    
    //Inizializzazione timeline
    const tl = new TimelineMax();

    //Gestione della visibilità iniziale degli elementi in apparizione
    TweenMax.to(".navigation-bar",0.1, {autoAlpha: 0});
    TweenMax.to(".camere",0.1, {autoAlpha: 0});

    //timeline che gestisce la tempistica delle varie animazioni
    tl.to(".content", 0.1, {autoAlpha: 0})
    .to(".ct-style", 0.5, {autoAlpha: 0})
    .to(".layer", 0.5, {autoAlpha: 0})
    .to(".top",1, {height: 0})
    .to(".down",1, {height: "100%"}, "-=1")
    tl.fromTo(".navigation-bar",1,{autoAlpha: 1, x: "-100%"}, {x: "0%", ease: Power2.easeInOut})
    tl.fromTo(".camere",1,{x: 30}, {autoAlpha: 1, x:0, ease: Power2.easeInOut}, "-=0.5");
}
