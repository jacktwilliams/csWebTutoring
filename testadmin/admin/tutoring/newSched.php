<!-- This page writes tutor time slot form data (from index.php) to a file.
    It sorts the slots based on starting time. The front-facing tutor schedule page and the
    index page will read from the save-file. 
-->
<?php
	$File = "csTutorSchedule.txt";
	$Fhandle = fopen($File, "w");
	$NumberEvents = count($_POST);

	$days = array(  //7 arrays, each for 1 day of the week
		array(0),
		array(0),
		array(0),
		array(0),
		array(0),
		array(0),
		array(0)
    );
    

    for($i = 1; $i <= $NumberEvents; $i++){
		if(isset($_POST["day". $i])){
			$day = $_POST["day". $i];
			$print = false;
			switch($day){
				case "Sunday":
                    
                    $days[0][1 + 10 * $days[0][0]] = $_POST["day" . $i];
                    $days[0][2 + 10 * $days[0][0]] = $_POST["class". $i]; 
                    $days[0][3 + 10 * $days[0][0]] = $_POST["tutor". $i];
                    $days[0][4 + 10 * $days[0][0]] = $_POST["startT". $i];
                    $days[0][5 + 10 * $days[0][0]] = $_POST["startP". $i];
                    $days[0][6 + 10 * $days[0][0]] = $_POST["endT". $i];
                    $days[0][7 + 10 * $days[0][0]] = $_POST["endP". $i];
                    $days[0][8 + 10 * $days[0][0]] = $_POST["email". $i];
                    $days[0][9 + 10 * $days[0][0]] = $_POST["location". $i];
                    $days[0][10 + 10 * $days[0][0]] = $_POST["notes". $i];
                    $days[0][0]++;

					break;
				case "Monday":
                    
                    $days[1][1 + 10 * $days[1][0]] = $_POST["day" . $i];
                    $days[1][2 + 10 * $days[1][0]] = $_POST["class". $i]; 
                    $days[1][3 + 10 * $days[1][0]] = $_POST["tutor". $i];
                    $days[1][4 + 10 * $days[1][0]] = $_POST["startT". $i];
                    $days[1][5 + 10 * $days[1][0]] = $_POST["startP". $i];
                    $days[1][6 + 10 * $days[1][0]] = $_POST["endT". $i];
                    $days[1][7 + 10 * $days[1][0]] = $_POST["endP". $i];
                    $days[1][8 + 10 * $days[1][0]] = $_POST["email". $i];
                    $days[1][9 + 10 * $days[1][0]] = $_POST["location". $i];
                    $days[1][10 + 10 * $days[1][0]] = $_POST["notes". $i];
                    $days[1][0]++;

					break;
				case "Tuesday":
                    
                    $days[2][1 + 10 * $days[2][0]] = $_POST["day" . $i];
                    $days[2][2 + 10 * $days[2][0]] = $_POST["class". $i]; 
                    $days[2][3 + 10 * $days[2][0]] = $_POST["tutor". $i];
                    $days[2][4 + 10 * $days[2][0]] = $_POST["startT". $i];
                    $days[2][5 + 10 * $days[2][0]] = $_POST["startP". $i];
                    $days[2][6 + 10 * $days[2][0]] = $_POST["endT". $i];
                    $days[2][7 + 10 * $days[2][0]] = $_POST["endP". $i];
                    $days[2][8 + 10 * $days[2][0]] = $_POST["email". $i];
                    $days[2][9 + 10 * $days[2][0]] = $_POST["location". $i];
                    $days[2][10 + 10 * $days[2][0]] = $_POST["notes". $i];

                    $days[2][0]++;

                    break;
                case "Wednesday":
                    
                    $days[3][1 + 10 * $days[3][0]] = $_POST["day" . $i];
                    $days[3][2 + 10 * $days[3][0]] = $_POST["class". $i]; 
                    $days[3][3 + 10 * $days[3][0]] = $_POST["tutor". $i];
                    $days[3][4 + 10 * $days[3][0]] = $_POST["startT". $i];
                    $days[3][5 + 10 * $days[3][0]] = $_POST["startP". $i];
                    $days[3][6 + 10 * $days[3][0]] = $_POST["endT". $i];
                    $days[3][7 + 10 * $days[3][0]] = $_POST["endP". $i];
                    $days[3][8 + 10 * $days[3][0]] = $_POST["email". $i];
                    $days[3][9 + 10 * $days[3][0]] = $_POST["location". $i];
                    $days[3][10 + 10 * $days[3][0]] = $_POST["notes". $i];
                    $days[3][0]++;

                    break;
				case "Thursday":
                    
                    $days[4][1 + 10 * $days[4][0]] = $_POST["day" . $i];
                    $days[4][2 + 10 * $days[4][0]] = $_POST["class". $i]; 
                    $days[4][3 + 10 * $days[4][0]] = $_POST["tutor". $i];
                    $days[4][4 + 10 * $days[4][0]] = $_POST["startT". $i];
                    $days[4][5 + 10 * $days[4][0]] = $_POST["startP". $i];
                    $days[4][6 + 10 * $days[4][0]] = $_POST["endT". $i];
                    $days[4][7 + 10 * $days[4][0]] = $_POST["endP". $i];
                    $days[4][8 + 10 * $days[4][0]] = $_POST["email". $i];
                    $days[4][9 + 10 * $days[4][0]] = $_POST["location". $i];
                    $days[4][10 + 10 * $days[4][0]] = $_POST["notes". $i];
                    $days[4][0]++;

					break;
				case "Friday":
                    
                    $days[5][1 + 10 * $days[5][0]] = $_POST["day" . $i];
                    $days[5][2 + 10 * $days[5][0]] = $_POST["class". $i]; 
                    $days[5][3 + 10 * $days[5][0]] = $_POST["tutor". $i];
                    $days[5][4 + 10 * $days[5][0]] = $_POST["startT". $i];
                    $days[5][5 + 10 * $days[5][0]] = $_POST["startP". $i];
                    $days[5][6 + 10 * $days[5][0]] = $_POST["endT". $i];
                    $days[5][7 + 10 * $days[5][0]] = $_POST["endP". $i];
                    $days[5][8 + 10 * $days[5][0]] = $_POST["email". $i];
                    $days[5][9 + 10 * $days[5][0]] = $_POST["location". $i];
                    $days[5][10 + 10 * $days[5][0]] = $_POST["notes". $i];
                    $days[5][0]++;

					break;
                case "Saturday":
                    
                    $days[6][1 + 10 * $days[6][0]] = $_POST["day" . $i];
                    $days[6][2 + 10 * $days[6][0]] = $_POST["class". $i]; 
                    $days[6][3 + 10 * $days[6][0]] = $_POST["tutor". $i];
                    $days[6][4 + 10 * $days[6][0]] = $_POST["startT". $i];
                    $days[6][5 + 10 * $days[6][0]] = $_POST["startP". $i];
                    $days[6][6 + 10 * $days[6][0]] = $_POST["endT". $i];
                    $days[6][7 + 10 * $days[6][0]] = $_POST["endP". $i];
                    $days[6][8 + 10 * $days[6][0]] = $_POST["email". $i];
                    $days[6][9 + 10 * $days[6][0]] = $_POST["location". $i];
                    $days[6][10 + 10 * $days[6][0]] = $_POST["notes". $i];
                    $days[6][0]++;
                    
                    break;
            }
		}
    }
    
    for($i = 0; $i < 7; $i++){//goes through each day
        if(isset($days[$i][4])){
            for($j = 0; $j < 100; $j++){
                $temp = array();
                if(isset($days[$i][4 + (10 * $j) + 10])){
                    $nextPeriod = $days[$i][(5 + $j * 10) + 10];
                    $thisPeriod = $days[$i][5 + $j * 10];
                    $thisComesBefore = $thisPeriod == "AM" && $nextPeriod == "PM";
                    if($days[$i][4 + $j * 10] > $days[$i][(4 + $j * 10) + 10] && !$thisComesBefore) {
                        for($k = 1; $k < 10; $k++){
                            $temp[$k] = $days[$i][$k + $j * 10];
                            $days[$i][$k + $j * 10] = $days[$i][($k + $j * 10) + 10];
                            $days[$i][($k + $j * 10) + 10] = $temp[$k];
                        }
                    }
                }
            }
        }
    }
    
	for($i = 0; $i < 7; $i++){
		if(isset($days[$i][1])){
            for($j = 0; $j < $days[$i][0] * 10; $j+=10){
                fwrite($Fhandle, $days[$i][1 + $j]);
                fwrite($Fhandle, ",");
                fwrite($Fhandle, $days[$i][2 + $j]);
                fwrite($Fhandle, ",");
                fwrite($Fhandle, $days[$i][3 + $j]);
                fwrite($Fhandle, ",");
                fwrite($Fhandle, $days[$i][4 + $j]);
                fwrite($Fhandle, ",");
                fwrite($Fhandle, $days[$i][5 + $j]);
                fwrite($Fhandle, ",");
                fwrite($Fhandle, $days[$i][6 + $j]);
                fwrite($Fhandle, ",");
                fwrite($Fhandle, $days[$i][7 + $j]);
                fwrite($Fhandle, ",");
                fwrite($Fhandle, $days[$i][8 + $j]);
                fwrite($Fhandle, ",");
                fwrite($Fhandle, $days[$i][9 + $j]);
                fwrite($Fhandle, ",");
                fwrite($Fhandle, $days[$i][10 + $j]);
                fwrite($Fhandle, "\r\n");
            }
		}
    }
    echo "Dates saved to file.";

	fclose($Fhandle);
?>

<br><a href="../../../testCSwebsite/current_students/tutoring/index.php">Go to the CS tutor schedule page!</a>