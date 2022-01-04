function validation(registration) {
	const fname    = registration.fname.value;
	const lname    = registration.lname.value;
	const mail     = registration.mail.value;
	const username = registration.username.value;
	const pass     = registration.pass.value;
	const cpass    = registration.cpass.value;

	if(fname ===""){
		document.getElementById("fnameErr").innerHTML="[Please Enter First Name]";
		return false;
	}else if(fname.length<3 || fname.length>8){
		document.getElementById("fnameErr").innerHTML="[Min Legth(3) & Max Length(8)]";
		return false;
	}else if(!fname.match( /^[A-Za-z]+$/)){
		document.getElementById("fnameErr").innerHTML="[AlphaNumeric Value Not Allowed]";
		return false;
	}else{
		document.getElementById("fnameErr").innerHTML=" ";
	}

	if(lname ===""){
		document.getElementById("lnameErr").innerHTML="[Please Enter Last Name]";
		return false;
	}else if(lname.length<3 || lname.length>8){
		document.getElementById("lnameErr").innerHTML="[[Min Legth(3) & Max Length(8)]]";
		return false;
	}else if(!lname.match(/^[A-Za-z]+$/)){
		document.getElementById("lnameErr").innerHTML="[AlphaNumeric Value Not Allowed]";
		return false;
	}else{
		document.getElementById("lnameErr").innerHTML=" ";
	}
	if(mail ===""){
		document.getElementById("mailErr").innerHTML="[Please Enter E-mail Id]";
		return false;
	}else if(!mail.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)){
		document.getElementById("mailErr").innerHTML="[Please Enter Valid E-mail Id]";
		return false;
	}else{
		document.getElementById("mailErr").innerHTML=" ";
	}
	
	if(username ===""){
		document.getElementById("userErr").innerHTML="[Please Enter User Name]";
		return false;
	}else if(!username.match(/^[A-Za-z]+$/)){
		document.getElementById("userErr").innerHTML="[AlphaNumeric Value Not Allowed]";
		return false;
	}else{
		document.getElementById("userErr").innerHTML=" ";
	}

	if(pass ===""){
		document.getElementById("passErr").innerHTML="[Please Enter Password]";
		return false;
	}else if(pass.length<4){
		document.getElementById("passErr").innerHTML="[Password Minimum Length (4)]";
		return false;
	}else if( cpass === "" ||cpass != pass || pass ==="" ){
		document.getElementById("cpassErr").innerHTML="[Password Not Match]";
		return false;
	}else{
		document.getElementById("passErr").innerHTML=" ";
		document.getElementById("cpassErr").innerHTML=" ";
	}
	return true;
}
function checkUsername() {
    let button = document.querySelector(".button"); 
    jQuery.ajax({
    url: "../Controller/user_info.php",
    data:'username='+$("#username").val(),
    type: "POST",
    success:function(data){
      if(data!="")
      {
          //$('#submit').prop('disabled', true);
            button.disabled = true;
      }else{
         //$('#submit').prop('disabled', false);
          button.disabled =false;
      }
      $("#userErr").html(data);
    },
    error:function (){}
    });
}
function checkpassword() {
    let button = document.querySelector(".button"); 
    jQuery.ajax({
    url: "../Controller/user_info.php",
    data:'pass='+$("#pass").val(),
    type: "POST",
    success:function(data){
      if(data!="")
      {
          //$('#submit').prop('disabled', true);
            button.disabled = true;
      }else{
         //$('#submit').prop('disabled', false);
          button.disabled =false;
      }
      $("#passErr").html(data);
    },
    error:function (){}
    });
}