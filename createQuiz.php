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
              include('dbConnection.php');
        ?>
        <br style="clear: both;">
        
        <div class="h-100 container p-5" style="margin-top:32px;">
           <form method="post" action="shareQuiz.php">
            <?php
            if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
                $name = $_POST['name'];
                $query = "INSERT INTO tbl_user (name) VALUES('" . $name . "')";
                if(mysqli_query($con, $query)){
                    $query = "SELECT MAX(uId) FROM tbl_user";
                    $row = mysqli_fetch_array(mysqli_query($con,$query));
                    $id = $row[0];
                    
                    $query = "SELECT DISTINCT * FROM tbl_que ORDER BY RAND() LIMIT 10";
                    $result = mysqli_query($con,$query);
                    $qno = 1;
                    
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <div class="m-2">
                            <h4><?php
                             echo "Q ".$qno.". ". $row['que']."<br/>";
                            ?>
                            </h4>
                            <h6>
                            <input type="hidden" name="<?php echo "Q".$qno;?>" value="<?php echo $row['qNo'];?>"/>
                            &emsp;<input type="radio" name="<?php  echo "A".$qno;?>" value="optA" required/> <?php echo $row['optA']?> <br/>
                            &emsp;<input type="radio" name="<?php echo "A".$qno;?>" value="optB" required/> <?php echo $row['optB']?> <br/>
                            &emsp;<input type="radio" name="<?php echo "A".$qno;?>" value="optC" required/> <?php echo $row['optC']?> <br/>
                            &emsp;<input type="radio" name="<?php echo "A".$qno++;?>" value="optD" required/> <?php echo $row['optD'];?> <br/> 
                                </h6>
                        </div>
                        <br/>
                        <?php
                    }
                    echo "<input type='hidden' name='id' value='". $id ."'/>
                    <center><input class='btn btn-success' type='submit' value='Generate Quiz'/></center>";
                    
                }
                mysqli_close($con);
            }
            else{
                 header('Location: index.php');       
            }
            ?>
               </form>
        </div>
        
        <!-- Footer -->
        <?php include('footer.php');?>
    </body>
</html>
