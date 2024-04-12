var password = "NSW2024@";
(function passcodeprotect() {
   var passcode = prompt("Enter Password");
   while (passcode !== password) {
      alert("Incorrect Password");
      return passcodeprotect();
   }
}());