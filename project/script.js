/**
 * Created by Hassan Abdellah
 */

/******************  Registration check *******************/
function check() {
    var fName=document.getElementById('fName').value;
    var lName=document.getElementById('lName').value;
    var gender=document.getElementById('gender').value;
    var email=document.getElementById('email').value;
    var mobile=document.getElementById('mobile').value;
    var password=document.getElementById('password').value;
    var confirmPassword=document.getElementById('confirmPassword').value;
    var address=document.getElementById('address').value;
    var bdate=document.getElementById('bdate').value;

    if(fName=="" || lName=="" ||  gender=="" || email=="" || mobile=="" || password==""  || confirmPassword==""  || address==""  || bdate==""){
        alert("Fill all field values");
        return false;
    }
    else if(mobile.length!==11){
        alert("Mobile should be of 11 number");
        return false;
    }
    else if(password.length<4){
        alert("Password must be more than 4 character ");
        return false;
    }
    else if(password!=confirmPassword){
        alert("Password does not match");
        return false;
    }
    return true;
}

/******************** Update check *******************************/
