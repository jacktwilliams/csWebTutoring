//Author: Jack Williams
"use strict";
var slotNum = $("select").size();
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
    $("option").click(changeDay);
    $(".revert-button").click(revertPage);
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
    var newSlot = $("<div class=\"chunk-cont\"><button type=\"button\" class=\"remove-slot\">-</button><div class=\"slot-chunk\">" + "<select name=\"day" + numSlots + "\">" +
    options[day] + "</select><br>" + "Class:<br><input type=\"text\" name=\"class" + numSlots + "\"><br>" +
    "Tutor:<br><input type=\"text\" name=\"tutor" + numSlots + "\"><br>" +
    "Start Time:<br><input class=\"time-text\" type=\"text\" name=\"startT" + numSlots + "\">" + 
    "<select name=\"startP" + numSlots +"\">" + "<option value=\"invalid\" disabled selected>...</option>" + 
    "<option value=\"AM\">AM</option><option value=\"PM\">PM</option></select><br>" +
    "End Time:<br><input class=\"time-text\" type=\"text\" name=\"endT" + numSlots + "\">" + 
    "<select name=\"endP" + numSlots +"\">" + "<option value=\"invalid\" disabled selected>...</option>" +
    "<option value=\"AM\">AM</option><option value=\"PM\">PM</option></select><br>" +
    "Email:<br><input type=\"text\" name=\"email" + numSlots + "\"><br>" +
    "Location/Notes:<br><input type=\"text\" name=\"notes" + numSlots + "\">" + "</div>");

    newSlot.find(".remove-slot").click(removeSlot);
    newSlot.find("option").click(changeDay);

    slotContainer.append(newSlot);
    slotContainer.append(addButton.click(addSlot));
}

function removeSlot(event) {
    $(event.target).parent().remove();
}

function changeDay(event) {
    var chunk = $(event.target).parent().parent().parent().detach(); //remove chunk-cont
    console.log(chunk);
    var dayCode = $(event.target).text().substr(0, 3);
    console.log(dayCode);
    $("#" + dayCode + " .slots").prepend(chunk);
}

regHandlers();

