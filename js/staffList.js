const setTableCookie = () => {
  const table = document.getElementById("staff").value
  document.cookie = "table=" + table
  document.location.href = "staffList?page=1"
}
