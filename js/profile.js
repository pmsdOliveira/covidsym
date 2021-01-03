const validateName = name => /^(?=.{5,100}$)[A-zÀ-ú]+(?: [A-zÀ-ú]+)*$/.test(name)

const validateEmail = email => {
  const regex = /^(?=.{8,50}$)(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
  return regex.test(email)
}

const validatePhone = phone => /^(?=.{8,20}$)[+]{1}[-\s0-9]*$/.test(phone)

const validateAddress = address => /^(?=.{10,100}$)[\s\dA-zÀ-ú,.ºª'"-]+$/.test(address)

const validateLocalOrDistrict = localOrDistrict => /^(?=.{10,100}$)[\sA-zÀ-ú,.ºª'"-]+$/.test(localOrDistrict)

const validateBirthdate = birthdate => {{
  const currentDate = new Date();
  const currentYear = currentDate.getFullYear();

  const parts = birthdate.split("/");
  const day = parseInt(parts[0]);
  const month = parseInt(parts[1]);
  const year = parseInt(parts[2]);

  if(year < currentYear - 150 || year > currentYear || month < 1 || month > 12)
      return false;

  let monthsLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

  // Ano bissexto
  if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
      monthsLength[1] = 29;

  if (day > 0 && day <= monthsLength[month - 1]) {
    let dateFormat = year.toString() + "/" + month.toString() + "/" + day.toString();
    document.getElementById("profile-birthdate").value = dateFormat;

    return true;
  }
}

const validateFiscalOrHealthcare = fiscalOrHealthcare => /^(?=.{7,11}$)[\d]*$/.test(fiscalOrHealthcare)


// USER PROFILE

const validateUserProfileForm = () => {
  const name = document.getElementById("profile-name").value
  const email = document.getElementById("profile-email").value
  const phone = document.getElementById("profile-phone").value
  const address = document.getElementById("profile-address").value
  const local = document.getElementById("profile-local").value
  const district = document.getElementById("profile-district").value
  const birthdate = document.getElementById("profile-birthdate").value
  const fiscal = document.getElementById("profile-fiscal").value
  const healthcare = document.getElementById("profile-healthcare").value

  if (!validateName(name)) {
    alert("Please insert a valid name (5 to 100 alphabetic characters and whitespaces).")
    return false
  }

  if (!validateEmail(email)) {
    alert("Please insert a valid email (8 to 50 alphanumeric, _, . or @ characters).")
    return false
  }

  if (!validatePhone(phone)) {
    alert("Please insert a valid phone number (8 to 20 digits starting with '+' and your country code).")
    return false
  }

  if (!validateAddress(address)) {
    alert("Please insert a valid address (10 to 100 alphanumeric characters, ', \", ., º, ª, etc.).")
    return false
  }

  if (!validateLocalOrDistrict(local)) {
    alert("Please insert a valid local (10 to 100 alphabetic characters, ', \", ., º, ª, etc.).")
    return false
  }

  if (!validateLocalOrDistrict(district)) {
    alert("Please insert a valid district (10 to 100 alphabetic characters, ', \", ., º, ª, etc.).")
    return false
  }

  if (!validateBirthdate(birthdate)) {
    alert("Please insert a valid birthdate (maximum 150 years old).")
    return false
  }

  if (!validateFiscalOrHealthcare(fiscal)) {
    alert("Please insert a valid fiscal number (7 to 11 digits).")
    return false
  }

  if (!validateFiscalOrHealthcare(healthcare)) {
    alert("Please insert a valid healthcare number (7 to 11 digits).")
    return false
  }

  return true
}
}