<!doctype html>
<!-- Author: Will Eberhard -->
<html lang="en">
 <head>
        <title>Check Schedule</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/schedule.css">
    </head>
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
        $fileName = "testSched.txt";
        $file = fopen($fileName, "r");
        if($file){
            $NoOfClasses = 0;
            while(!feof($file)) {
                $line = fgets($file);
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
                                "<div>$tutor</div>" . 
                                "<div>$classN</div>" .
                                "<div>$startT - $endT</div>" .
                            "</div>";
                //stores all boxes under a Day array
                $slotChunks[$line[DAY]] .= $newChunk; 
            }//end of loop
            fclose($file);
            //sorts array
            sort($classes);
        }//enf of if
        ?>
        <div id="all">
            <h1>Tutoring Schedule</h1>
            <form id="form1">
                <select name="users" id="dropdown1" onchange="updateTable(this.value)">
                    <option value="">Select a Class:</option>
                    //this will display only classes that have tutors
                    <?php
                    foreach($classes as $value){
                        echo "<option value=$value>$value</option>";
                    }
                    ?>
                </select>
            </form>

            <div id="schedule-container">
                <div class="row">
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
    </body>
</html>