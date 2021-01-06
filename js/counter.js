setInterval(() => {
    var counter = document.getElementById("counter").innerText;
    counter--;
    document.getElementById("counter").innerText = counter;

    if(counter == 0) {
        document.location.href = "../home/userHomePage.php";
    }
}, 1000); 