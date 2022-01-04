function isValid(jsForm) {
			/*const jsForm = document.forms["jsForm"];*/
			const opinion= jsForm.opinion.value;
			if (opinion === "") {
				document.getElementById("msg").innerHTML = "*Give your opinion";
				return false;
			}
			if(opinion.length<10){
				document.getElementById("msg").innerHTML ="*Opinion length minimum 10";
				return false;
			}

			return true;
}
/*function sendData(search) {
	const valid = formValidation(search);
	if (valid) {
		const complain=search.complain.value;
		const xhttp = new XMLHttpRequest();

		xhttp.onreadystatechange = function() {
			document.getElementById("msg").innerHTML = this.responseText;
	    	document.getElementById("process").style.display = "none";	
		}	
	  xhttp.open("POST","../Controller/registerd_complaintAction.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send("complain="+complain);
	}
}*/