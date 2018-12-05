<!-- Author: Jack Williams -->
<?php
    $path = "../../";
    /*include $path . "admin_head1.html";*/ 
?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Replace bootstrap CDN link with server file at some point-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/williamsT.css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/adminP.js" defer></script>
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
    define("NOTES", 8);
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
    $fname = "testSched.txt";
    $file = fopen($fname, "r");
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

            $newChunk = STARTC . "<select name=\"day$i\">" .
                $options[$day] . "</select><br>" . "Class:<br><input type=\"text\" value=\"$classN\" name=\"class$i\"><br>" . 
                "Tutor:<br><input type=\"text\" value=\"$tutor\" name=\"tutor$i\"><br>" .
                "Start Time:<br><input class=\"time-text\" type=\"text\" value=\"$startT\" name=\"start$i\">" . 
                "<select name=\"startperiod$i\"> $startPOptions" .
                "End Time:<br><input class=\"time-text\" type=\"text\" value=\"$endT\" name=\"end$i\">" . 
                "<select name=\"endperiod$i\"> $endPOptions" . "Email:<br><input value=\"$email\" name=\"email$i\"><br>" .
                "Location/Notes:<br><input value=\"$notes\" name=\"notes$i\">" . ENDC;
            $slotChunks[$line[DAY]] .= $newChunk;
            $line = fgets($file);
            ++$i;
        }
    }
?>
    <h1>Edit Tutoring Schedule</h1>

    <main>
        <div class="container-fluid" id="schedule-container">
            <form action="saveSched.php" method="POST">
            <div class="row">
                <div class="day-col col" id="Sun">
                    <div class="day-name">Sunday</div>
                    <div class="slots">
                        <?php echo($slotChunks["Sunday"]); ?>
                        <button type="button" class="add-button Sun">Add Times</button>
                    </div>
                </div>
                <div class="day-col col" id="Mon">
                    <div class="day-name">Monday</div>
                    <div class="slots">
                        <?php echo($slotChunks["Monday"]); ?>
                        <button type="button" class="add-button Mon">Add Times</button>
                    </div>
                </div>
                <div class="day-col col" id="Tue">
                    <div class="day-name">Tuesday</div>
                    <div class="slots">
                        <?php echo($slotChunks["Tuesday"]); ?>
                        <button type="button" class="add-button Tue">Add Times</button>
                    </div>
                </div>          
                <div class="day-col col" id="Wed">
                    <div class="day-name">Wednesday</div>
                    <div class="slots">
                        <?php echo($slotChunks["Wednesday"]); ?>
                        <button type="button" class="add-button Wed">Add Times</button>
                    </div>
                </div>
                <div class="day-col col" id="Thu">
                    <div class="day-name">Thursday</div>
                    <div class="slots">
                        <?php echo($slotChunks["Thursday"]); ?>
                        <button type="button" class="add-button Thu">Add Times</button>
                    </div>
                </div>
                <div class="day-col col" id="Fri">
                    <div class="day-name">Friday</div>
                    <div class="slots">
                        <?php echo($slotChunks["Friday"]); ?>
                        <button type="button" class="add-button Fri">Add Times</button>
                    </div>
                </div>
                <div class="day-col col" id="Sat">
                    <div class="day-name">Saturday</div>
                    <div class="slots">
                        <?php echo($slotChunks["Saturday"]); ?>
                        <button type="button" class="add-button Sat">Add Times</button>
                    </div>
                </div>
            </div>
            <input type="submit" value="Save">
            </form>
        </div>
    </main>

<?php /*include $path . "admin_footer.html";*/ ?>