function formValidation(confirm_ticket) {
	const date = confirm_ticket.date.value;
	const fullname = confirm_ticket.fullname.value;
	const idnumber = confirm_ticket.idnumber.value;
	const passno = confirm_ticket.passno.value;
	const passserial = confirm_ticket.passserial.value;
	const age = confirm_ticket.age.value;
	const Phone = confirm_ticket.Phone.value;
	const person = confirm_ticket.person.value;
	const gender = confirm_ticket.gender.value;
	if (date=== "") {
		document.getElementById("error1").innerHTML="*Select Date";
		return false;
	}
	else{
		document.getElementById("error1").innerHTML=" ";				 
	}
	if (fullname=== "") {
		document.getElementById("error2").innerHTML="*Enter Fullname";
		return false;
	}
	else{
		document.getElementById("error2").innerHTML=" ";				 
	}
	if (idnumber=== "") {
		document.getElementById("error3").innerHTML="*Enter National Id";
		return false;
	}
	else{
		document.getElementById("error3").innerHTML=" ";				 
	}
	if (passno=== "") {
		document.getElementById("error4").innerHTML="*Enter Passport Number";
		return false;
	}
	else{
		document.getElementById("error4").innerHTML=" ";				 
	}
	if (passserial=== "") {
		document.getElementById("error5").innerHTML="*Enter Passport Serial";
		return false;
	}
	else{
		document.getElementById("error5").innerHTML=" ";				 
	}
	if (age=== "") {
		document.getElementById("error6").innerHTML="*Enter Age ";
		return false;
	}
	else{
		document.getElementById("error6").innerHTML=" ";				 
	}
	if (Phone=== "") {
		document.getElementById("error7").innerHTML="*Enter Phone Number";
		return false;
	}
	else{
		document.getElementById("error7").innerHTML=" ";				 
	}
	if (person=== "") {
		document.getElementById("error8").innerHTML="*Select Person";
		return false;
	}
	else{
		document.getElementById("error8").innerHTML=" ";				 
	}
	if (gender=== "") {
		document.getElementById("error9").innerHTML="*Select Gender";
		return false;
	}
	else{
		document.getElementById("error9").innerHTML=" ";				 
	}
	return true;
}