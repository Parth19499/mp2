document.getElementById("emailHere").innerHTML=email;
alert(email);
function showIframe(){//start of function
    //alert("in function");
    var isMale;
    var isEasy;
    var bodyFocusValidate = 0;
    var equipmentValidate = 0;
    //var bodyFocus = ["checkBFU","checkBFC","checkBFL","checkBFB"];
    var bodyFocus = [false,false,false,false];
    //var equipment = ["checkENE","checkED","checkEM","checkEB"];
    var equipment = [false,false,false,false];
    if(document.getElementById("radioGM").checked){
        //show male fitness videoes
        isMale = true;
    }
    else{
        //show female fitness videoes
        isMale = false;
    }
    //alert(isMale);
    if(document.getElementById("radioDE").checked){
            //show easy fitness videoes
            isEasy = true;
        }
    else{
            //show hard fitness videoes 
            isEasy= false;
    }
    //alert(isEasy);
    //bodyfocus
    if(document.getElementById("checkBFU").checked){
        alert("in core");
        bodyFocus[0] = true;
    }
    if(document.getElementById("checkBFC").checked){
        bodyFocus[1] = true;   
    }
    if(document.getElementById("checkBFL").checked){
        bodyFocus[2] = true;
    }
    if(document.getElementById("checkBFB").checked){
        bodyFocus[3] = true;
    }
    //alert(bodyFocus[1]);
    //equipment
    if(document.getElementById("checkENE").checked){
        equipment[0] = true;
    }
    if(document.getElementById("checkED").checked){
        equipment[1] = true;
    }
    if(document.getElementById("checkEM").checked){
        equipment[2] = true;
    }
    if(document.getElementById("checkEB").checked){
        equipment[3] = true;
    }
    //here bodyfocus and equipment has the same size that's why one loop
    for(var i=0;i<bodyFocus.length;i++){
        if(bodyFocus[i] === false){
            bodyFocusValidate++;
        }
        if(equipment[i] === false){
            //alert("in eq condition");
            equipmentValidate++;
        }
    }
    //alert(equipment.length);
    if(bodyFocusValidate == bodyFocus.length){
        alert("Please select at least one choice in body focus field");
    }
    if(equipmentValidate == equipment.length){
        alert("Please select at least one choice in equipment field");
    }
    if(isMale){
        //alert("in isMale if");
        document.getElementById("resultiframe").src = "https://www.youtube.com/embed/j57HMjVM7Is";
    }
    if(!isMale){
        document.getElementById("resultiframe").src = "https://www.youtube.com/embed/GauW8uJtvFs";
    }
}//end of function