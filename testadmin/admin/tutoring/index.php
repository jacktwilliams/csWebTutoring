<?php
    $path = "../../";
    /*include $path . "admin_head1.html";*/ 
?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Replace bootstrap CDN link with server file at some point-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/williamsT.css">
<?php
    /*include $path . "admin_head2.html";*/ 
?>

    <!-- BANNER SECTION -->
    <h1>Edit Tutoring Schedule</h1>

    <main>
        <div class="container-fluid" id="schedule-container">
            <div class="row">
                <div class="day-col col" id="Sun">
                    <div class="day-name">Sunday</div>
                    <div class="slots">
                        <!--
                        <div class="slot-chunk">
                            <select name="day1">
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                            </select>
                            Class:<br>
                            <input type="text" name="class1"><br>
                            Tutor:<br>
                            <input type="text" name="tutor1"><br>
                            Start Time:<br>
                            <input type="text" name="start1"><br>
                            End Time:<br>
                            <input type="text" name="end1"><br>
                        </div>
                        -->
                    </div>
                </div>
                <div class="day-col col" id="Mon">
                    <div class="day-name">Monday</div>
                    <div class="slots">
                        
                    </div>
                </div>
                <div class="day-col col" id="Tue">
                    <div class="day-name">Tuesday</div>
                    <div class="slots">
                        
                    </div>
                </div>          
                <div class="day-col col" id="Wed">
                    <div class="day-name">Wednesday</div>
                    <div class="slots">
                        
                    </div>
                </div>
                <div class="day-col col" id="Thu">
                    <div class="day-name">Thursday</div>
                    <div class="slots">

                    </div>
                </div>
                <div class="day-col col" id="Fri">
                    <div class="day-name">Friday</div>
                    <div class="slots">
                        
                    </div>
                </div>
                <div class="day-col col" id="Sat">
                    <div class="day-name">Saturday</div>
                    <div class="slots">
                        
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php /*include $path . "admin_footer.html";*/ ?>