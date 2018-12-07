//Author: Jack Williams
"use strict";

//Set default option depending on which day-slot we are adding to.
var options = {"Sun" : "<option value=\"Sunday\" selected=\"selected\">Sunday</option><option value=\"Monday\">Monday</option><option value=\"Tuesday\">Tuesday</option>" +
    "<option value=\"Wednesday\">Wednesday</option><option value=\"Thursday\">Thursday</option>" + 
    "<option value=\"Friday\">Friday</option><option value=\"Saturday\">Saturday</option>", 
    "Mon" : "<option value=\"Sunday\">Sunday</option><option value=\"Monday\" selected=\"selected\">Monday</option><option value=\"Tuesday\">Tuesday</option>" +
    "<option value=\"Wednesday\">Wednesday</option><option value=\"Thursday\">Thursday</option>" + 
    "<option value=\"Friday\">Friday</option><option value=\"Saturday\">Saturday</option>", 
    "Tue" : "<option value=\"Sunday\">Sunday</option><option value=\"Monday\">Monday</option><option value=\"Tuesday\" selected=\"selected\">Tuesday</option>" +
    "<option value=\"Wednesday\">Wednesday</option><option value=\"Thursday\">Thursday</option>" + 
    "<option value=\"Friday\">Friday</option><option value=\"Saturday\">Saturday</option>", 
    "Wed" : "<option value=\"Sunday\">Sunday</option><option value=\"Monday\">Monday</option><option value=\"Tuesday\">Tuesday</option>" +
    "<option value=\"Wednesday\" selected=\"selected\">Wednesday</option><option value=\"Thursday\">Thursday</option>" + 
    "<option value=\"Friday\">Friday</option><option value=\"Saturday\">Saturday</option>", 
    "Thu" : "<option value=\"Sunday\">Sunday</option><option value=\"Monday\">Monday</option><option value=\"Tuesday\">Tuesday</option>" +
    "<option value=\"Wednesday\">Wednesday</option><option value=\"Thursday\" selected=\"selected\">Thursday</option>" + 
    "<option value=\"Friday\">Friday</option><option value=\"Saturday\">Saturday</option>", 
    "Fri" : "<option value=\"Sunday\">Sunday</option><option value=\"Monday\">Monday</option><option value=\"Tuesday\">Tuesday</option>" +
    "<option value=\"Wednesday\">Wednesday</option><option value=\"Thursday\">Thursday</option>" + 
    "<option value=\"Friday\" selected=\"selected\">Friday</option><option value=\"Saturday\">Saturday</option>", 
    "Sat" : "<option value=\"Sunday\">Sunday</option><option value=\"Monday\">Monday</option><option value=\"Tuesday\">Tuesday</option>" +
    "<option value=\"Wednesday\">Wednesday</option><option value=\"Thursday\">Thursday</option>" + 
    "<option value=\"Friday\">Friday</option><option value=\"Saturday\" selected=\"selected\">Saturday</option>"};

function regHandlers(event) {
    $(".add-button").click(addSlot);
    $(".remove-slot").click(removeSlot);
    $(".day-select").change(changeDay);
    $("#revert-button").click(revertPage);
    $("#save-button").click(saveButton);
    $("#remove-all").click(removeAll);
}

function removeAll() {
    $(".chunk-cont").remove();
}

function revertPage(event) {
    window.location.reload(false);
}

function addSlot(event) {
    var numSlots = $("select").size() + 1;
    var addButton = $(event.target);
    var day = addButton.attr('class').substr(11); //read class which comes after 'add-button'.
    addButton.remove(); //we will remove the button, add the empty time-slot and put the button at the bottom
    var slotContainer = $("#" + day + " .slots");
    var newSlot = $("<div class=\"chunk-cont\"><button type=\"button\" class=\"remove-slot\">-</button><div class=\"slot-chunk\">" + "<select class=\"day-select\" name=\"day" + numSlots + "\">" +
    options[day] + "</select><br>" + "Class:<br><input type=\"text\" name=\"class" + numSlots + "\"><br>" +
    "Tutor:<br><input type=\"text\" name=\"tutor" + numSlots + "\"><br>" +
    "Start Time:<br><input class=\"time-text\" type=\"text\" name=\"startT" + numSlots + "\">" + 
    "<select name=\"startP" + numSlots +"\">" + "<option value=\"invalid\" disabled selected>...</option>" + 
    "<option value=\"AM\">AM</option><option value=\"PM\">PM</option></select><br>" +
    "End Time:<br><input class=\"time-text\" type=\"text\" name=\"endT" + numSlots + "\">" + 
    "<select name=\"endP" + numSlots +"\">" + "<option value=\"invalid\" disabled selected>...</option>" +
    "<option value=\"AM\">AM</option><option value=\"PM\">PM</option></select><br>" +
    "Email:<br><input type=\"text\" name=\"email" + numSlots + "\"><br>" +
    "Location:<br><input type=\"text\" name=\"location" + numSlots + "\"><br>" + 
    "Notes:<br><input type=\"text\" name=\"notes" + numSlots + "\">" + "</div>");

    newSlot.find(".remove-slot").click(removeSlot);
    newSlot.find(".day-select").change(changeDay);

    slotContainer.append(newSlot);
    slotContainer.append(addButton.click(addSlot));
}

function removeSlot(event) {
    $(event.target).parent().remove();
}

function changeDay(event) {
    var chunk = $(event.target).parent().parent().detach(); //remove chunk-cont
    console.log(chunk);
    console.log(event.target.options[event.target.selectedIndex].value);
    //day code is first three letters of the selected option's value
    var dayCode = event.target.options[event.target.selectedIndex].value.substr(0, 3);
    $("#" + dayCode + " .slots").prepend(chunk);
}

function validateTextInput() {
    var valid = true;
    var inputs = document.getElementsByTagName("input");
    for(var i = 0; i < inputs.length; ++i){
        var current = inputs[i];
        //all class names will be uppercase
        if(current.name.includes("class")) {
            current.value = current.value.toUpperCase();
        }
        //format all times.
        if((current.name.includes("startT") || current.name.includes("endT")) && !current.value.includes(":")) {
            current.value += ":00";
        }
        //if input is a text input, empty, but it's not the location, notes, or email field. (those can be empty). This could be refactored..
        if(current.type == 'text' && current.value == '' && !(current.name.includes("location") || current.name.includes("notes") || current.name.includes("email"))) {
            current.className += " invalid";
            valid = false;
        }
        else {
            //remove invalid class from valid entries.
            if(current.className.includes(" invalid")) {
                current.className = current.className.replace(" invalid", "");
            }
        }
    }
    return valid;
}
function validateSelectInput() {
    var valid = true;
    var inputs = document.getElementsByTagName("select");
    for(var i = 0; i < inputs.length; ++i){
        var current = inputs[i];
        if(current.options[current.selectedIndex].value == "invalid") {
            current.className += " invalid";
            valid = false;
        }
        else {
            if(current.className.includes(" invalid")) {
                current.className = current.className.replace(" invalid", "");
            }
        }
    }
    return valid;
}

function saveButton() {
    if(validateTextInput() && validateSelectInput()) {
        $("#hidden-submit").click();
    }
}

regHandlers();

