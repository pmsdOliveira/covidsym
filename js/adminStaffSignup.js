const validateUsername = (username) =>
    /^(?=.{8,50}$)[a-zA-Z0-9_. ]+$/.test(username);

const validateEmail = (email) => {
    const regex = /^(?=.{8,100}$)(([a-zA-Z0-9_.-]+(\.[a-zA-Z0-9_.-]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(email);
};

const validatePassword = (password) =>
    /^(?=.*[a-zA-Z0-9]).{8,}$/.test(password);

const validateName = (name) =>
    /^(?=.{5,100}$)[A-zÀ-ú]+(?: [A-zÀ-ú]+)*$/.test(name);

const validatePhone = (phone) => /^(?=.{8,20}$)[-\s0-9]*$/.test(phone);

const validateAddress = (address) =>
    /^(?=.{5,100}$)[\s\dA-zÀ-ú,.ºª'"@#-]+$/.test(address);

const validateAdminStaffSingup = () => {
    const username = document.getElementById("signup-username").value;
    const email = document.getElementById("signup-email").value;
    const password = document.getElementById("signup-password").value;
    const name = document.getElementById("profile-name").value;
    const phone = document.getElementById("profile-phone").value;
    const address = document.getElementById("profile-address").value;

    if (!validateUsername(username)) {
        alert(
            "Please insert a valid username (8 to 50 alphanumeric, space, . or _ characters)."
        );
        return false;
    }

    if (!validateEmail(email)) {
        alert(
            "Please insert a valid email (8 to 100 alphanumeric, _, ., - or @ characters)."
        );
        return false;
    }

    if (!validatePassword(password)) {
        alert("Please insert a valid password (8 to 50 characters).");
        return false;
    }

    if (!validateName(name)) {
        alert(
            "Please insert a valid name (5 to 100 alphabetic characters and whitespaces)."
        );
        return false;
    }

    if (!validatePhone(phone)) {
        alert(
            "Please insert a valid phone number (8 to 20 digits)."
        );
        return false;
    }

    if (!validateAddress(address)) {
        alert(
            "Please insert a valid address (5 to 100 alphanumeric characters, º, #, etc.)."
        );
        return false;
    }

    return true;
};
