function update_session_value(name, value) {

    var loadU = "session.php?" + name + "=" + value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
        }
    }
    xhttp.open("GET", loadU, true);
    xhttp.send();

        
    }