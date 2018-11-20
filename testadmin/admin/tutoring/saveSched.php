<!-- Author: Brett Schrimpf -->
<?php

    $File = "Schedule.txt";

    $Fhandle = fopen($File, "w");

    $NumberEvents = count($_POST);




for($i = 1; $i <= $NumberEvents; $i++){

        if(isset($_POST["day". $i])){

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
    echo "Written tutor dates to file.";
    fclose($Fhandle);

?>