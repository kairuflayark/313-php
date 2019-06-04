function sign_in(username, password1, password2 = "") {
    if (password2 != "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            }
        };
        xmlhttp.open("GET", "passwordhandle.php?" + "username=" + username + "&password1=" + password1, true);
        xmlhttp.send();
    }
    else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.alert(this.responseText);
            }
        };
        xmlhttp.open("GET", "passwordhandle.php?" + "username=" + username + "&password1=" + password1 + "&password2=" + password2, true);
        xmlhttp.send();
    }
}