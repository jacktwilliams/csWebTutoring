<!-- Author: Jack Williams -->
<?php
    $path = "../../";
    /*include $path . "admin_head1.html";*/ 
?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Replace bootstrap CDN link with server file at some point-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tutoringAdmin.css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/tutoringAdmin.js" defer></script>
<?php
    /*include $path . "admin_head2.html";*/
    define("STARTC", "<div class=\"chunk-cont\"><button type=\"button\" class=\"remove-slot\">-</button><div class=\"slot-chunk\">");
    define("ENDC", "</div></div>");
    define("DAY", 0);
    define("CLASSN", 1);
    define("TUTOR", 2);
    define("STARTT", 3);
    define("STARTP", 4);
    define("ENDT", 5);
    define("ENDP", 6);
    define("EMAIL", 7);
    define("LOCATION", 8);
    define("NOTES", 9);
    /*Define a different set of <Select> <option>'s for each day. We need to have the default option be the day we are adding to.*/
    $options = ["Sunday" => "<option value=\"Sunday\" selected=\"selected\">Sunday</option><option value=\"Monday\">Monday</option><option value=\"Tuesday\">Tuesday</option>" .
    "<option value=\"Wednesday\">Wednesday</option><option value=\"Thursday\">Thursday</option>" . 
    "<option value=\"Friday\">Friday</option><option value=\"Saturday\">Saturday</option>", 
    "Monday" => "<option value=\"Sunday\">Sunday</option><option value=\"Monday\" selected=\"selected\">Monday</option><option value=\"Tuesday\">Tuesday</option>" .
    "<option value=\"Wednesday\">Wednesday</option><option value=\"Thursday\">Thursday</option>" . 
    "<option value=\"Friday\">Friday</option><option value=\"Saturday\">Saturday</option>", 
    "Tuesday" => "<option value=\"Sunday\">Sunday</option><option value=\"Monday\">Monday</option><option value=\"Tuesday\" selected=\"selected\">Tuesday</option>" .
    "<option value=\"Wednesday\">Wednesday</option><option value=\"Thursday\">Thursday</option>" . 
    "<option value=\"Friday\">Friday</option><option value=\"Saturday\">Saturday</option>", 
    "Wednesday" => "<option value=\"Sunday\">Sunday</option><option value=\"Monday\">Monday</option><option value=\"Tuesday\">Tuesday</option>" .
    "<option value=\"Wednesday\" selected=\"selected\">Wednesday</option><option value=\"Thursday\">Thursday</option>" . 
    "<option value=\"Friday\">Friday</option><option value=\"Saturday\">Saturday</option>", 
    "Thursday" => "<option value=\"Sunday\">Sunday</option><option value=\"Monday\">Monday</option><option value=\"Tuesday\">Tuesday</option>" .
    "<option value=\"Wednesday\">Wednesday</option><option value=\"Thursday\" selected=\"selected\">Thursday</option>" . 
    "<option value=\"Friday\">Friday</option><option value=\"Saturday\">Saturday</option>", 
    "Friday" => "<option value=\"Sunday\">Sunday</option><option value=\"Monday\">Monday</option><option value=\"Tuesday\">Tuesday</option>" .
    "<option value=\"Wednesday\">Wednesday</option><option value=\"Thursday\">Thursday</option>" . 
    "<option value=\"Friday\" selected=\"selected\">Friday</option><option value=\"Saturday\">Saturday</option>", 
    "Saturday" => "<option value=\"Sunday\">Sunday</option><option value=\"Monday\">Monday</option><option value=\"Tuesday\">Tuesday</option>" .
    "<option value=\"Wednesday\">Wednesday</option><option value=\"Thursday\">Thursday</option>" . 
    "<option value=\"Friday\">Friday</option><option value=\"Saturday\" selected=\"selected\">Saturday</option>"];
    $slotChunks = ["Sunday" => "", "Monday" => "", "Tuesday" => "", "Wednesday" => "", "Thursday" => "", "Friday" => "", "Saturday" => ""];
    $fname = "csTutorSchedule.txt";
    @$file = fopen($fname, "r"); //suppress file not found warning.
    $i = 1;
    if($file) {
        $line = fgets($file);
        while(!feof($file)) {
            $line = explode(',', $line);
            $day = $line[DAY];
            $classN = $line[CLASSN];
            $tutor = $line[TUTOR];
            $startT = $line[STARTT];
            $endT = $line[ENDT];
            $email = $line[EMAIL];
            $location = $line[LOCATION];
            $notes = $line[NOTES];

            /*Choose default time period option*/
            $startPOptions;
            if(strcmp($line[STARTP], "AM") == 0) {
                $startPOptions = "<option value=\"AM\" selected=\"selected\">AM</option><option value=\"PM\">PM</option></select><br>";
            } 
            else {
                $startPOptions = "<option value=\"AM\">AM</option><option value=\"PM\" selected=\"selected\">PM</option></select><br>";
            }
            $endPOptions;
            if(strcmp($line[ENDP], "AM") == 0) {
                $endPOptions = "<option value=\"AM\" selected=\"selected\">AM</option><option value=\"PM\">PM</option></select><br>";
            } 
            else {
                $endPOptions = "<option value=\"AM\">AM</option><option value=\"PM\" selected=\"selected\">PM</option></select><br>";
            }

            $newChunk = STARTC . "<select class=\"day-select\" name=\"day$i\">" .
                $options[$day] . "</select><br>" . "Class:<br><input type=\"text\" value=\"$classN\" name=\"class$i\"><br>" . 
                "Tutor:<br><input type=\"text\" value=\"$tutor\" name=\"tutor$i\"><br>" .
                "Start Time:<br><input class=\"time-text\" type=\"text\" value=\"$startT\" name=\"startT$i\">" . 
                "<select name=\"startP$i\"> $startPOptions" .
                "End Time:<br><input class=\"time-text\" type=\"text\" value=\"$endT\" name=\"endT$i\">" . 
                "<select name=\"endP$i\"> $endPOptions" . "Email:<br><input value=\"$email\" name=\"email$i\"><br>" .
                "Location:<br><input value=\"$location\" name=\"location$i\"><br>" . "Notes:<br><input value=\"$notes\" name=\"notes$i\">" . ENDC;
            $slotChunks[$line[DAY]] .= $newChunk;
            $line = fgets($file);
            ++$i;
        }
    }
?>
    <h1>Edit Tutoring Schedule</h1>

    <main>
        <div id="info">
            <p>Hello, admin. Here you can edit the Computer Science tutor schedule! Here are some notes to help.</p>
            <ul>
                <li>All fields are required except the location, notes, and email fields.</li>
                <li>If you don't add time slots for Saturday or Sunday, those two days will not appear on the schedule.</li>
                <li>As you add time slots on a day, slots earlier in the day may appear after those later in the day. The slots will be sorted
                    by starting time before appearing on the schedule page.
                </li>
            </ul>
        </div>
        <div class="container-fluid" id="schedule-container">
            <form id="time-form" action="newSched.php" method="POST">
            <div class="row">
                <div class="day-col col" id="Sun">
                    <div class="day-name">Sunday</div>
                    <div class="slots">
                        <?php echo($slotChunks["Sunday"]); ?>
                        <input type="button" class="add-button Sun" value="Add Times">
                    </div>
                </div>
                <div class="day-col col" id="Mon">
                    <div class="day-name">Monday</div>
                    <div class="slots">
                        <?php echo($slotChunks["Monday"]); ?>
                        <input type="button" class="add-button Mon" value="Add Times">
                    </div>
                </div>
                <div class="day-col col" id="Tue">
                    <div class="day-name">Tuesday</div>
                    <div class="slots">
                        <?php echo($slotChunks["Tuesday"]); ?>
                        <input type="button" class="add-button Tue" value="Add Times">
                    </div>
                </div>          
                <div class="day-col col" id="Wed">
                    <div class="day-name">Wednesday</div>
                    <div class="slots">
                        <?php echo($slotChunks["Wednesday"]); ?>
                        <input type="button" class="add-button Wed" value="Add Times">
                    </div>
                </div>
                <div class="day-col col" id="Thu">
                    <div class="day-name">Thursday</div>
                    <div class="slots">
                        <?php echo($slotChunks["Thursday"]); ?>
                        <input type="button" class="add-button Thu" value="Add Times">
                    </div>
                </div>
                <div class="day-col col" id="Fri">
                    <div class="day-name">Friday</div>
                    <div class="slots">
                        <?php echo($slotChunks["Friday"]); ?>
                        <input type="button" class="add-button Fri" value="Add Times">
                    </div>
                </div>
                <div class="day-col col" id="Sat">
                    <div class="day-name">Saturday</div>
                    <div class="slots">
                        <?php echo($slotChunks["Saturday"]); ?>
                        <input type="button" class="add-button Sat" value="Add Times">
                    </div>
                </div>
            </div>
            <div id="bottom-button-container">
                <input type="submit" id="hidden-submit" value="sub"><!-- This is hidden and will be 'clicked' when form is validated -->
                <input type="button" id="save-button" value="Save">
                <input type="button" id="revert-button" value="Revert Changes">
                <input type="button" id="remove-all" value="Remove All">
            </div>
            </form>
        </div>
    </main>

<?php /*include $path . "admin_footer.html";*/ ?>