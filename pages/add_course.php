<?php
    session_start();
	include('header.html');

    $mysqli = new mysqli('localhost', "aman", "atlanta12", "targetit");
?>

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New Course</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

          <div class="panel panel-default">
                <div class="panel-heading">Course Information</div>
                <div class="panel-body">
                    <div class="row">

                        <form role="form" method="post" action="php/php_add_course.php">
                            <div class="col-lg-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Basic Info</div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label>Program </label>
                                                <select id="program" class="form-control">
                                                    <?php
                                                        $programs = "SELECT `program_id`, `program_name`, `program_abbr` FROM `programs`";

                                                        if($programs_r = $mysqli->query($programs)) {
                                                            while($row = $programs_r->fetch_array()) {
                                                                echo "<option value=\"" . $row["program_id"] . "\">" . $row["program_name"] . " - " . $row["program_abbr"] . "</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                
                                                <label>Course ID (Ex: PM1014WEM)</label>
                                                <input class="form-control" name="course_id">

                                                <label>Instructor</label>
                                                <select id="instructor" class="form-control">
                                                    <?php
                                                        $instructors = "SELECT `instructor_id`, `f_name`, `l_name` FROM `instructors` WHERE active = true ORDER BY `f_name`";

                                                        if($instructors_r = $mysqli->query($instructors)) {
                                                            while($row = $instructors_r->fetch_array()) {
                                                                echo "<option value=\"" . $row["instructor_id"] . "\">" . $row["f_name"] . " " . $row["l_name"] . "</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select> 

                                                <label> Notes </label>
                                                <input class="form-control" type="paragraph" name="notes" id="notes" \>
                                            </div>
                                            
                                        </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Dates & Times</div>
                                        <div class="panel-body">
                                            <label>Start Date:</label>
                                            <input class="form-control" type="date" \>
                                            <label>Est. End Date:</label>
                                            <input class="form-control" type="date" \> 

                                            <label> Class Days: </label><br>
                                            <input type="checkbox" name="days" value="mon" \> Mondays <br>
                                            <input type="checkbox" name="days" value="tue" \> Tuesdays<br>
                                            <input type="checkbox" name="days" value="wed" \> Wednesdays<br>
                                            <input type="checkbox" name="days" value="thu" \> Thursdays<br>
                                            <input type="checkbox" name="days" value="fri" \> Fridays<br>
                                            <input type="checkbox" name="days" value="sat" \> Saturdays<br>
                                            <input type="checkbox" name="days" value="sun" \> Sundays<br>

                                            <label> Usual Start Time </label>
                                            <input type="time" class="form-control" name="starttime" \>

                                            <label> Duration (Usual) </label>
                                            <input type="number" min="1" max="6" value="5" step="0.5" name="duration" class="form-control" \>



                                        </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" value="submit" class="btn btn-primary btn-lg btn-block">Add Course</button>
                            </div>
                        </div>                            
                        </form>
                    </div>
                </div>
            </div>

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php
	include('footer.html');
?>