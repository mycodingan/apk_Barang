document.addEventListener("DOMContentLoaded", function () {
    const loadingScreen = document.getElementById("loading-screen");

    loadingScreen.style.display = "flex";

    window.addEventListener("load", function () {
        setTimeout(function () {
            loadingScreen.style.animation = "fadeOut 0.5s";
            setTimeout(function () {
                loadingScreen.style.display = "none";
            }, 500);
        },1500);
    });
});
