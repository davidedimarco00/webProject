

$(".btn").click(function() {
    var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("dynamicNotify").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "getDynamicNotify.php?query=" + "deletequery", true);
          xhttp.send();
        }
);

