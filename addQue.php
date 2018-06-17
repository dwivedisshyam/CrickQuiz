<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="">
        <meta name="author" content="">
        <title>One Page Wonder - Start Bootstrap Template</title>
        <?php include('headContent.php');?>
    </head>

    <body>
        <!-- Navigation -->
        <?php include('navBar.php');
              include('dbConnection.php')
        ?>
        <br style="clear: both;">
        <div class="h-100 container p-5" style="margin-top:32px;">
             <?php
            if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
                $q = $_POST['Que'];
                $a = $_POST['optA'];
                $b = $_POST['optB'];
                $c = $_POST['optC'];
                $d = $_POST['optD'];
                $query = "INSERT INTO tbl_que (que, optA, optB, optC, optD) VALUES ('".$q."', '".$a."', '".$b."', '".$c."', '".$d."')";
               // echo $query;
                if(mysqli_query($con, $query)){
                    echo  "<div class='alert alert-success alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Success!</strong> Question stored.
  </div>";
                }
                else{
                    echo "<div class='alert alert-danger alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>Failed!</strong> Question cannot be stored.
  </div>";
                }
              
                mysqli_error($con);
                mysqli_close($con);
            }
            ?>
            <center>
                <h2>Add Questions</h2>
                </center>
                <form method="post" action="addQue.php">
                    <div class="form-group">
                        <label for="Que">Que. </label>
                        <textarea class="form-control col-sm-8" name="Que" id="Que" rows="2" required></textarea>
                    </div>
                    <div class="form-group form-inline">
                        <label for="optA">A : &nbsp; </label>
                        <input class="form-control col-sm-5" type="text" name="optA" id="optA" required/>
                    </div>
                   <div class="form-group form-inline">
                        <label for="optB">B : &nbsp; </label>
                        <input class="form-control col-sm-5" type="text" name="optB" id="optB" required/>
                    </div>
                    <div class="form-group form-inline">
                        <label for="optC">C : &nbsp; </label>
                        <input class="form-control col-sm-5" type="text" name="optC" id="optC" required/>
                    </div>
                    <div class="form-group form-inline">
                        <label for="optD">D : &nbsp; </label>
                        <input class="form-control col-sm-5" type="text" name="optD" id="optD" required/>
                    </div>
                    <input class="btn btn-success" type="submit" value="Save"/>
                    <input class="btn btn-danger" type="reset" value="Reset"/>
                </form>
        </div>
        
        
        <!-- Footer -->
        <?php include('footer.php');?>
    </body>
</html>
