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

function addtocart(cod){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.location.href = 'cartPage.php';
      }
    };
    xhttp.open("GET", "cartUtils.php?q=" + cod, true);
    xhttp.send();
    
}

function deleteNotify(cod) {
  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("dynamicNotify").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "getDynamicNotify.php?query=" + cod, true);
    xhttp.send();
}