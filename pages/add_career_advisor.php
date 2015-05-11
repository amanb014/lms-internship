<?php
	session_start();
	include('header.html');
    
    $mysqli = new mysqli('localhost', "aman", "atlanta12", "targetit");
?>

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Career Advisor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

          <div class="panel panel-default">
                <div class="panel-heading">Advisor Information</div>
                <div class="panel-body">

                <div class= 
	                <?php
	                    if($_SESSION["advisor_insert"] == true) {
	                        echo "\"alert alert-success alert-dismissable\"";  
	                    } else if(isset($_SESSION["advisor_insert_fail"])){
	                        echo "\"alert alert-warning alert-dismissable\""; 
	                    }
	                ?>>
                    <?php
                        if($_SESSION["advisor_insert"] == true) {
                        	echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
                            echo "Instructor was added successfully!";
                            unset($_SESSION["advisor_insert"]);
                        }
                        if($_SESSION["advisor_insert_fail"] == true){
                            echo "Sorry, please check your connection to the database. Or contact your DBA.";
                            unset($_SESSION["advisor_insert_fail"]);
                        }
                    ?>
                </div>

                    <div class="row">
                        <form role="form" method="post" action="php/php_add_career_advisor.php">
                            <div class="col-lg-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Basic Info</div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control" name="f_name">

                                                <label>Last Name</label>
                                                <input class="form-control" name="l_name">
                                                    
                                                <label>Short Description / Notes</label>
                                                <textarea class="form-control" name="desc"> </textarea>
                                                
                                            </div>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="panel panel-primary">
                                        <div class="panel-heading">Contact Information</div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input class="form-control" name="phone1" type="tel">
                                                    
                                                    <label>Email</label>
                                                    <input class="form-control" name="email1" type="email">
    													
    												<label>County</label>
    												<select name="county" class="form-control">
                                                        <option disabled default selected value="NULL">Select One</option>
                                                         <?php
                                                            $advisors = "SELECT county_id, county_name FROM targetit.counties ORDER BY  county_name";
    
                                                            if($advisors_r = $mysqli->query($advisors)) {
                                                                while($row = $advisors_r->fetch_array()) {
                                                                    echo "<option value=\"" . $row["county_id"] . "\">" . $row["county_name"] .  "</option>";
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>    
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" value="submit" class="btn btn-primary btn-lg btn-block">Add Advisor</button>
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