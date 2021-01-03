const validateUsername = username => /^(?=.{8,50}$)[a-zA-Z0-9_.]+$/.test(username)

const validateEmail = email => {
  const regex = /^(?=.{8,50}$)(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
  return regex.test(email)
}

const validatePassword = password => /^(?=.*\d*[a-zA-Z]*).{8,50}$/.test(password)

const validateConfirmPassword = (password, confirmPassword) => password === confirmPassword


// USER SIGNUP

const validateUserSignupForm = () => {
  const username = document.getElementById("signup-username").value
  const email = document.getElementById("signup-email").value
  const password = document.getElementById("signup-password").value
  const confirmPassword = document.getElementById("signup-confirm-password").value

  if (!validateUsername(username)) {
    alert("Please insert a valid username (8 to 50 alphanumeric or _ characters).")
    return false
  }

  if (!validateEmail(email)) {
    alert("Please insert a valid email (8 to 50 alphanumeric, _, . or @ characters).")
    return false
  }

  if (!validatePassword(password)) {
    alert("Please insert a valid password (8 to 50 characters).")
    return false
  }

  if (!validateConfirmPassword(password, confirmPassword)) {
    alert("Please insert a matching password in Confirm Password.")
    return false
  }

  return true
}