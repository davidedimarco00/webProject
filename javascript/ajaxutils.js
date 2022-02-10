function dynamicProduct(cat) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      document.getElementById("dynamicByCategory").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "getDynamicProducts.php?q=" + cat, true);
    xhttp.send();
  }