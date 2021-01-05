const setTableCookie = () => {
  const table = document.getElementById("staff").value
  document.cookie = "table=" + table
  location.reload()
}
