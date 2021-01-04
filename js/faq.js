var accordions = document.getElementsByClassName("accordion");

for (var i = 0; i < accordions.length; i++) {
    accordions[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
        hideAll(this);
    });
}

function hideAll(exceptThis) {
    for (var i = 0; i < accordions.length; i++) {
        if (accordions[i] !== exceptThis) {
            accordions[i].classList.remove("active");
            var panel = accordions[i].nextElementSibling;
            panel.style.maxHeight = null;
        }
    }
}