document.cookie = "Informatie=Cookie";

function openNav() {
    document.getElementById("myNav").style.width = "100%";
    document.querySelector(".hamburger-menu").style.display = "none";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0";
    document.querySelector(".hamburger-menu").style.display = "block";
}