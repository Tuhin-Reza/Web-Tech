function formValidation(search) {
	const fname = search.start.value;
	const lname = search.end.value;
	if (fname=== "") {
		document.getElementById("fnameErr").innerHTML="*Select Origin";
		return false;
	}
	else{
		document.getElementById("fnameErr").innerHTML=" ";				 
	}
	if (lname=== "") {
		document.getElementById("lnameErr").innerHTML="*Select Destination";
		return false;
	}
	else{
		document.getElementById("lnameErr").innerHTML=" ";				 
	}
	return true; 
}
function Validation(bookticket) {
	const fname = bookticket.Flight_No.value;
	if (fname=== "") {
		document.getElementById("error").innerHTML="*First Select Flight";
		return false;
	}
	else{
		document.getElementById("error").innerHTML=" ";				 
	}	
	return true;
}
