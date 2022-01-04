function formValidation(search) {
	const Ticket_no = search.Ticket_no.value;
	const date = search.date.value;
	
	if (Ticket_no=== "") {
		document.getElementById("error1").innerHTML="*Select Ticket Number";
		return false;
	}
	else{
		document.getElementById("error1").innerHTML=" ";				 
	}
	if (date=== "") {
		document.getElementById("error2").innerHTML="*Select Date";
		return false;
	}
	else{
		document.getElementById("error2").innerHTML=" ";				 
	}
	return true;
}
function sendData(search) {
	const valid = formValidation(search);
	if (valid) {
		const Ticket_no=search.Ticket_no.value;
	  const date=search.date.value;
		const xhttp = new XMLHttpRequest();

		xhttp.onreadystatechange = function() {
			document.getElementById("msg").innerHTML = this.responseText;
	  	document.getElementById("process").style.display = "none";	
		}	
	  xhttp.open("POST","book_Ticket.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send("Ticket_no="+Ticket_no+"&date="+date);
	}
}

function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "block") {
    x.style.display = "block";
  } 
  else {
    x.style.display = "none";
  }
  const xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		  document.getElementById("content").innerHTML = this.responseText;
		}
		xhttp.open("GET","view_book_ticket1.php", true);
		xhttp.send();
}

        
