var selectBtns = document.getElementsByClassName("patient-button");

for(var i = 0; i < selectBtns.length; i++) {
    selectBtns[i].addEventListener("click", function() {
        document.location.href = 'userProfile?patientID=' + this.id;
    });
}