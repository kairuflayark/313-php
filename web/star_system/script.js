function update_location (ship, location)
{
  
    var loadU = 'update.php?ship=' + ship + '&location=' + location;
    console.log(loadU);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
    
        }
    };
    xmlhttp.open("POST", loadU, true);
    xmlhttp.send();
}