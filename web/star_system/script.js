function update_location (ship, location)
{
  
    var loadU = '?ship_id=' + ship + '&location_id=' + location;
    console.log(loadU);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    xmlhttp.open("POST", 'update.php' + loadU, true);
    xmlhttp.send();

}