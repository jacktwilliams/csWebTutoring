<?php
     $path = "../../";
     include $path . 'head1.html';
?>
    <!--My CSS-->
    <link rel="stylesheet" href="css/schedule.css">
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
        define("ENDT", 4);
        //this is for the intial part of the chunk. Start Chunk/end chunk
        //define("STARTC", "<div class='timeBox'>");
        //define("ENDC", "</div>");
        
        $classes = array();
        //read file here
        $slotChunks = ["Sunday" => "", "Monday" => "", "Tuesday" => "", "Wednesday" => "", "Thursday" => "", "Friday" => "", "Saturday" => ""];
        $fileName = "../../../testadmin/admin/tutoring/Schedule.txt";
        $file = fopen($fileName, "r");
        if($file){
            $NoOfClasses = 0;
            $line = fgets($file);
            while(!feof($file)) {
                $line = explode(',', $line);
                $day = $line[DAY];
                $classN = $line[CLASSN];
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
                $endT = $line[ENDT];
                //makes a new chunk (box)
                $newChunk = "<div class='timeBox $classN'>" . 
                                "<div class='box-text'>" .
                                    "<div>$tutor</div>" . 
                                    "<div>$classN</div>" .
                                    "<div>$startT - $endT</div>" .
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
                     <div class="day-col col" id="Sun">
                        <div class="day-name">Sunday</div>
                        <div class="slots">
                           <?php echo($slotChunks["Sunday"]); ?>
                        </div>
                    </div>
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
                      <div class="day-col col" id="Sat">
                        <div class="day-name">Saturday</div>
                        <div class="slots">
                           <?php echo($slotChunks["Saturday"]); ?>
                        </div>
                    </div>
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