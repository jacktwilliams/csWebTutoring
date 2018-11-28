<!-- Author: Brett Schrimpf -->
<?php
	$File = "Schedule.txt";
	$Fhandle = fopen($File, "w");
	$NumberEvents = count($_POST);

	$days = array(  //7 arrays, each for 1 day of the week
		array("-1"),
		array("-1"),
		array("-1"),
		array("-1"),
		array("-1"),
		array("-1"),
		array("-1")
	);

    for($i = 1; $i <= $NumberEvents; $i++){
		if(isset($_POST["day". $i])){
			$day = $_POST["day". $i];
			$print = false;
			switch($day){
				case "Sunday":
					if($_POST["start".$i] > $days[0][0]){
						$days[0][0] = $_POST["start".$i];
						$days[0][1] = $_POST["day" . $i];
						$days[0][2] = $_POST["class". $i]; 
						$days[0][3] = $_POST["tutor". $i];
						$days[0][4] = $_POST["start". $i];
						$days[0][5] = $_POST["end". $i];
					}
					else{
						$print = true;
					}
					break;
				case "Monday":
					if($_POST["start".$i] > $days[1][0]){
						$days[1][0] = $_POST["start".$i];
						$days[1][1] = $_POST["day" . $i];
						$days[1][2] = $_POST["class". $i]; 
						$days[1][3] = $_POST["tutor". $i];
						$days[1][4] = $_POST["start". $i];
						$days[1][5] = $_POST["end". $i];
					}
					else{
						$print = true;
					}
					break;
				case "Tuesday":
					if($_POST["start".$i] > $days[2][0]){
						$days[2][0] = $_POST["start".$i];
						$days[2][1] = $_POST["day" . $i];
						$days[2][2] = $_POST["class". $i]; 
						$days[2][3] = $_POST["tutor". $i];
						$days[2][4] = $_POST["start". $i];
						$days[2][5] = $_POST["end". $i];
					}
					else{
						$print = true;
					}
					break;
				case "Wednesday":
					if($_POST["start".$i] > $days[3][0]){
						$days[3][0] = $_POST["start".$i];
						$days[3][1] = $_POST["day" . $i];
						$days[3][2] = $_POST["class". $i]; 
						$days[3][3] = $_POST["tutor". $i];
						$days[3][4] = $_POST["start". $i];
						$days[3][5] = $_POST["end". $i];
					}
					else{
						$print = true;
					}
					break;
				case "Thursday":
					if($_POST["start".$i] > $days[4][0]){
						$days[4][0] = $_POST["start".$i];
						$days[4][1] = $_POST["day" . $i];
						$days[4][2] = $_POST["class". $i]; 
						$days[4][3] = $_POST["tutor". $i];
						$days[4][4] = $_POST["start". $i];
						$days[4][5] = $_POST["end". $i];
					}
					else{
						$print = true;
					}
					break;
				case "Friday":
					if($_POST["start".$i] > $days[5][0]){
						$days[5][0] = $_POST["start".$i];
						$days[5][1] = $_POST["day" . $i];
						$days[5][2] = $_POST["class". $i]; 
						$days[5][3] = $_POST["tutor". $i];
						$days[5][4] = $_POST["start". $i];
						$days[5][5] = $_POST["end". $i];
					}
					else{
						$print = true;
					}
					break;
				case "Saturday":
					if($_POST["start".$i] > $days[6][0]){
						$days[6][0] = $_POST["start".$i];
						$days[6][1] = $_POST["day" . $i];
						$days[6][2] = $_POST["class". $i]; 
						$days[6][3] = $_POST["tutor". $i];
						$days[6][4] = $_POST["start". $i];
						$days[6][5] = $_POST["end". $i];
					}
					else{
						$print = true;
					}
					break;
			}
				if($print == true){
					fwrite($Fhandle, $_POST["day". $i]);
					fwrite($Fhandle, ",");
					fwrite($Fhandle, $_POST["class". $i]);
					fwrite($Fhandle, ",");
					fwrite($Fhandle, $_POST["tutor". $i]);
					fwrite($Fhandle, ",");
					fwrite($Fhandle, $_POST["start". $i]);
					fwrite($Fhandle, ",");
					fwrite($Fhandle, $_POST["end". $i]);
					fwrite($Fhandle, "\r\n");
				}
		}
	}
	
	for($i = 0; $i < 7; $i++){
		if(isset($days[$i][1])){
			fwrite($Fhandle, $days[$i][1]);
			fwrite($Fhandle, ",");
			fwrite($Fhandle, $days[$i][2]);
			fwrite($Fhandle, ",");
			fwrite($Fhandle, $days[$i][3]);
			fwrite($Fhandle, ",");
			fwrite($Fhandle, $days[$i][4]);
			fwrite($Fhandle, ",");
			fwrite($Fhandle, $days[$i][5]);
			fwrite($Fhandle, "\r\n");
		}
	}
	echo "Written tutor dates to file.";
	
	fclose($Fhandle);
?>