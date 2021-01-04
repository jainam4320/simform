function IsEmailValid(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (regex.test(email) == false) {
        alert("Input Parameter is not a Email Address.");
        email.focus();
        return false;
    }
    else {
        return true;
    }
}

function IsBloodGroupValid(bgroup) {
    var regex = /[abo]\+/
    if (regex.test(bgroup.value) == false) {
        alert("Blood Group field can only contain + and maximum two character.");
    }
    else {
        return true;
    }
    blood_group.focus();
    return false;
}

function getAge(bdate) {
    var today = new Date();
    var birthDate = new Date(bdate.value);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

function validateForm1() {
    var fullname = document.forms["entryForm"]["full_name"];
    var contact_number = document.forms["entryForm"]["contact_number"];
    var job_title = document.forms["entryForm"]["job_title"];
    var email = document.forms["entryForm"]["email"];
    var bdate = document.forms["entryForm"]["bdate"];
    var blood_group = document.forms["entryForm"]["blood_group"];
    var age = getAge(bdate);
    if (IsEmailValid(email.value) == true && IsBloodGroupValid(blood_group) == true) 
    {
        var user = { 
            "name" : fullname.value,
            "number" : contact_number.value,
            "job_title" : job_title.value,
            "email" : email.value,
            "bdate" : bdate.value,
            "age" : age,
            "blood_group" : blood_group.value
        };
        user = JSON.stringify(user);
        localStorage.setItem(email.value, user);
        return true;
    }
    return false;
}

function dispData() {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var details = [];
    for(var key in localStorage)
    {
        if(regex.test(key) == true)
            details.push(key);
    }
	    
    var table;
	for( var i=0; i<details.length; i++) {
		detail = localStorage.getItem(details[i]);
		detail = JSON.parse(detail);
        table += "<tr><td>" + detail.name + "</td><td>" + detail.email + "</td><td>" + detail.age + "</td><td>" + detail.blood_group + "</td><td>" + details.number + "</td><td>" + detail.job_title + "</td></tr>";
	}
	$("#displayemp > tbody").html(table);
	$('#displayemp').DataTable();
}

function showEmails(){
	selEmail = document.getElementById("delete_emp");
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var details = [];
    for(var key in localStorage)
    {
        if(regex.test(key) == true)
            details.push(key);
    }
	for( var i=0; i<details.length; i++) {
		selEmail.options[selEmail.options.length] = new Option(details[i],details[i]);
	}
}

function deleteEmp() {
	mail = $("#delete_emp").val();
	localStorage.removeItem(mail);
}