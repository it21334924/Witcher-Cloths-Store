function validateForm() {
    //collect form data in JavaScript variables
    var pw1 = document.getElementById("pswd1").value;
    var pw2 = document.getElementById("pswd2").value;
    
    if(pw1 != pw2) {
      document.getElementById("message2").innerHTML = "**Passwords are not same";
      return false;
    } else {
      alert ("Your Accout has been created successfully");
    }
 }