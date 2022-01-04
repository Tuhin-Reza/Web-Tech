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
	  xhttp.open("POST","book_ticket2.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send("Ticket_no="+Ticket_no+"&date="+date);
	}
}

function myFunction() {
	const valid = formValidation(search);
	if (valid) {

		var x = document.getElementById("myDIV");
    if (x.style.display === "block") {
    x.style.display = "block";
  } 
  else {
    x.style.display = "none";
  }
		const Ticket_no  = search.Ticket_no.value;
	  const date = search.date.value;
		const xhttp = new XMLHttpRequest();

		xhttp.onreadystatechange = function() {
			document.getElementById("content").innerHTML = this.responseText;
	  	document.getElementById("process").style.display = "none";	
		}	
	  xhttp.open("POST","../Controller/booking_cancelAction.php", true);
	  xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	  xhttp.send("Ticket_no="+Ticket_no+"&date="+date);
	}
}
