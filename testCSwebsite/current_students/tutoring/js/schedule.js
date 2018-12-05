//this will change the schedule based on the drop down menu
var dropdown = document.getElementById("dropdown1");
//dropdown.addEventListener("change", updateTable);

function updateTable(className){
    //makes all slots invisible
    var allSlots = document.getElementsByClassName("timeBox");
    
    for(var i = 0; i < allSlots.length; i++){
        allSlots[i].style.display = "none";
    }
    
    if(className == "All"){
        for(var i = 0; i < allSlots.length; i++){
            allSlots[i].style.display = "block";
        }
    }
    else{
        //get all time slots with this className
        var slots = document.getElementsByClassName(className);
        for(var i = 0; i < slots.length; i++){
            slots[i].style.display = "block";
        }
    }
}