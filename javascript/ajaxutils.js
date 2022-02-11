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

function removefromcart(cod){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("dynamicCart").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getDynamicCart.php?q=" + cod, true);
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

function searchProduct(string) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("dynamicByCategory").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getDynamicSearch.php?q=" + string, true);
  xhttp.send();
}


// Execute a function when the user releases a key on the keyboard
var input = document.getElementById("searchbar");
input.addEventListener("keydown", function (e) {
    if (e.key === "Enter") {  
      var text = e.target.value;
      searchProduct(input.value);
    }
});


