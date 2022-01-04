function validation(registration) {
	const username = registration.username.value;
	const pass     = registration.pass.value;
	const cpass    = registration.cpass.value;
	
	if(username ===""){
		document.getElementById("userErr").innerHTML="*Please Enter User Name";
		return false;
	}else if(!username.match(/^[A-Za-z]+$/)){
		document.getElementById("userErr").innerHTML="*AlphaNumeric Value Not Allowed";
		return false;
	}else{
		document.getElementById("userErr").innerHTML=" ";
	}

	if(pass ===""){
		document.getElementById("passErr").innerHTML="*Please Enter Password";
		return false;
	}else if(pass.length<4){
		document.getElementById("passErr").innerHTML="*Password Minimum Length (4)";
		return false;
	}else if( cpass === "" ||cpass != pass || pass ==="" ){
		document.getElementById("cpassErr").innerHTML="*Password Not Match";
		return false;
	}else{
		document.getElementById("passErr").innerHTML=" ";
		document.getElementById("cpassErr").innerHTML=" ";
	}
	return true;
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