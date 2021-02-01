function ValidateEmail(mail) {
    if(mail == ""){
        alert("Please fill all fields!");
        return false;
    }else{

        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail)) {
            return (true)
        }
        alert("You have entered an invalid email address!")
        return (false)
    }
}

function allLetter(inputtxt) {
    if(inputtxt == ""){
        alert("Please fill all fields!");
        return false;
    }else{

        var letters = /^[A-Za-z]+$/;
        if (inputtxt.match(letters)) {
            return true;
        }
        else {
            alert("Name and surname only contains letters");
            return false;
        }
    }
}

function allnumeric(inputtxt) {
    if(inputtxt == ""){
        alert("Please fill all fields!");
        return false;
    }else{

        var numbers = /^[0-9]+$/;
        if (inputtxt.match(numbers)) {
            
            
            return true;
        }
        else {
            alert('Please input numeric characters only in mobile number');
            
            return false;
        }
    }
} 
