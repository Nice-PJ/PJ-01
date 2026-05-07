function showpass() {
  var x = document.getElementById("password");
  var y = document.getElementById("c_password");
  if (x.type === "password" && y.type === "c_password") {
    x.type = "text";
    y.type = "text";
  } else {
    x.type = "password";
    y.type = "c_password";
  }
}
