function IsEmailValid(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (regex.test(email.value) == false) {
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
    var country_code = document.forms["entryForm"]["country_code"];
    var age = getAge(bdate);
    if (IsEmailValid(email) == true && IsBloodGroupValid(blood_group) == true) {
        var user = {
            "name": fullname.value,
            "country_code": country_code.value,
            "number": contact_number.value,
            "job_title": job_title.value,
            "email": email.value,
            "bdate": bdate.value,
            "age": age,
            "blood_group": blood_group.value
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
    for (var key in localStorage) {
        if (regex.test(key) == true)
            details.push(key);
    }
    var table;
    for (var i = 0; i < details.length; i++) {
        detail = localStorage.getItem(details[i]);
        detail = JSON.parse(detail);
        table += "<tr><td>" + detail.name + "</td><td>" + detail.email + "</td><td>" + detail.age + "</td><td>" + detail.blood_group + "</td><td>" + detail.country_code + "</td><td>" + detail.number + "</td><td>" + detail.job_title + "</td></tr>";
    }
    $("#displayemp > tbody").html(table);
    $('#displayemp').DataTable();
}

function showEmails() {
    selEmail = document.getElementById("delete_emp");
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var details = [];
    for (var key in localStorage) {
        if (regex.test(key) == true)
            details.push(key);
    }
    for (var i = 0; i < details.length; i++) {
        selEmail.options[selEmail.options.length] = new Option(details[i], details[i]);
    }
}

function deleteEmp() {
    mail = $("#delete_emp").val();
    localStorage.removeItem(mail);
}

function showEmailsEdit() {
    selEmail = document.getElementById("edit_emp");
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var details = [];
    for (var key in localStorage) {
        if (regex.test(key) == true)
            details.push(key);
    }
    for (var i = 0; i < details.length; i++) {
        selEmail.options[selEmail.options.length] = new Option(details[i], details[i]);
    }
}

function emailChange() {
    $("#editForm").show();
    mail = $("#edit_emp").val();
    detail = localStorage.getItem(mail);
    detail = JSON.parse(detail);
    $("#full_name").val(detail.name);
    $("#country_code").val(detail.country_code);
    $("#contact_number").val(detail.number);
    $("#job_title").val(detail.job_title);
    $("#email").val(detail.email);
    $("#bdate").val(detail.bdate);
    $("#blood_group").val(detail.blood_group);
}

function editEmployee() {
    var fullname = document.forms["editForm"]["full_name"];
    var contact_number = document.forms["editForm"]["contact_number"];
    var job_title = document.forms["editForm"]["job_title"];
    var email = document.forms["editForm"]["email"];
    var bdate = document.forms["editForm"]["bdate"];
    var blood_group = document.forms["editForm"]["blood_group"];
    var country_code = document.forms["editForm"]["country_code"];
    var age = getAge(bdate);
    if (IsEmailValid(email) == true && IsBloodGroupValid(blood_group) == true) {
        var user = {
            "name": fullname.value,
            "country_code": country_code.value,
            "number": contact_number.value,
            "job_title": job_title.value,
            "email": email.value,
            "bdate": bdate.value,
            "age": age,
            "blood_group": blood_group.value
        };
        user = JSON.stringify(user);
        localStorage.removeItem(email.value);
        localStorage.setItem(email.value, user);
        return true;
    }
    return false;
}