<?php
	session_start();
	include('header.html');
?>

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New Program</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

          <div class="panel panel-default">
                <div class="panel-heading">Program Information</div>
                <div class="panel-body">


                <div class= 
                <?php
                    if($_SESSION["program_insert"] == true) {
                        echo "\"alert alert-success alert-dismissable\"";  
                    } else if(isset($_SESSION["program_insert_fail"])){
                        echo "\"alert alert-warning alert-dismissable\""; 
                    }
                ?>>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php
                        if($_SESSION["program_insert"] == true) {
                            echo "Your program was successfully added!";
                            unset($_SESSION["program_insert"]);
                        }
                        if($_SESSION["program_insert_fail"] == true){
                            echo "Sorry, please check your connection to the database. Or contact your DBA.";
                            unset($_SESSION["program_insert_fail"]);
                        }
                    ?>
                </div>
                    <div class="row">
                        <form role="form" method="post" action="php/php_add_program.php">
                            <div class="col-lg-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Basic Info</div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label>Program Name</label>
                                                <input class="form-control" name="program_name">
                                                
                                                <label>Program Abbreviation</label>
                                                <input class="form-control" name="abbr">
                                            </div>  
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" value="submit" name="submit" class="btn btn-primary btn-lg btn-block">Add Program</button>
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