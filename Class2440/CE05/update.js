// Form validation code will come here.
function update()
{
    var regex = /^[a-zA-Z]+$/;
    //document.myForm.fName.value = /^[a-zA-Z]+$/;
    if (document.myForm.fName.value == "")
    {
        alert("Please provide your first name!");
        document.getSelection('fName');
        return false;
    }
    if (document.myForm.fName.value.match(regex)) {
    } else {
        alert("Please enter only letters!");
        document.myForm.fName.selected.focus();
        return false;
    }

    if (document.myForm.lName.value == "")
    {
        alert("Please provide your last name!");
        document.myForm.lName.selected.focus();
        return false;
    }
    if (document.myForm.lName.value.match(regex)) {
    } else {
        alert("Please enter only letters!");
        document.myForm.lName.focus();
        return false;
    }
    if (document.myForm.phone.value != "") {
        if (isNaN(document.myForm.phone.value) ||
                document.myForm.phone.value.length != 10) {
            alert("Please enter your 10 digit phone number!")
            document.myForm.phone.focus();
            return false;
        }
    }
    if (document.myForm.Zip.value != "") {
        if (isNaN(document.myForm.Zip.value) ||
                document.myForm.Zip.value.length != 5) {
            alert("Please provide a zip in the format #####.");
            document.myForm.Zip.focus();
            return false;
        }
    }
    if (document.myForm.myusername.value == "") {
        alert("Username and Password are required to update this record!");
        document.myForm.myusername.focus();
        return false;
    }
//    if(document.myForm.mypword.value == ""){
//        alert("Username and Password are required to update this record!");
//        document.myForm.mypword.focus();
//        return false;
//    }    
    return true;
}
// Form validation code will come here.
function create()
{
    var regex = /^[a-zA-Z]+$/;
    //document.myForm.fName.value = /^[a-zA-Z]+$/;
    if (document.myForm.fName.value == "") {
        alert("Please provide your first name!");
        document.getSelection('fName');
        return false;
    }
    if (document.myForm.fName.value.match(regex)) {
    } else {
        alert("Please enter only letters!");
        document.myForm.fName.focus();
        return false;
    }

    if (document.myForm.lName.value == "")
    {
        alert("Please provide your last name!");
        document.myForm.lName.focus();
        return false;
    }
    if (document.myForm.lName.value.match(regex)) {
    } else {
        alert("Please enter only letters!");
        document.myForm.lName.focus();
        return false;
    }
    if (document.myForm.phone.value == "" ||
            isNaN(document.myForm.phone.value) ||
            document.myForm.phone.value.length != 10) {
        alert("Please enter your phone number!")
        document.myForm.phone.focus();
        return false;
    }
    if (document.myForm.address.value == "")
    {
        alert("Please provide your address!");
        document.myForm.address.focus();
        return false;
    }
    if (document.myForm.city.value == "") {
        alert("Please provide your city!");
        document.myForm.city.focus();
        return false;
    }
    if (document.myForm.state.value == "none") {
        alert("Please choose your state!");
        document.myForm.state.focus();
        return false;
    }
    if (document.myForm.Zip.value == "" ||
            isNaN(document.myForm.Zip.value) ||
            document.myForm.Zip.value.length != 5)
    {
        alert("Please provide a zip in the format #####.");
        document.myForm.Zip.focus();
        return false;
    }
    if (document.myForm.myusername.value == "") {
        alert("Please enter your username!");
        document.myForm.myusername.focus();
        return false;
    }
    if (document.myForm.mypword.value == "") {
        alert("Please enter your password!");
        //document.myForm.mypassword.value = "enter password here!";
        document.myForm.mypword.focus();
        return false;
    }
    return true;
}












