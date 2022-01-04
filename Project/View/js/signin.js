function validation(registration) {
	const username = registration.username.value;
	const pass     = registration.pass.value;

	if(username ===""){
		document.getElementById("userErr").innerHTML="Invalid Username";
		return false;
	}else{
		document.getElementById("userErr").innerHTML=" ";
	}

	if(pass ===""){
		document.getElementById("passErr").innerHTML="Invalid Password";
		return false;
	}
	else{
		document.getElementById("passErr").innerHTML=" ";
	}
	return true;
} 
function myFunction() {
	var x = document.getElementById("pass")
	if (x.type === "password"){
		x.type = "text";
	}else{
		x.type = "password";
	}
}