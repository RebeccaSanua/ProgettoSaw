function buttonClick(id) {
    var element = document.getElementById(id);
    if (element) {
        element.style.transform = "scale(0.95)";
        setTimeout(function() {
            element.style.transform = "";
        }, 150);
    }
}
