const validateForm = () => {
  const temperature = document.getElementById("temperature").value

  if (temperature < 30 || temperature > 45) {
    alert("Invalid temperature. Must be between 30 ºC and 45 ºC")
    return false;
  }

  return true;
}