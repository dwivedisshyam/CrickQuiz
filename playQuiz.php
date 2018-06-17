<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="">
        <meta name="author" content="">
        <title>One Page Wonder - Start Bootstrap Template</title>
        <?php include('headContent.php');?>
        <script>
            var result=parseInt(0);
            function checkAns(x,y){

                y = "Q" + y;
                var ans = document.getElementById(y).value;
                //alert(x);
                if(x == ans){
                    result++;
                    alert(result);
                }
            }
        </script>
    </head>

    <body>
        <!-- Navigation -->
        <?php include('navBar.php');
              include('dbConnection.php')
        ?>
        <br style="clear: both;">
        <div class="container p-5" style="margin-top:32px;">
            
            <form action='resultQuiz.php' method='post'>
            <?php
            if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
                    $id = $_POST['userId'];
                    $playerName = $_POST['playerName'];
                    $query = "SELECT name FROM tbl_user where uId=". $id;
                    $row= mysqli_fetch_assoc(mysqli_query($con, $query));
                    $name = $row['name'];
                    echo "<center><h1>How Much You Know About ".$name."'s Cricket Hobby?<h1></center><br/>";
                    $query = "SELECT queNo FROM tbl_userque where userId=".$id;
                    $result = mysqli_query($con, $query);
                    $qno=1;
                    
                    while($row = mysqli_fetch_assoc($result)){
                        $query2 = "SELECT que, optA, optB, optC, optD FROM tbl_que where qNo=". $row['queNo'];
                        $row2= mysqli_fetch_assoc(mysqli_query($con, $query2));
            ?>
                        <div>   
                             <h4><?php echo "Q ".$qno.". ". str_replace("you", $name, $row2['que'])."<br/>"; ?>
                            </h4>
                            <h6>
                                <input type="hidden" name="Q<?php echo $qno;?>" value="<?php echo $row['queNo'];?>"/>
                                &emsp;<input type="radio" name="<?php echo "A".$qno;?>" value="optA" required/> <?php echo $row2['optA'];?><br/>
                                &emsp;<input type="radio" name="<?php echo "A".$qno;?>" value="optB" required/> <?php echo $row2['optB'];?><br/>
                                &emsp;<input type="radio" name="<?php echo "A".$qno;?>" value="optC" required/> <?php echo $row2['optC'];?><br/>
                                &emsp;<input type="radio" name="<?php echo "A".$qno;?>" value="optD" required/> <?php echo $row2['optD'];?>
                            </h6>
                        </div>  
                        <br/>
                    <?php
                        $qno++;
                    }
                    ?>       
                <input type="hidden" name="userName" value="<?php echo $name;?>"/>
                <input type="hidden" name="userId" value="<?php echo $id;?>"/>
                <input type="hidden" name="playerName" value="<?php echo $playerName;?>"/>
                    <center><input class='btn btn-success' type='submit' value='Show Result'/></center>
                        </form>
                    <?php
                }else{
                    header('Location: index.php'); 
                }
            ?>
            
            
           
            
        </div>
        
        
        <!-- Footer -->
        <?php include('footer.php');?>
    </body>
</html>
