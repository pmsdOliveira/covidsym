const setTableCookie = () => {
  const table = document.getElementById("staff").value
  document.location.href = "staffList?page=1&type=" + table
}
