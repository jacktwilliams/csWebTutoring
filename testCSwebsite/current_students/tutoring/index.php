<?php
     $path = "../../";
     include $path . 'head1.html';
?>
    <!--My CSS-->
    <link rel="stylesheet" href="css/tutorSched.css">
<?php
     include $path . 'head2.php';
?>

	<!-- HERO SECTION -->

	  <body id="body1">
        <?php 
        //used for the order of the data in a line
        define("DAY", 0);
        define("CLASSN", 1);
        define("TUTOR", 2);
        define("STARTT", 3);
        define("STARTP",4);
        define("ENDT", 5);
        define("ENDP",6);
        define("EMAIL", 7);
        define("LOCATION", 8);
        define("NOTES", 9);
        
        $classes = array();
        //read file here
        $slotChunks = ["Sunday" => "", "Monday" => "", "Tuesday" => "", "Wednesday" => "", "Thursday" => "", "Friday" => "", "Saturday" => ""];
        $fileName = "../../../testadmin/admin/tutoring/csTutorSchedule.txt";
        $file = fopen($fileName, "r");
        if($file){
            //tracks if there is a sat or sun
            $satOrSun = false;
            $NoOfClasses = 0;
            $line = fgets($file);
            while(!feof($file)) {
                $line = explode(',', $line);
                $day = $line[DAY];
                if($day == "Sunday" || $day == "Saturday"){
                    $satOrSun = true;
                }
                
                //converts classN to uppercase so it doesn't appear twice in dropdown
                $classN = strtoupper($line[CLASSN]);
                
                //check if new class
                $newClass = true;
                if($NoOfClasses == 0){
                    $classes[$NoOfClasses] = $classN;
                    $NoOfClasses++;
                }
                else{
                    foreach($classes as $value){
                        if($value == $classN){
                            $newClass = false;
                        }
                    }
                    //check if true
                    if($newClass){
                        $classes[$NoOfClasses] = $classN;
                        $NoOfClasses++;
                    }
                }//end of else
                
                $tutor = $line[TUTOR];
                $startT = $line[STARTT];
                $startP = $line[STARTP];
                $endT = $line[ENDT];
                $endP = $line[ENDP];
                $email = $line[EMAIL];
                $location = $line[LOCATION];
                $notes = $line[NOTES];
                //makes the location not appear if the string is empty
                if(trim($location) != ""){
                    $location = "Location: " . $location;
                }
                if(trim($email) != ""){
                    $email = "<a href='mailto:$email'>Email</a>";
                }
                else{
                    $email = "<div></div>";
                }
                
                //makes a new chunk (box)
                $newChunk = "<div class='timeBox $classN'>" .
                                "<div class='box-text'>" .
                                    "<div>$tutor</div>" . 
                                    "<div>$classN</div>" .
                                    "<div>$startT$startP - $endT$endP</div>" .
                                    $email .
                                    "<div id=\"location\">$location</div>" .
                                    "<div>$notes</div>" .
                                "</div>" .
                            "</div>";
                //stores all boxes under a Day array
                $slotChunks[$line[DAY]] .= $newChunk; 
                $line = fgets($file);
            }//end of loop
            fclose($file);
            //sorts array
            sort($classes);
        }//enf of if
        ?>
        <div id="all">
            
             <!-- BANNER SECTION -->
            <div class="banner row">
                <div class="image large-12 columns">
                    <img src="<?=$path?>img/tutoring.png">
                    <h2>Tutoring Schedules</h2>
                </div>
            </div>
            <!--BANNER END -->
            <hr>
            <p id="drop-desc">Use the dropdown menu to view the tutors available for that class.</p>
            
            <form id="form1">
                <select name="users" id="dropdown1" onchange="updateTable(this.value)">
                    <option value="">Select a Class:</option>
                    <option value="All">View All</option>
                    //this will display only classes that have tutors
                    <?php
                    foreach($classes as $value){
                        echo "<option value=$value>$value</option>";
                    }
                    ?>
                </select>
            </form>
         
            <div id="schedule-container" class="container-fluid">
                <div class="row myRow">
                    <?php
                    //Sunday only appears if there is a slot in Sun or Sat
                    $SunSlots = $slotChunks["Sunday"];
                    if($satOrSun){
                        echo 
                        "<div class='day-col col' id='Sun'>
                            <div class='day-name'>Sunday</div>
                            <div class='slots'>
                               $SunSlots;
                            </div>
                        </div>";
                    }
                    ?>
                      <div class="day-col col" id="Mon">
                        <div class="day-name">Monday</div>
                        <div class="slots">
                           <?php echo($slotChunks["Monday"]); ?>
                        </div>
                    </div>
                      <div class="day-col col" id="Tue">
                        <div class="day-name">Tuesday</div>
                        <div class="slots">
                           <?php echo($slotChunks["Tuesday"]); ?>
                        </div>
                    </div>
                      <div class="day-col col" id="Wed">
                        <div class="day-name">Wednesday</div>
                        <div class="slots">
                           <?php echo($slotChunks["Wednesday"]); ?>
                        </div>
                    </div>
                      <div class="day-col col" id="Thu">
                        <div class="day-name">Thursday</div>
                        <div class="slots">
                           <?php echo($slotChunks["Thursday"]); ?>
                        </div>
                    </div>
                      <div class="day-col col" id="Fri">
                        <div class="day-name">Friday</div>
                        <div class="slots">
                            <?php echo($slotChunks["Friday"]); ?>
                        </div>
                    </div>
                    <?php
                    $SatSlots = $slotChunks["Saturday"];
                    if($satOrSun){
                        echo
                          "<div class='day-col col' id='Sat'>
                            <div class='day-name'>Saturday</div>
                            <div class='slots'>
                               $SatSlots
                            </div>
                        </div>";
                    }
                    ?>
                    
                </div>
            </div>
        </div>
        
        <script type="text/javascript" src="js/schedule.js"></script>
    <!-- close wrapper, no more content after this -->
<?php
    include $path . 'footer.php';
?>  
</body>
</html>
