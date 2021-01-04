$(document).ready(function() { 
    $("#job_title").select2({
        placeholder: "Select Job Title",
        allowClear: true
    });
});

function getAge(dob) {
    var diff_ms = Date.now() - dob.getTime();
    var age_dt = new Date(diff_ms); 
  
    return Math.abs(age_dt.getUTCFullYear() - 1970);
}


function validateForm() {
    var username = document.forms["entryForm"]["full_name"]; 
    var contact_number = document.forms["entryForm"]["contact_number"]; 
    var job_title = document.forms["entryForm"]["job_title"]; 
    var email = document.forms["entryForm"]["email"]; 
    var bdate = document.forms["entryForm"]["bdate"]; 
    var blood_group = document.forms["entryForm"]["blood_group"]; 
    var age = getAge(bdate);
    alert(bdate.value);
    
    // if (username.value != "" ) {
	// 	if(IsPassValid(pass)) {
	// 		if(IsEmailValid(email)) {
	// 			var age = IsAgeValid(bdate);
	// 			if(age) {
	// 				var userDetail = localStorage.getItem(username.value);
	// 				if( userDetail == null) {
	// 					var user = { "password" : pass.value , "age" : age , "birthdate" : bdate.value , "email" : email.value , "gender" : gender.value , "address" : address.value , "country" : country.value, "state" : state.value, "city" : city.value, "phoneno" : phoneno.value };
	// 					user = JSON.stringify(user);
	// 					console.log(user);
	// 					localStorage.setItem(username.value,user);
	// 					if(localStorage.getItem("count") == null) {
	// 						count = 1;
	// 					}
	// 					else {
	// 						count = 1 + Number(localStorage.getItem("count"));
	// 					}
	// 					localStorage.setItem("count",count);
	// 					setCookie("username", username.value);
	// 					checkUser() ;
	// 					document.forms["signupform"].reset();
	// 					changeTab("pills-home","pills-signup");
	// 				}
	// 				else {
	// 					alert("Username already taken");
	// 					username.focus();
	// 				}
	// 			}
	// 		}
	// 	}
	// }
	return false;
}