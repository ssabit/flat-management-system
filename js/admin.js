function toggle(IDS) {
  var sel = document.getElementById('pg').getElementsByTagName('div');
  for (var i=0; i<sel.length; i++) { 
    if (sel[i].id != IDS){ 
		sel[i].style.display = 'none'; 
	}
	
	}
  
  var status = document.getElementById(IDS).style.display;
  if (status == 'block'){ 
		document.getElementById(IDS).style.display = 'none'; 
	}else
	{ 
		document.getElementById(IDS).style.display = 'block'; 
	}
	return false;
}