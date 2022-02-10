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

function searchProduct(string) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("dynamicByCategory").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getDynamicProducts.php?q=" + "search&t="+string, true);
  xhttp.send();
}


// Execute a function when the user releases a key on the keyboard
var input = document.getElementById("searchbar");
   input.addEventListener("keydown", function (e) {
    if (e.key === "Enter") {  
      validate(e);
    }
  });

   function validate(e) {
    var text = e.target.value;
    searchProduct(input.value);
}



