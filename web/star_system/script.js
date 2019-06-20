function update_location (ship, location)
{
  
    var loadU = 'update.php?ship_id=' + ship + '&location_id=' + location;
    console.log(loadU);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", loadU, true);
    xmlhttp.send();

}

function add_ship(params) {
    var loadU = 'update.php?';
    var elem = document.getElementById('data').elements;
    loadU += elem[0].name + '=' + elem[0].value;
    for (var i = 1; i <elem.length; i++){
        loadU += "&" + elem[i].name + "=" + elem[i].value;
    }
    console.log(loadU);
}