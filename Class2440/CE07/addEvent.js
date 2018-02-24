
function openWin() {
    myWin = window.open("addEvent.php", "name", "top=250, left=500, resizeable=no, location=no, menubar=no, width=350, height=450");
}

function create()
{
    if (document.myForm.mymonth.value == "" ||
            isNaN(document.myForm.mymonth.value) ||
            document.myForm.mymonth.value < 1 ||
            document.myForm.mymonth.value > 12) {
        alert("Please enter 'month' value (1 -12)")
        document.myForm.mymonth.focus();
        return false;
    }
    if(document.myForm.mymonth.value == 2 )
        if(document.myForm.myday.value < 1 || 
            document.myForm.myday.value > 28){
        alert("Please enter a 'day' value (1 - 28)")
        document.myForm.myday.focus();
        return false;
    }
    if(document.myForm.mymonth.value == 4 ||
            document.myForm.mymonth.value == 6 ||
            document.myForm.mymonth.value == 9 ||
            document.myForm.mymonth.value == 11){
        if(document.myForm.myday.value < 1 ||
            document.myForm.myday.value > 30){
        alert("Please enter a 'day' value (1 - 30)")
        document.myForm.myday.focus();  
        return false;
        }
    }
    if(document.myForm.myday.value < 1 ||
            document.myForm.myday.value > 31){
        alert("Please enter a 'day' value (1 - 31)");
        return false;
    }
    if(document.myForm.Event.value == ""){
        alert("Please enter an event");
        document.myForm.Event.focus();
        return false;
    }
    return true;
}
