<?php
    $path = "../../";
    include $path . "admin_head1.html"; 
?>
    <link rel="stylesheet" href="<?php print $path; ?>../tutoring/css/tutoring.css">
<?php
    include $path . "admin_head2.html"; 
?>

    <!-- BANNER SECTION -->
    <h1>Edit Tutoring Schedule</h1>

    <main>
        <div id="schedule-container">
        <form>
            <div class="day-col" id="Sun">
                <div class="day-name">Sunday</div>
                <div class="slots">
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
                </div>
            </div>
            <div class="day-col" id="Mon">
                <div class="day-name">Monday</div>
                <div class="slots">
                    
                </div>
            </div>
            <div class="day-col" id="Tue">
                <div class="day-name">Tuesday</div>
                <div class="slots">
                    
                </div>
            </div>          
            <div class="day-col" id="Wed">
                <div class="day-name">Wednesday</div>
                <div class="slots">
                    
                </div>
            </div>
            <div class="day-col" id="Thu">
                <div class="day-name">Thursday</div>
                <div class="slots">

                </div>
            </div>
            <div class="day-col" id="Fri">
                <div class="day-name">Friday</div>
                <div class="slots">
                    
                </div>
            </div>
            <div class="day-col" id="Sat">
                <div class="day-name">Saturday</div>
                <div class="slots">
                    
                </div>
            </div>
        </form>
        </div>
    </main>

<?php include $path . "admin_footer.html"; ?>