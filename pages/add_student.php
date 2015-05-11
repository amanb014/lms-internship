<?php
	session_start();
	include('header.html');
?>

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New Student</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

          <div class="panel panel-default">
                <div class="panel-heading">Student Information</div>
                <div class="panel-body">

                <div class= 
	                <?php
	                    if($_SESSION["student_insert"] == true) {
	                        echo "\"alert alert-success alert-dismissable\"";  
	                    } else if(isset($_SESSION["student_insert"])){
	                        echo "\"alert alert-warning alert-dismissable\""; 
	                    }
	                ?>>
                    <?php
                        if($_SESSION["student_insert"] == true) {
                        	echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
                            echo "Instructor was added successfully!";
                            unset($_SESSION["student_insert"]);
                        }
                        if($_SESSION["student_insert_fail"] == true){
                            echo "Sorry, please check your connection to the database. Or contact your DBA.";
                            unset($_SESSION["student_insert_fail"]);
                        }
                    ?>
                </div>

                    <div class="row">
                        <form role="form" method="post" action="php/php_add_student.php">
                            <div class="col-lg-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Basic Info</div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control" name="f_name">

                                                <label>Last Name</label>
                                                <input class="form-control" name="l_name">
                                                
                                                <label>Nick Name</label>
                                                <input class="form-control" name="nick">   
                                            </div>
                                        </div>
                                </div>

                                <div class="panel panel-primary">
                                    <div class="panel-heading">Contact Information</div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label>Phone 1</label>
                                                <input class="form-control" name="phone1" type="tel">

                                                <label>Phone 2</label>
                                                <input class="form-control" name="phone2" type="tel">
                                                
                                                <label>Email 1</label>
                                                <input class="form-control" name="email1" type="email">

                                                <label>Email 2</label>
                                                <input class="form-control" name="email2" type="email">  
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Address Information</div>
                                        <div class="panel-body">
                                           <div class="form-group">
                                           		<label>Address Line 1</label>
                                                <input class="form-control" name="addr1">

                                                <label>Address Line 2</label>
                                                <input class="form-control" name="addr2">

                                                <label>City</label>
                                                <input class="form-control" name="city">

                                                <label>State</label>
                                                <input class="form-control" name="state">

                                                <label>Zip</label>
                                                <input class="form-control" name="zip">

                                           </div>
                                        </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" value="submit" class="btn btn-primary btn-lg btn-block">Add Student</button>
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
?>8