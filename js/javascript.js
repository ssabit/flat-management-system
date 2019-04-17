function signup() {
    var x = document.getElementById("reg");
	var y=document.getElementById("log");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
    } 
	else if (y.style.display === "none"){
		
		y.style.display = "block";
        x.style.display = "none";
	}
     
}