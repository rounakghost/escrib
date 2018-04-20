window.$ = document.querySelector.bind(document);

let app = {
    sidenav: false
};


app.toogle_sidenav = function (){
    // if(!app.sidenav)
    //     $("nav").style.width = "290px";
    // else
    //     $("nav").style.width = "0px";

    $("nav").classList.toggle("open");
    $("#sidenav-overlay").classList.toggle("overlay-on");
    $("#sidenav-btn").classList.toggle("sidenav-btn-change");
    app.sidenav = !app.sidenav;
};
app.init = function(){
    $("#sidenav-btn").addEventListener("click", app.toogle_sidenav);
    $("#sidenav-overlay").addEventListener("click", app.toogle_sidenav);
};

window.onload = function () {
    app.init();
};