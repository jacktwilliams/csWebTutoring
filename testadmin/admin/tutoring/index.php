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
    define("STARTC", "<div class=\"slot-chunk\">");
    define("ENDC", "</div>");
    define("DAY", 0);
    define("CLASSN", 1);
    define("TUTOR", 2);
    define("STARTT", 3);
    define("ENDT", 4);
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
    $number = 1; 
    $fname = "testSched.txt";
    $file = fopen($fname, "r");
    if($file) {
        $totalSlots = fgets($file);
        $totalSlots = str_replace('\r', '', str_replace('\n', '', $totalSlots));
        for($i = 1; $i <= $totalSlots; ++$i) {
            $line = fgets($file);
            $line = explode(',', $line);
            $day = $line[DAY];
            $classN = $line[CLASSN];
            $tutor = $line[TUTOR];
            $startT = $line[STARTT];
            $endT = $line[ENDT];
            $newChunk = STARTC . "<select name=\"day$number\">" .
                $options[$day] . "</select><br>" . "Class:<br><input type=\"text\" value=\"$classN\" name=\"class$number\"><br>" . 
                "Tutor:<br><input type=\"text\" value=\"$tutor\" name=\"tutor$number\"><br>" .
                "Start Time:<br><input type=\"text\" value=\"$startT\" name=\"start$number\"><br>" . 
                "End Time:<br><input type=\"text\" value=\"$endT\" name=\"end$number\"><br>" . ENDC;
            $slotChunks[$line[DAY]] .= $newChunk;
        }
    }
?>
    <h1>Edit Tutoring Schedule</h1>

    <main>
        <div class="container-fluid" id="schedule-container">
            <form>
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