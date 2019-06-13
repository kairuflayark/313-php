function get_list ()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
    
        }
    };
    xmlhttp.open("GET", "starship_list", true);
    xmlhttp.send();
}