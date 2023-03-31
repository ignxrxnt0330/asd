braindump.php.getELementByName("boton_completar").addEventListener('click',completar);

function completar() {
  // Get the data to update
  var datos = document.getElementById("data").value;

  // Send an AJAX request to the PHP script
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhttp.open("POST", "update_data.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("data=" + data);
}